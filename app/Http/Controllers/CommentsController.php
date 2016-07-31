<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;

use App\Http\Requests;

class CommentsController extends Controller
{

    public function store(Request $request) // validate request
    {
            if($request->ajax())
            {
                if(!$request->input('body'))
                {
                    $flash = ['error' => 'Вы ничего не написали'];
                    return response($flash, 400);
                }

                $comment = new Comment($request->all());
                Auth::user()->comments()->save($comment);
                $comment->save();
                $user = Auth::user();
                $response = array('user_img'=>$user->photo,'user_name'=>$user->name,'user_creat'=>$user->created_at,'body'=>$comment->body,'date'=>$comment->created_at->toDateTimeString());
                return response()->json($response);
            }
    }
}
