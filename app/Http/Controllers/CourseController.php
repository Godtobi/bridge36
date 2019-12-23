<?php

namespace App\Http\Controllers;

use App\Lessons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Courses;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use League\Flysystem\Exception;
use App\Tutors;
use Gufy\PdfToHtml\Pdf;
use PhpOffice\PhpWord\IOFactory;


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

        if(!$courseName){

        }


        $course = Courses::findorfail($id);
        $querry = DB::table('lessons')
            ->join('modules', 'modules.id', '=', 'lessons.module_id')
            ->where('modules.course_id', $id)
            ->select('modules.name as module_name', 'lessons.name as lesson_name', 'modules.description as mod_d','modules.id as id')
            ->get();

        //dd($querry);



        $counter=0;
        $bucket = [];

        foreach ($querry as $item) {
            if (!in_array($item->module_name, $bucket)) {
                array_push($bucket, $item->module_name);
            }
        }
        $total = count((array)$bucket);
        //dd($total);

        $container=[];

        foreach ($bucket as $item){
            $counter=0;
            while ($counter!=$total){
                if($item==$querry[$counter]->module_name){
                    $container[$item]=$querry[$counter];
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

        public function curriculumLesson($course_id,$module_id){
            $courseName=DB::table('paid_courses')->where('user_id',auth()->user()->id)->where('course_id',$course_id)->exists();
            $course = Courses::findorfail($course_id);
            if(!$courseName){
                return back()->with('error','Course not found');
            }

            $lessons = DB::table('lessons')->where('module_id',$module_id)->get();

            return view('student.lesson',compact('lessons','course'));

        }

        public function serveHtml(){
            $doc = public_path('uploads/2AjpCfrl_1577103077.docx');
            $phpword= IOFactory::load($doc);
            $html=IOFactory::createWriter($phpword,'HTML');
            $name=Str::random(7);
            $html->save(public_path('uploads/html/'.$name.'.html'));

            return File::get(public_path('uploads/html/'.$name.'.html'));

        }


}
