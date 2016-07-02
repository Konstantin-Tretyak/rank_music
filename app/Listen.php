<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listen extends Model
{
    public $timestamps = ['created_at'];
    protected $fillable = [
        'user_id', 'song_id', 'session_id'
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
