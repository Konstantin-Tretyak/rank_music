<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RanksListController extends Controller
{

    public function index()
    {
        $limit = 20;
        ///ШУРИК, ЗДЕСЬ НАДО БУДЕТ, ЧТО БЫ ТЫ ПОМОГ, ИЛИ ЖЕ ЭТУ СТРАНИЦУ НАФИГ.
        ///ПРОСТО НЕ ПРЕДСТАВЛЯЮ, КАК ЗДЕСЬ НУЖНО КАМПОНОВАТЬ ВСЕ ЭТО.
        ///ПЛЮС ЕЩЁ Я РЕЙТИНГИ ПО ГОДАМ, ДЕСЯТИЛЕТИЯМ И СТОЛЕТИЯМ СДЕЛАЛ КАЛИЧНО.
        $ranks['genre']['tittle'] = "Рейтинги по жанру";
        $ranks['genre']['data'] = \App\Genre::limit($limit)->get();

        $ranks['performer']['tittle'] = "Рейтинги по исполнителю";
        $ranks['performer']['data'] = \App\Artist::distinct()->select('artists.*')->join('songs','artists.id','=','songs.performer_id')->limit($limit)->get();

        $ranks['composer']['tittle'] = "Рейтинг по композитору";
        $ranks['composer']['data'] = \App\Artist::distinct()->select('artists.*')->join('songs','artists.id','=','songs.composer_id')->limit($limit)->get();

        $ranks['country']['tittle'] = "Рейтинг по странам";
        $ranks['country']['data'] = \App\Country::get();
        if(count($ranks['country']['data'])>$limit-1)
            $pagination_list = ceil(count($ranks['country']['data'])/$limit);
        $ranks['country']['data'] = \App\Country::limit($limit)->get();



        $ranks_year['year']['tittle'] = "Рейтинг по годам";
        $ranks_year['year']['data'] = \App\Song::distinct()->orderBy('year', 'desc')->limit($limit)->pluck('year');

        $ranks_year['decade']['tittle'] = "Рейтинг по десятилетиям";
        $ranks_year['decade']['data'] = \App\Song::select(\DB::raw("(year DIV 10) * 10 as decade"))
                                            ->distinct()
                                            ->orderBy('year', 'desc')
                                            ->limit($limit)
                                            ->pluck('decade');

        $ranks_year['century']['tittle'] = "Рейтинг по векам";
        $ranks_year['century']['data'] = \App\Song::select(\DB::raw("(year DIV 100)+1 as century"))
                                              ->distinct()
                                              ->orderBy('year', 'desc')
                                              ->limit($limit)
                                              ->pluck('century');


        return view('ranks.index', compact('genres', 'ranks','limit','pagination_list'));
    }

    public function getRankList(Request $request)
    {
        if($request->ajax())
        {
            $list_type = $request->input('list_type');
            $symbol = $request->input('symbol');
            $offset = $request->input('number');
            $limit = $request->input('limit');

            if($list_type=='composer' || $list_type=='performer')
            {
                $query = \App\Artist::selectRaw('artists.id, artists.name, count(*) as count')
                                    ->join('songs','artists.id','=','songs.'.$list_type.'_id');
                if($symbol=="0")
                    $query=$query->where('artists.name','REGEXP','^[0-9]');
                else
                    $query = $query->where('artists.name','LIKE',$symbol.'%');

                $query=$query->groupBy('artists.id')
                             ->groupBy('artists.name');

                $paginate_count = ceil(count($query->get())/$limit);

                $query = $query->orderBy('artists.name','asc')
                               ->skip($limit*($offset-1))
                               ->take($limit)
                               ->get()->toArray();
            }
            if($list_type=='country')
            {
                $query = \App\Country::selectRaw('countries.id, countries.name, count(*) as count')
                                     ->join('artists','artists.country_id','=','countries.id')
                                     ->join('songs','songs.composer_id','=','artists.id')
                                     ->groupBy('countries.id')
                                     ->groupBy('countries.name');

                $paginate_count = ceil(count($query->get())/$limit);

                $query = $query->orderBy('countries.name')
                               ->skip($limit*($offset-1))
                               ->take($limit)
                               ->get()
                               ->toArray();
            }

                $response = array('paginate_active'=>$offset,'paginate_count'=>$paginate_count, 'ranks'=>$query);

                return response()->json($response);


        }
    }
}
