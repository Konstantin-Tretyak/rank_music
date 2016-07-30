<?php

namespace App\Http\Controllers;

use \App\Artist;

class WelcomeController extends Controller
{
	public function index()
	{
        $songs_list['new_songs']['tittle'] = "Новые песни";
        $songs_list['new_songs']['data'] = \App\Song::with('performer')->orderBy('created_at','desc')->limit(12)->get();

        //dd($songs_list['new_songs']['data']);

        $songs_list['best_songs']['tittle'] = "Лучшие песни";
        $songs_list['best_songs']['data'] = \App\Song::with('performer')->orderBy('rank','desc')->limit(12)->get();

        $songs_list['popular_songs']['tittle'] = "Поппулярные за неделю";
        $songs_list['popular_songs']['data'] = \App\Song::with('performer')->select(\DB::raw("songs.*,(select count(*) from listens where listens.song_id=songs.id  and created_at>now()-interval 1 week) as t"))
                                                ->orderBy('t','desc')->limit(12)->get();
        //$text;
        //preg_match_all('#<script[^>]*>.*?</script>#is', $html, $text);*/

                //$csv=file_get_contents("D:\C V\\countries.csv");

		return view('main.index',compact('songs_list'));
	}
}