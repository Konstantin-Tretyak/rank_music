<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function ranks()
    {
        return $this->hasMany('App\Rank');
    }

    public function listens()
    {
        return $this->hasMany('App\Listen');
    }

    public function mostListensSong()
    {
        return  \App\Song::select(\DB::raw("songs.*,(select count(*) from listens where listens.song_id=songs.id  and listens.user_id=$this->id) as count"))
                                ->orderBy('count','desc')->limit(1)->get()[0];
    }

    public function mostListensPerformer()
    {
        return $this->listens()->selectRaw('artists.name,artists.id,count(*) as listen_count')
                               ->join('songs','songs.id','=','listens.song_id')
                               ->join('artists','songs.performer_id','=','artists.id')
                               ->groupBy('artists.name')
                               ->groupBy('artists.id')
                               ->orderBy('listen_count','desc')
                               ->first();
    }


    public function getPhotoAttribute()
    {
        return $this->photo_path ? url($this->photo_path) : url('img/users/default.jpg');
    }
}
