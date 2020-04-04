<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserWork extends Model
{
    protected $table = "user_work";
    protected $fillable = [
        'work_id',
        'user_id',
    ];
}
