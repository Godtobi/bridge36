<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Courses;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use League\Flysystem\Exception;
use App\Tutors;
use Gufy\PdfToHtml\Pdf;


class CourseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $courses = DB::table('courses')->get();
        return redirect('admin-course', compact('courses'));

    }

    public function nextCourse(){
        $input = request()->validate([
            'name' => 'required',
            'description' => 'required',]);

        unset($input['_token']);
        Session::put('input', $input);

        return redirect()->route('admin.course.edit-description');

    }

    public function storeCourse(Request $request)
    {
        $input = Session::get('input');

        if($input==''){
            return back()->with('error','You have to create a course  name and description');
        }

        $data = request()->validate([
            'category'=>'required',
            'duration'=>'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
            'price'=>''
        ]);

        if ($request->has('image')) {
            $image = $request->file('image');
            $image_resize=Image::make($image)->resize(320,240);
            $name = Str::slug($input['name']).'_'.time();
            $folder = '/uploads/';
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            $image_resize->save('storage'.$filePath);
            $data['image']=$filePath;
        }

        if (!auth()->user()->hasAnyRole(['admin'])){
            $data['country']=auth()->user()->country;

        }
        else{
            $data['country']=$request->country;
        }

        unset($data['_token']);

        $data=array_merge((array)$input,$data);

        if(auth()->user()->hasAnyRole(['facilitator'])){
            $data['tutor_id']=auth()->user()->id;
        }

        try{
            $check=Courses::create($data)->id;
//            Session::put('id',$check);
            Session::put('input','');

            return redirect()->route('admin.courses')->with('success','Course Created Successfully.');

        }
        catch(Exception $exception){

            return redirect()->route('admin.courses')->with('error','Something went wrong. Please try again');
        }

    }

    public function storecurriculumn()
    {
        $data = request()->validate([
            'chapter' => 'required',
            'description' => 'required',
        ]);

        $check=Courses::create($data);
        if($check){

            return back()->with('success','Course Created Successfully');
        }
        return back()->with('error','Something went wrong. Please try again');
    }

    public function curriculum($id)
    {
        $courseName=DB::table('paid_courses')->where('user_id',auth()->user()->id)->where('course_id',$id)->exists();


        $course = Courses::findorfail($id);
        $querry = DB::table('lessons')
            ->join('modules', 'modules.id', '=', 'lessons.module_id')
            ->where(['modules.course_id' => $id])
            ->select('modules.name as module_name', 'lessons.name as lesson_name', 'modules.description as mod_d','lessons.id as id')
            ->get();



        $total = count((array)$querry);


        $counter=0;
        $bucket = [];

        foreach ($querry as $item) {
            if (!in_array($item->module_name, $bucket)) {
                array_push($bucket, $item->module_name);
            }
        }

        $container=[];

        foreach ($bucket as $item){
            while ($counter!=$total){
                if($item==$querry[$counter]->module_name){
                    $container[$item][$counter]=$querry[$counter];
                }
                $counter+=1;
            }
        }

        if(!$courseName){
            return view('student.unpaid-course', compact('course', 'container','tutor'));
        }


        return view('student.take-course', compact('course', 'container','tutor'));
        }

        public function show_lesson($id){
            $content=DB::table('lessons')->where('id',$id)->get()[0];

            return view('student.lesson-content',compact('content'));
        }


}
