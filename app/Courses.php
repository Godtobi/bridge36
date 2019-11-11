<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{

    protected $fillable = [
        'name','description', 'duration' ,'category','image','price','country'
    ];
}
