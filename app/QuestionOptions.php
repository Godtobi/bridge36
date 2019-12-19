<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Question\Question;

class QuestionOptions extends Model
{
    protected $guarded = [];

    public function questions(){
        return $this->hasOne(Question::class, 'question_id');
    }
}
