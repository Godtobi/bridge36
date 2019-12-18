<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\StudentHelper;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Exam;
class ExamController extends Controller
{
    protected  $studentHelper;
    protected  $id;

    public function __construct(StudentHelper $studentHelper)
    {
        $this->middleware('auth');
        $this->studentHelper=$studentHelper;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $students=$this->studentHelper->adminSelectSix();
        return view('exam.upload_exam',compact('id','students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data = $request->validate([
           'file'=>'required|mimes:xls,xlsx',
           'course_id'=>''
       ]);
        $this->id=$data['course_id'];
        $path=$request->file('file')->getRealPath();
        if(empty($data['course_id'])){
            return redirect()->back()->with('error','Something went wrong. please try again');
        }
        try{
            $exam = new Exam();
            $exam->course_id=$data['course_id'];
            $upload = (new FastExcel)->import($path, function ($line) {


                return Exam::create([
                    'course_id'=>$this->id,
                    'question' => $line['question'],
                    'option_a' => $line['option_A'],
                    'option_b' => $line['option_B'],
                    'option_c' => $line['option_C'],
                    'option_d' => $line['option_D'],
                    'answer' => $line['Correct_Answer'],


                ]);
            });
            return redirect()->back()->with('success','your data was uploaded succesfully');
        }
        catch (\Exception $exception){
            throw $exception;
            return $exception;
            return redirect()->back()->with('error','Incorrect File Formart. Download the file formart example below.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function downloadExample(){
        return response()->download(public_path('images/example.xlsx'));
    }
}
