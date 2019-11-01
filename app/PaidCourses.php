<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaidCourses extends Model
{
    protected $fillable =['course_id','course_name','user_id'];
}
