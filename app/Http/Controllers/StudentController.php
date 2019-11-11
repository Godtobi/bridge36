<?php

namespace App\Http\Controllers;
use App\User;
use App\PaidCourses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Helpers\StudentHelper;

class StudentController extends Controller
{
    protected $studentHelper;

    public function __construct(StudentHelper $studentHelper)
    {
        $this->middleware('auth');
        $this->studentHelper=$studentHelper;
    }

    public function index(){

        $user=DB::table('users')->where('id',auth()->user()->id)->get()[0];
        $courses=DB::table('courses')->where('active',true)->take(3)->get();

        return view('student.student-dashboard',compact('user','courses'));
    }

    public function profile(){
//        $user=DB::table('users')->where('id',auth()->user()->id)->get()[0];
        $user = User::findOrFail(auth()->user()->id);
        return view('student.student-profile',compact('user'));
    }

    public function profileUpdate(){
//        $user=DB::table('users')->where('id',auth()->user()->id)->get()[0];
        $user = User::findOrFail(auth()->user()->id);
        return view('student.student-updateprofile',compact('user'));
    }

    public function studentCourses(){
        $courses=DB::table('courses')->where('active',true)->get();
        $paid=DB::table('paid_courses')->where('user_id',auth()->user()->id)->get();
        $bucket=[];
        foreach($paid as $item){
            array_push($bucket,$item->course_id);
        }
        return view('student.student-courses',compact('courses','bucket'));
}
    public function mycourses(){
        $allcourses=DB::table('paid_courses')->where('user_id',auth()->user()->id)->get();

        $courses=[];
        foreach ($allcourses as $item){
            $ans=DB::table('courses')->where('id',$item->course_id)->get();
            array_push($courses,$ans);}

        return view('student.my-courses',compact('courses'));
    }

    public function subscription(){

        return view('student.student-billing');
    }

    public function updatePassword(){
        $data=request()->validate([
            'password' => ['required', 'string', 'min:8'],
            'new-password'=>'required',
            'confirm-pass'=>'required'
        ]);

        $user = User::findOrFail(auth()->user()->id);

        If($data['new-password']==$data['confirm-pass']){

            if(Hash::check($data['password'],$user->password)){
                $user->password=Hash::make($data['new-password']);
                $user->save();
                $type='success';
                $message='Password changed Succesfully';
            }
            else{
                $type='error';
                $message='Your current Password is Incorrect';
            }
        }
        else{
            $type='error';
            $message='Password Dont Match';
        }

        return redirect()->back()->with([$type => $message]);

    }

    public function updateProfile(Request $request){

        $data = request()->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'phone'=>'',
            'email'=>'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user = User::findOrFail(auth()->user()->id);
        $user->firstname = $data['firstname'];
        $user->lastname = $data['lastname'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];

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
        $user->save();
        return redirect()->back()->with(['success' => 'Profile updated successfully.']);

    }

    public function password(){
        return view('student.student-passwordupdate');
    }

    public function students(){
        $students = $this->studentHelper->adminSelectAll();

        return view('admin.students',compact('students'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if (empty($user)) {
          return back()->with('error','user not found');
        }

        $user->active = ($user->active == 0) ? 1 : 0;
        $title = ($user->active == 1) ? "enabled" : "disabled";


        $user->save();
        return back()->with('success','Student ' .$title.' Successfully');
    }

    public function subscribe($course,$price){
        return view('student.pay',compact('course','price'));
    }

    public function pay(){

        $data=request()->validate([

            'course_id'=>'',

        ]);
        $courseName=DB::table('courses')->where('id',$data['course_id'])->value('name');
        $data['course_name']=$courseName;
        $data['user_id']=auth()->user()->id;

        if(PaidCourses::create($data)){
            return redirect()->route('curriculum',$data['course_id'])->with('success','Payment Was Succesfull');
        }
        else{
            return back()->with('error','Something went wrong please try again.');
        }
    }

    public function courseStudent($id){
        $students=DB::table('paid_courses')->where('course_id',$id)
            ->join('users', 'users.id', '=', 'paid_courses.user_id')
            ->where('users.id','paid_courses.user_id')
            ->select('users.lastname','users.firstname','users.email')
            ->get();

        return view('admin.course-students',compact('students','id'));

    }
}
