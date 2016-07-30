<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends AbstractModel
{
    public $timestamps = ['created_at'];
    protected $fillable = [
        'user_id', 'song_id', 'value'
    ];

    public static function boot()
    {
        parent::boot();

        \App\Rank::saved(function($rank)
        {
            error_log('hello');
            $song = $rank->song;
                $song->update(['rank'=>$song->averageRank,
                           'rank_count'=>$song->ranked_count]);
                $song->update(['place_in_rank'=>$song->placesss_in_rank]);

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


