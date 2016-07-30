<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends AbstractModel
{
    public $timestamps = false;
    protected $fillable = [
        'name'
    ];

    public function countrySongs()
    {
        return \DB::table('songs')->join('artists','songs.composer_id','=','artists.id')->where('artists.country_id','=',$this->id);
    }
}
