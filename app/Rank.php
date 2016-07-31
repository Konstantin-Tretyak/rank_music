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
            $song = $rank->song;
                error_log("HELLO ".$song->id);
                error_log("HEY ".$song->update(['rank'=>$song->averageRank,
                               'rank_count'=>$song->ranked_count]));
                error_log('!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!');
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


