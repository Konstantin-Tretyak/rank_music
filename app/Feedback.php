<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends AbstractModel
{
    public $timestamps = ['created_at'];
    protected $fillable = [
        'title'
    ];

}
