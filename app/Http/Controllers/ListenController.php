<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Rank;
use App\User;
use Auth;
use App\Listen;
use Illuminate\Http\Request;

use App\Http\Requests;


class ListenController extends Controller
{
    public function store(Request $request)
    {
        if ($request->ajax())
        {
            $listen = new Listen($request->all());
            if(!auth()->check())
            {
                $listen->save();
            }
            else
            {
                Auth::user()->listens()->save($listen);
            }
            return;
        }
    }
}
