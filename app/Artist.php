<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends AbstractModel
{
    public $timestamps = ['created_at'];
    protected $fillable = [
        'name', 'country_id'
    ];

    public function performerSongs()
    {
        return $this->hasMany('App\Song', 'performer_id');
    }

    public function composerSongs()
    {
        return $this->hasMany('App\Song', 'composer_id');
    }

    public function placeBestSong()
    {
        return $this->performerSongs->min('place_in_rank');
    }

    public function bestSong()
    {
        return $this->performerSongs->where("place_in_rank","=",$this->placeBestSong())->first();
    }

    public function maxLisensSong()
    {
        return $this->performerSongs->max('listens_count');
    }

    public function popularSong()
    {
        return $this->performerSongs->where("listens_count","=",$this->maxLisensSong())->first();
    }

    public function allListensSongs()
    {
        return $this->performerSongs->sum('listens_count');
    }

    public function countSong()
    {
        return $this->performerSongs->count();
    }

    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    public function getPhotoAttribute()
    {
        return $this->photo_path ? url($this->photo_path) : "http://img2-ak.lst.fm/i/u/300x300/2a96cbd8b46e442fc41c2b86b821562f.png";
    }
}
