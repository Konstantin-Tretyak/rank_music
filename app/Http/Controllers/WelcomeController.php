<?php

namespace App\Http\Controllers;

use \App\Artist;

class WelcomeController extends Controller
{
	public function index()
	{
        $new_songs = \App\Song::with('performer')->orderBy('created_at','desc')->limit(12)->get();
        $best_songs = \App\Song::with('performer')->orderBy('rank','desc')->limit(12)->get();
        $popular_songs = \App\Song::with('performer')->select(\DB::raw("songs.*,(select count(*) from listens where listens.song_id=songs.id  and created_at>now()-interval 1 week) as t"))
            ->orderBy('t','desc')->limit(12)->get();
        return view('main.index',compact('new_songs', 'best_songs', 'popular_songs'));
    }
}