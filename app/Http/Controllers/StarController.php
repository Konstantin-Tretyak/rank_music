<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Rank;
use App\User;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;


class StarController extends Controller
{
    public function edit(Request $request)
    {
        // TODO: validate
        if ($request->ajax())
        {
            $rank = \App\Rank::where("song_id",$request->input("song_id"))->where("user_id",Auth::user()->id)->first();
            if($rank)
                $rank->update(array('value'=>$request->input("value")));
            else
            {
                $rank = new Rank($request->all());
                Auth::user()->ranks()->save($rank);
            }
            return;
        }
    }
}
