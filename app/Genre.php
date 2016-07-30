<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends AbstractModel
{
    public $timestamps = false;
    protected $fillable = [
        'name'
    ];

    public function genreSongs()
    {
        return $this->hasMany('App\Song');
    }
}
