<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    protected $fillable = ['name','course_id','lesson_id','description','duration'];
}
