<?php

namespace App;

class Song extends AbstractModel
{
    public $timestamps = ['created_at'];
    protected $fillable = [
        'name', 'is_song', 'year', 'duration', 'genre_id', 'composer_id', 'performer_id'
    ];

    public static function boot()
    {
        parent::boot();

        \App\Rank::creating(function($rank)
        {
            // $rank->song
            // TODO: init rank, rank_count, place_in_rank
        });
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

    public function getRankAttribute()
    {
        return $this->ranks()->avg('value');
    }

    // TODO: сделать 3 поля: rank_count, rank, place_in_rank.
    // при создании/удалении Rank их обновлять
    public function getRankCountAttribute()
    {
        // TODO: для всех 3 аттрибутов: если колонка rank_count == NULL, то проинициализировать. есть не равна, то вернуть
        return $this->ranks()->count();
    }

    public function getPlaceInRankAttribute()
    {
        /*return count(\App\Rank::select(\DB::raw('AVG(ranks.value)'))
                            ->groupBy('song_id')
                            ->havingRaw("AVG(ranks.value)>".$this->rank())
                            ->get())+1;*/
        return \DB::select("select count(*) as place_in_rank from (select count(song_id) from `ranks` group by `song_id` having AVG(ranks.value) > {$this->rank}) as t")[0]->place_in_rank+1;
    // return \App\Rank::select(\DB::raw('AVG(ranks.value)'))
    //                             ->groupBy('song_id')
    //                             ->havingRaw("AVG(ranks.value)>".$this->rank())
    //                             ->count();
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
        return $this->hasMany('App\Comment');
    }

    public function country()
    {
        return $this->composer->country();
    }

    public function getPhotoAttribute()
    {
        return $this->performer->photo;
    }

    public function genre()
    {
        return $this->belongsTo('App\Genre');
    }
}
