<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'role',
        'user_id',
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }
}
