<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    public $timestamps = ['created_at'];
    protected $fillable = [
        'user_id', 'song_id', 'value'
    ];

    public function song()
    {
        return $this->belongsTo('App\Song');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
