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


    public function getPhotoAttribute()
    {
        return $this->photo_path ? url($this->photo_path) : url('img/artists/default.jpg');
    }
}
