<?php

namespace App\Http\Controllers;

use App\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use App\Tutors;
use Illuminate\Support\Facades\DB;
use App\User;

class TutorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create ($id){

   return view('admin.create-tutor',compact('id'));
  }
  public function store(){
      $data = request()->validate([
          'firstname'=>'required',
          'lastname'=>'required',
          'phone'=>'',
          'email'=>'required',
          'image'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
          'description'=>'',
          'id'=>''
      ]);

      if (request()->has('image')) {
          $image = request()->file('image');
          $image_resize=Image::make($image)->resize(320,240);
          $name = Str::slug(request()->input('firstname')).'_'.time();
          $folder = '/uploads/';
          $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
          $image_resize->save('storage'.$filePath);
          $data['image']=$filePath;
      }

      $tutor = new Tutors();
      $tutor->firstname=$data['firstname'];
      $tutor->lastname=$data['lastname'];
      $tutor->phone=$data['phone'];
      $tutor->biography=$data['description'];
      $tutor->email=$data['email'];
      $tutor->course_id=$data['id'];
      $tutor->image= $data['image'];
      $tutor->save();

      return redirect()->back()->with('success','Tutor Created Succesfully');
  }

  public function editTutor($id){
      $tutor=DB::table('tutors')->where('course_id',$id)->exists();
      if($tutor){
          $tutor=Tutors::where('course_id','=',$id);
        return view('admin.update-tutor',compact('id','tutor'));
      }
      else{
          return redirect()->route('tutor.create',$id)->with('error','Tutor has not been created for this course. Create one.');

      }
  }

  public function update(){

      $data = request()->validate([
          'firstname'=>'required',
          'lastname'=>'required',
          'phone'=>'',
          'email'=>'required',
          'image'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
          'description'=>'',
          'id'=>''
      ]);
      if (request()->has('image')) {
          $image = request()->file('image');
          $image_resize=Image::make($image)->resize(320,240);
          $name = Str::slug(request()->input('firstname')).'_'.time();
          $folder = '/uploads/';
          $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
          $image_resize->save('storage'.$filePath);
          $data['image']=$filePath;
      }

      $tutor=Tutors::where('course_id','=',$data['id']);
      $tutor->firstname=$data['firstname'];
      $tutor->lastname=$data['lastname'];
      $tutor->phone=$data['phone'];
      $tutor->biography=$data['description'];
      $tutor->email=$data['email'];
      $tutor->course_id=$data['id'];
      $tutor->image= $data['image'];
      $tutor->save();
      return redirect()->back()->with('success','Tutor Created Succesfully');
  }

    public function viewFacilitator($id){
        $course=Courses::find($id);
        $user=User::find($course->tutor_id);
        if($user){

            return view('admin.view-facilitator',compact('id','user'));
        }
        else{
            return back()->with('error','Tutor has not been created for this course.');

        }
    }


}
