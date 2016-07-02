<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SongsController extends Controller
{
    public function index(Request $request)
    {
        $songs = \App\Song::query();

        // dd($request->all());

        $filters = [];

        if($search = $request->input('search'))
        {
            $filters['search'] = $search;
            $songs =  $songs->where('name','like',"%$search%");
        }

        if ($genres = $request->input('genres'))
        {
            $filters['genres'] = $genres;
            $songs = $songs->whereIn('genre_id', $genres);
        }

        if ($countries = $request->input('countries'))
        {
            $filters['countries'] = $countries;

            $songs->whereHas('performer', function($query) use ($countries) {
                $query->whereIn('country_id', $countries);
            });
        }

        if ($tags = $request->input('tags'))
        {
            $filters['tags'] = $tags;
            // Way 1 (simple, not works because of conflict of 'id' fields)
            // $songs = $songs->join('song_tag', 'song_tag.song_id', '=', 'songs.id')->whereIn('song_tag.tag_id', $tags);


            // Way 2. Gold middle
            $songs = $songs->whereHas('song_tags', function($query) use ($tags) {
                $query->whereIn('tag_id', $tags);
            });

            // Way 3. Most flexible, harder to understand
            // $songs = $songs->whereHas('tags', function($q) use ($tags) {
            //     $q->whereIn('id', $tags);
            // });

        }

        if (($years = $request->input('range_year')) && $years['years']['min'] != "" && $years['years']['max'] != "" )
        {
            $filters['range_year']['min'] = $years['years']['min'];
            $filters['range_year']['max'] = $years['years']['max'];
            $songs = $songs->whereBetween('year',$years['years']);
        }
        else if (($years = $request->input('decade')) != "")
        {
            $filters['decade'] = $years;
            $songs = $songs->whereBetween('year',[$years, $years+9]);
        }
        else if (($years = $request->input('century') != ""))
        {
            //var_dump($years);
            $filters['century'] = $years/100 + 1;
            $songs = $songs->whereBetween('year',[$years, $years+99]);
        }

        /*if($sort = $request->input('sort'))
        {
            $filters['sort'] = $sort;
            $songs = $songs->join('ranks', 'songs.id','=','ranks.song_id')->groupBy('songs_id')->orderBy('song_id');
        }*/

        $genres = \App\Genre::all();
        $countries = \App\Country::all();
        $tags = \App\Tag::all();
        $years = \DB::table('songs')->distinct()->orderBy('year', 'desc')->pluck('year');
        $decades = \DB::table('songs')
                        ->select(\DB::raw("(year DIV 10) * 10 as decade"))
                        ->distinct()
                        ->orderBy('year', 'desc')
                        ->pluck('decade');
        $centurys = \DB::table('songs')
                        ->select(\DB::raw("(year DIV 100)+1 as century"))
                        ->distinct()
                        ->orderBy('year', 'desc')
                        ->pluck('century');

        // TODO: append request:input except page
        $songs = $songs->paginate(12)->setPath("songs?".http_build_query(\Request::input()));

        // TODO: оценка http://plugins.krajee.com/star-rating-demo-basic-usage
        return view('songs.index', compact('songs','genres','countries','tags', 'years', 'decades', 'centurys', 'filters'));
    }

    public function show($id)
    {
        $song = \App\Song::findOrfail($id);

        return view('songs.show', compact('song'));
    }
}
