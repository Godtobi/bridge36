<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Helpers\StudentHelper;
use App\QuestionOptions;
use App\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Rap2hpoutre\FastExcel\FastExcel;

class ExamController extends Controller
{
    protected $studentHelper;
    protected $id;
    protected $exam_date;

    public function __construct(StudentHelper $studentHelper)
    {
        $this->middleware('auth');
        $this->studentHelper = $studentHelper;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = $this->studentHelper->adminSelectSix();
        $questions=[];
        $quest = Questions::all()->unique('course_id');

        if(auth()->user()->hasAnyRole(['admin'])){

            foreach ($quest as $item){

            }

        }
        return view('exam.show',compact('students','questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $students = $this->studentHelper->adminSelectSix();
        return view('exam.upload_exam', compact('id', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'file' => 'required',
            'course_id' => ''
        ]);
//        if (Str::lower($request->file('file')->getClientOriginalExtension())!='csv'){
//            return redirect()->route('exam-create',$data['course_id'])->with('error', 'Only csv file type is allowed');
//        }

        $this->id = $data['course_id'];
        $path = $request->file('file')->getRealPath();

        if (empty($data['course_id'])) {
            return redirect()->route('exam-create',$data['course_id'])->with('error', 'Something went wrong. please try again');
        }
        try {

            $exam = new Exam();
            $exam->course_id = $data['course_id'];


            $collection = (new FastExcel)->import($path);

            foreach ($collection as $entry) {

                if (!is_null($entry['Questions']) && !empty($entry['Questions']) ) {
                    $question = Questions::create(
                        [
                            'course_id' => $this->id,
                            'question' => $entry['Questions'],
                            'answer' => $entry['Correct_Answer'],
                        ]);



                    $questionOption = QuestionOptions::create(
                        [
                            'question_id' => $question->id,
                            'option_a' => $entry['option_A'],
                            'option_b' => $entry['option_B'],
                            'option_c' => $entry['option_C'],
                            'option_d' => $entry['option_D'],
                            'course_id'=>$this->id
                        ]);
                    if (!$question && $questionOption) {
                        return redirect()->route('exam-create',$data['course_id'])->with('error', 'error while uploading your data');
                    }
                }
            }
            return redirect()->route('exam-create',$data['course_id'])->with('success', 'your data was uploaded successfully');
        } catch (\Exception $exception) {

            return redirect()->route('exam-create',$data['course_id'])->with('error', 'Incorrect File Format. Download the file format example below.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function downloadExample()
    {
        return response()->download(public_path('images/example.xlsx'));
    }
}
