<?php

namespace App\Http\Controllers;

use App\Questions;
use App\UserExamination;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserExaminationController extends Controller
{
    public function index()
    {
        return view('student.take-quiz');
    }

    public function getQuestions(Questions $questions, $question_id, $course_id)
    {
        //Get Exam Questions for a particular Course.
        $getAQuestion = $questions->with("options")->where('course_id', $course_id)->find($question_id);
        $allQuestions = $questions->with("options")->where('course_id', $course_id)->get();

        //Checking for last Questions.
        if ($question_id > $allQuestions->last()->id) {
            //TODO: Successfully Finished Exam
            return "Done";
        }

        if ($getAQuestion) {
            //Shuffle Options
            $options = $this->shuffleOptions($getAQuestion);
        }
        return view('student.take-quiz', compact('getAQuestion', 'allQuestions', 'options'));
    }

    //Shuffles Questions Options.
    private function shuffleOptions($question): array
    {
        $options = array();
        array_push($options, $question->options->option_a);
        array_push($options, $question->options->option_b);
        array_push($options, $question->options->option_c);
        array_push($options, $question->options->option_d);
        array_push($options, $question->options->option_e);
        shuffle($options);
        return $options;
    }

    public function startExam($course_id, Questions $questions)
    {
        //Get Exam Questions for a particular Course.
        $question = $questions->with("options")->where('course_id', $course_id)->latest()->first();
        if ($question) {
            //Shuffle Options
            $options = $this->shuffleOptions($question);
        } else {
            //TODO: Response for no question.
            return "No Question available for this Course";
        }
        $questions = $questions->with("options")->where('course_id', $course_id)->get();

        return view('student.take-quiz', compact('question', 'questions', 'options'));
    }

    public function submitAnswers(Request $request, UserExamination $userExamination)
    {
        //Ajax auto submit answers.
        $question_id = $request->input("question_id");
        $course_id = $request->input("course_id");
        $answer = $request->input("answer");
        $user = Auth::user();
        $time = Carbon::now()->minute;

        if (!is_null($question_id)) {
            //Delete previous answer if already exists
            $userExamination->where("question_id", $question_id)->delete();

            $data["question_id"] = $question_id;
            $data["user_id"] = $user->id;
            $data["user_answer"] = $answer;
            $data["course_id"] = $course_id;
            //TODO: Change to Real time.
            $data["time"] = $time;

            $create = $userExamination->create($data);
            if ($create) {
                return response()->json(['message' => 'successfully added']);
            } else {
                return response()->json(['message' => 'error while adding']);
            }
        } else {
            return response()->json(['message' => 'error while submitting']);
        }
    }

    public function finishExam(UserExamination $userExamination, $course_id)
    {
        //TODO: Display for User Results.

        //Get correct answer for that Questions
        $questions = Questions::where("course_id", $course_id)->select("id", "answer")->get();
        //Get all users answer for a course
        $usersAnswers = $userExamination->where("course_id", $course_id)->get();

        $result = array();
        foreach ($questions as $question) {
            $an = $usersAnswers->where('question_id', $question->id)->first();

            //Checking Correct and Wrong Answers
            if($an->user_answer === $question->answer){
                $result['correct_answers'][$an->question_id] = $an->user_answer;
            }else{
                $result['wrong_answers'][$an->question_id] = $an->user_answer;
            }
        }
        $overAll = count($result['correct_answers']) / count($questions) * 100;
        $result['overall'] = $overAll;
        return response()->json($result);
    }
}
