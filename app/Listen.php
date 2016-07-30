<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listen extends AbstractModel
{
    public $timestamps = ['created_at'];
    protected $fillable = [
        'user_id', 'song_id', 'session_id'
    ];

    public static function boot()
    {
        parent::boot();

        \App\Listen::saved(function($listen)
        {
            $song = $listen->song()->first();
                $song->update(['listens_count'=>$song->listens_count+1]);

            // }
        });
    }

    public function song()
    {
        return $this->belongsTo('App\Song');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
