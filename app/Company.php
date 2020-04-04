<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'id',
        'name',
        'description',
        'user_id',
    ];

    public function users(){
        return $this->belongsTo('App\User');
    }

    public function works(){
        return $this->hasMany('App\Work');
    }

    public function comments(){
        return $this->morphMany('App\Comment', 'commentable');
    }
}
