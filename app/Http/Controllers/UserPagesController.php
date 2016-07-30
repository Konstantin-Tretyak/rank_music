<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserPagesController extends Controller
{

    public function show($id)
    {
        $user = \App\User::findOrFail($id);

        $songs_list = [];
        $user_ranks = \App\Rank::select('value')->distinct()->where('user_id',$id)->orderBy('value','desc')->get();

        $all_user_songs = \App\Song::select('songs.*')
                            ->join('ranks', 'songs.id', '=', 'ranks.song_id')
                            ->where('ranks.user_id',$id)
                            ->limit(12)
                            ->get();

        if(count($all_user_songs))
        {
            $songs_list[0] = $all_user_songs;
            foreach ($user_ranks as $rank)
            {
                //Ключ умножаю на 10, потому что при отображении изображений не читаются
                //ключи типа число с запятой, а рейтинги могут быть и 0.5, и 4.5,
                //но только с 0.5, поэтому я выбрал этот путь
                //Дальше я делю чилса на 10 во вьюхе, что бы выводился правильный рейтинг
               $songs_list[$rank->value*10] = \App\Song::select('songs.*')
                                            ->join('ranks', 'songs.id', '=', 'ranks.song_id')
                                            ->where('ranks.user_id',$id)
                                            ->where('ranks.value',$rank->value)
                                            ->limit(12)
                                            ->get();
            }
        }

        return view('user.show', compact('user','songs_list'));
    }
}
