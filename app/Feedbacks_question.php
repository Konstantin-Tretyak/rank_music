<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedbacks_question extends AbstractModel
{
    public $timestamps = ['created_at'];
    protected $fillable = [
        'title', 'type'
    ];

}
