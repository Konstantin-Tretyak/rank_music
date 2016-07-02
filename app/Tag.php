<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name'
    ];

    public function tags()
    {
        return $this->belongsToMany('App\Song', 'song_tags');
    }
}
