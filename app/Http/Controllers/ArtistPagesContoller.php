<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ArtistPagesContoller extends Controller
{

	public function index()
	{
		return view('artist_page');
	}

    public function show($id)
    {
    	$artist = \App\Artist::findOrFail($id);

    	return view('artist.show', compact('artist'));
    }
}
