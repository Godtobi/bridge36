<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable=['course_id','option_a','option_b','option_c','option_d','answer','question'];
}
