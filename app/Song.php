<?php

namespace App;

use Auth;

class Song extends AbstractModel
{
    public $timestamps = ['created_at'];
    protected $fillable = [
        'name', 'is_song', 'year', 'duration', 'genre_id', 'composer_id', 'performer_id',
        'rank', 'rank_count', 'place_in_rank','listens_count'
    ];

    /*public static function boot()
    {
        parent::boot();

        \App\Song::created(function($song)
        {
            $song->update(['rank'=>$song->rank,
                           'rank_count'=>$song->rank_count]);
                        // TODO: init rank, rank_count, place_in_rank
        });
    }*/

    public static function createYearModel($yearType="year")
    {
        if($yearType=='decade')
            $years = \DB::table('songs')->select(\DB::raw("(year DIV 10) * 10 as year"))->distinct()->orderBy('year', 'desc')->get();
        else if($yearType=='century')
            $years = \DB::table('songs')->select(\DB::raw("(year DIV 100)*100 as year"))->distinct()->orderBy('year', 'desc')->get();
        else if(($yearType=='year') || ($yearType==''))
            $years = \DB::table('songs')->distinct()->select('year')->orderBy('year','desc')->get();

        $year_models = [];
        foreach($years as $value)
        {
            $year_models[] = new \App\Year($value->year, $yearType);
        }

        return $year_models;
    }

    public function performer()
    {
        return $this->belongsTo('App\Artist', 'performer_id');
    }

    public function composer()
    {
        return $this->belongsTo('App\Artist', 'composer_id');
    }

    // App\Song::first()->ranks()->create(['value'=>3,'user_id'=>1])->save()
    public function ranks()
    {
        return $this->hasMany('App\Rank');
    }

    public function getAverageRankAttribute()
    {
        return $this->ranks->avg('value');
    }

    public function getUserRankAttribute()
    {
        if(auth()->check())
        {
            $user_rank = $this->ranks->where('user_id',Auth::user()->id)->first();
            if(!is_null($user_rank))
                return $user_rank->value;
            else
                return 0;
        }
        return;
    }

    public function getRankedCountAttribute()
    {
        return $this->ranks->count();
    }

    public function getPlacesssInRankAttribute()
    {
        return \App\Song::whereRaw("$this->rank < rank")->count()+1;
    }

    public function listens()
    {
        return $this->hasMany('App\Listen');
    }

    public function listen_count()
    {
        return $this->listens()->count();
    }

    public function song_tags()
    {
        return $this->hasMany('App\SongTag');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment')->orderBy('created_at','desc');
    }

    public function getCountryAttribute()
    {
        return $this->composer->country;
    }

    public function getPhotoAttribute()
    {
        return $this->performer->photo;
    }

    public function genre()
    {
        return $this->belongsTo('App\Genre');
    }

    public function hasVideo()
    {
        return $this->video_youtube_id ? true : false;
    }

    public function hasText()
    {
        return $this->text ? true : false;
    }
}
