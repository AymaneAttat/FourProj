<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'description',
        'company_id',
        'user_id',
        'work_id',
        'days',
        'hours',
    ];

    public function works(){
        return $this->belongsTo('App\Work');
    }

    public function companies(){
        return $this->belongsTo('App\Company');
    }

    public function users(){
        return $this->belongsToMany('App\User');
    }

    public function comments(){
        return $this->morphMany('App\Comment', 'commentable');
    }

}
