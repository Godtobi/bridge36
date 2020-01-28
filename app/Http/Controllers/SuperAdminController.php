<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class SuperAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

  public function create(){
      return view ('admin.create_user');
  }

  public function store(Request $request){
      $data=request()->validate([
          'firstname' => ['required', 'string', 'max:255'],
          'lastname' => ['required', 'string', 'max:255'],
          'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
          'password' => ['required', 'string', 'min:8', 'confirmed'],
          'country'=>'required',
          'role'=>'required',
          'image'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
          'phone'=>''
      ]);


      $user=new User();

      if ($request->has('image')) {
          $image = $request->file('image');
          $image_resize=Image::make($image)->resize(320,240);
          $name = Str::slug($request->input('firstname')).'_'.time();
          $folder = '/uploads/';
          $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
          $image_resize->save('storage'.$filePath);
//            $this->uploadOne($image_resize, $folder, 'public', $name);
          $user->image = $filePath;
      }

      $user->firstname=$data['firstname'];
      $user->lastname=$data['lastname'];
      $user->phone=$data['phone'];
      $user->country=$data['country'];
      $user->email=$data['email'];
      $user->password=Hash::make($data['password']);

      if($user->save()){
          if($data['role']==1){
              $user->assignRole('admin');
          }
          else if($data['role']==2){
              $user->assignRole('facilitator');
          }
          else  if($data['role']==4){
              $user->assignRole('canada_admin');
          }
          else if($data['role']==5){
              $user->assignRole('nigeria_admin');
          }
          else{
              $user->assignRole('student');
          }

          return back()->with('success','User created successfully');
      }

      return back()->with('error','Something went wrong please try again');
  }
}
