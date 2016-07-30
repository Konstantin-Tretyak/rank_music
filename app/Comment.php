<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends AbstractModel
{
    public $timestamps = ['created_at'];
    protected $fillable = [
        'user_id', 'song_id', 'body'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function song()
    {
        return $this->belongsTo('App\Song');
    }

    // TODO: likes
}
