<?php

namespace App;

class Year
{
    public $name, $type, $count;

    public function __construct($years, $type)
    {
        $this->name = $this->id = $years;
        $this->type = $type;
        $this->count = $this->getCount();
    }

    public function yearSongs()
    {
        return \DB::table('songs')->whereBetween('year', array($this->name, $this->name));
    }

    public function decadeSongs()
    {
        return \DB::table('songs')->whereBetween('year', array($this->name, $this->name+9));
    }

    public function centurySongs()
    {
        return \DB::table('songs')->whereBetween('year', array($this->name, $this->name+99));
    }

    public function getCount()
    {
        if($this->type=="decade")
            $diaposon = $this->name+9;
        else if($this->type=="century")
            $diaposon = $this->name+99;
        else
            $diaposon = $this->name;


        return \DB::table('songs')->whereBetween('year', array($this->name, $diaposon));
    }
}