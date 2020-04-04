<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = [
        'id',
        'name',
        'description',
        'company_id',
        'user_id',
        'days',
    ];

    public function users(){
        return $this->belongsToMany('App\User');
    }

    public function companies(){
        return $this->belongsTo('App\Company');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

}
