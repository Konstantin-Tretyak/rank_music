<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends AbstractModel
{
    public $timestamps = false;
    protected $fillable = [
        'name'
    ];

    public function tags()
    {
        return $this->belongsToMany('App\Song', 'song_tags');
    }

    public function tagSongs()
    {
        return \DB::table('songs')->join('song_tag','songs.id','=','song_tag.song_id')->where('song_tag.tag_id','=',$this->id);
    }
}
