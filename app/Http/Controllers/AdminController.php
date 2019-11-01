<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use App\Courses;
use Illuminate\Support\Str;
//use Yajra\Datatables\Datatables;
use Yajra\DataTables\Facades\DataTables;
use App\Module;
use App\Lessons;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $courses=DB::table('courses')->take(6)->get();
        $students=DB::table('users')->take(6)->get();
        return view('admin.dashboard',compact('courses','students'));
    }

  public function course(){
      $courses=DB::table('courses')->orderBy('created_at', 'desc')->get();
      $students=DB::table('users')->take(6)->get();
      return view('admin.admin-courses',compact('courses','students'));
  }

    public function createCourse(){
        $students=DB::table('users')->take(6)->get();
        return view('admin.edit-course',compact('students'));
    }

    public function createCourseDescription(){
        $students=DB::table('users')->take(6)->get();
        return view('admin.course-edit-description',compact('students'));
    }

    public function lessons($id){
        $students=DB::table('users')->take(6)->get();
        $lessons=DB::table('lessons')->where('course_id',$id)->get();
        return view('admin.course-lessons',compact('lessons','id','students'));
    }

    public function createLesson($id){
        $students=DB::table('users')->take(6)->get();
        return view('admin.add_lesson',compact('id','students'));
    }

    public function editCourse($id){
        $students=DB::table('users')->take(6)->get();
        $course=Courses::findorfail($id);
        return view('admin.update-course',compact('course','students'));
    }

    public function updateCourse($id){
        $data = request()->validate([
            'name'=>'required',
            'description'=>'required'
        ]);

        $course=Courses::findorfail($id);
        $course->name=$data['name'];
        $course->description=$data['description'];
        $course->save();

        return redirect()->back()->with('success','Course Updated Succesfully');
    }

    public function editDescription($id){
        $course=Courses::findorfail($id);
        $students=DB::table('users')->take(6)->get();
        return view('admin.update-description',compact('course','students'));
    }

    public function updateDescription($id){
        $data = request()->validate([
            'category'=>'required',
            'start'=>'required',
            'end'=>'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $course=Courses::findorfail($id);
        if (request()->has('image')) {
            $image = request()->file('image');
            $image_resize=Image::make($image)->resize(320,240);
            $name = Str::slug($course->name).'_'.time();
            $folder = '/uploads/';
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            $image_resize->save('storage'.$filePath);
            $data['image']=$filePath;
            $course->image=$filePath;
        }


        $course->category=$data['category'];
        $course->start=$data['start'];
        $course->end=$data['end'];
        $course->save();

        return redirect()->back()->with('success','Course Updated Successfully');
    }

    public function getIndex()
    {
        return view('admin.pupil_est');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return Datatables::of(User::query())->make(true);
    }

    public function profile($id){
//        $user=DB::table('users')->where('id',auth()->user()->id)->get()[0];
        $user = User::findOrFail($id);
        $courses=DB::table('paid_courses')->where('user_id',$id)->get();

        return view('admin.student-profile',compact('user','courses'));
    }

    public function moduleCreate($id){
        $students=DB::table('users')->take(6)->get();
        $course=DB::table('courses')->where('id',$id)->get()[0];
        return view('admin.createModule',compact('id','course','students'));
    }

    public function moduleStore(){
        $data = request()->validate([
            'name'=>'required',
            'description'=>'required',
            'course_id'=>'',
        ]);

        if(Module::create($data)){
            return redirect()->back()->with('success','Module Created Successfully');
        }

        return redirect()->back()->with('error','Something wrong please try again');
    }

    public function moduleShow($id){
        $students=DB::table('users')->take(6)->get();
        $modules=DB::table('modules')->where('course_id',$id)->get();
        $course=DB::table('courses')->where('id',$id)->get()[0];
        return view('admin.showmodules',compact('modules','course','students'));
    }

    public function lessonShow($id){
        $students=DB::table('users')->take(6)->get();
        $lessons=DB::table('lessons')->where('module_id',$id)->get();
        $module=DB::table('modules')->where('id',$id)->get()[0];
        return view('admin.lesson-show',compact('lessons','module','students'));
    }

    public function lessonCreate($id){
        $students=DB::table('users')->take(6)->get();
        $module=DB::table('modules')->where('id',$id)->get()[0];
        return view('admin.add_lesson_mod',compact('id','course','module','students'));
    }

    public function lessonStore(){
        $data = request()->validate([
            'name'=>'required',
            'description'=>'required',
            'module_id'=>'',
        ]);

        if(Lessons::create($data)){
            return redirect()->back()->with('success','Lesson Created Successfully');
        }

        return redirect()->back()->with('error','Something wrong please try again');
    }

    public function editLesson($id){
        $students=DB::table('users')->take(6)->get();
        $lesson=DB::table('lessons')->where('id',$id)->get()[0];
        return view('admin.edit_lesson_mod',compact('id','course','lesson','students'));
    }

    public function updateLesson(){
        $data = request()->validate([
            'name'=>'required',
            'description'=>'required',
            'id'=>'',
        ]);

        $lesson=Lessons::findorfail($data['id']);
        $lesson->name=$data['name'];
        $lesson->description=$data['description'];
        if($lesson->save()){
            return redirect()->route('lesson.show',$lesson->module_id)->with('error','Lesson Updated Sucesfully');
        }
        return redirect()->back()->with('error','Something wrong please try again');
    }

    public function editModule($id){
        $students=DB::table('users')->take(6)->get();
        $module=DB::table('modules')->where('id',$id)->get()[0];
        return view('admin.updateModule',compact('id','course','module','students'));
    }

    public function updateModule(){
        $data = request()->validate([
            'name'=>'required',
            'description'=>'required',
            'id'=>'',
        ]);


        $module=Module::findorfail($data['id']);
        $module->name=$data['name'];
        $module->description=$data['description'];
        if($module->save()){
            return redirect()->route('module.show',$module->course_id)->with('error','Lesson Updated Sucesfully');
        }
        return redirect()->back()->with('error','Something wrong please try again');
    }

}
