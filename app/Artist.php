<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    public $timestamps = ['created_at'];
    protected $fillable = [
        'name', 'country_id'
    ];

    public function performedSongs()
    {
        return $this->belongsTo('App\Song', null, 'performer_id');
    }

    public function composedSongs()
    {
        return $this->belongsTo('App\Song', null, 'composer_id');
    }

    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    public function getPhotoAttribute()
    {
        return $this->photo_path ? url($this->photo_path) : url('img/artists/default.jpg');
    }
}
