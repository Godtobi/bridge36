<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lessons;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use App\Videos;

class LessonController extends Controller
{
    public function __construct()
    {
    }

    public function store(){
        $data = request()->validate([
           'name'=>'required' ,
            'description'=>'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
            'id'=>''
        ]);



        $lesson= new Lessons();
        if (request()->has('image')) {
            $image = request()->file('image');
            $image_resize=Image::make($image)->resize(120,80);
            $name = Str::slug($data['name']).'_'.time();
            $folder = '/uploads/';
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            $image_resize->save('storage'.$filePath);
            $data['image']=$filePath;
            $lesson->image=$data['image'];
        }
        $lesson->name=$data['name'];
        $lesson->description=$data['description'];

        $lesson->course_id=$data['id'];
        $key =$data['id'];
        $lesson->save();
        return redirect()->route('admin.course.lessons',compact('key'))->with('success','Lesson created Successfully');
     }

     public function editLesson($id){
         $lesson=Lessons::findorfail($id);
         $students=DB::table('users')->take(6)->get();
         return view('admin.update-lesson',compact('lesson','id','students'));
     }

    public function update(){
        $data = request()->validate([
            'name'=>'required' ,
            'description'=>'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
            'id'=>''
        ]);
        $lesson=Lessons::findorfail($data['id']);
        if (request()->has('image')) {
            $image = request()->file('image');
            $image_resize=Image::make($image)->resize(120,80);
            $name = Str::slug($data['name']).'_'.time();
            $folder = '/uploads/';
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            $image_resize->save('storage'.$filePath);
            $data['image']=$filePath;
            $lesson->image=$data['image'];
        }


        $lesson->name=$data['name'];
        $lesson->description=$data['description'];

        $lesson->course_id=$data['id'];
        $key =$data['id'];
        $lesson->save();
        return redirect()->route('admin.course.lessons',compact('key'))->with('success','Lesson Updated Successfully');

    }

    public function lessonVideos($course,$lesson){
        $videos=DB::table('videos')->where('course_id',$course)->where('lesson_id',$lesson)->get();
        $students=DB::table('users')->take(6)->get();
        return view('admin.lesson-videos',compact('videos','lesson','course','students'));
    }

    public function createVideo($course,$lesson){
        $students=DB::table('users')->take(6)->get();

        return view('admin.add-video',compact('lesson','course','students'));
    }

    public function storeVideo(){
        $data = request()->validate([
            'name'=>'required' ,
            'description'=>'required',
            'duration'=>'required',
            'video'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
            'course_id'=>'',
            'lesson_id'=>'',
        ]);

        $course=$data['course_id'];
        $lesson=$data['lesson_id'];

        if(Videos::create($data)){
            return redirect('/admin/course/'.$course.'/lesson/'.$lesson)->with('success','Video added Successfully');
        }
        else{
            return view('admin.add-video',compact('lesson','course'))->with('error','something went wrong please try again');
        }
    }
}
