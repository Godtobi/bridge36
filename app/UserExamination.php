<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserExamination extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function question()
    {
        return $this->hasOne(QuestionOptions::class, 'question_id');
    }
}
