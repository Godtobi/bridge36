<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    public function course()
    {
        return $this->belongsTo(Courses::class, 'course_id');
    }

    public function options()
    {
        return $this->hasOne(QuestionOptions::class, 'question_id');
    }

    public function hasUserAnswered($user_id, $question_id)
    {
        logger("Question ID ". $question_id);
        logger("User ID ".$user_id);
        if (UserExamination::where("user_id", $user_id)->where("question_id", $question_id)->exists()) {
            logger("true");
            return true;
        }
        return false;
    }
}
