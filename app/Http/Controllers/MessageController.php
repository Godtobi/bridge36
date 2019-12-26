<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Messages;
use Pusher\Pusher;
use App\Events\Messenger;
use App\Helpers\StudentHelper;

class MessageController extends Controller

{
    protected $studentHelper;
    public function __construct(StudentHelper $studentHelper)
    {
        $this->middleware('auth');
        $this->studentHelper=$studentHelper;
    }

    public function show(){
        $users=$this->studentHelper->messagestudent();
        if(auth()->user()->hasAnyRole(['admin','nigeria_admin','canada_admin','facilitator'])){
            return view('admin.admin-messages',compact('users'));
        }
        return view('student.student-messages',compact('users'));
    }

    public function getMessages($id){

        $user_id=auth()->user()->id;
        $messages = Messages::where(function($query) use ($id, $user_id) {
            $query->where('from', $user_id)
                ->where('to', $id);
        })
            ->orWhere(function ($query) use ($id, $user_id) {
                $query->where('from', $id)
                    ->where('to', $user_id);

            })
            ->orderBy('created_at', 'DESC')->limit(10)->get();

        $user=DB::table('users')->where('id',$user_id)->get()[0];
        $to=DB::table('users')->where('id',$id)->get()[0];
        return view('student.message-board',compact('messages','to','user'))->render();
    }

    public function storeMessage(Request $request){
        $user=auth()->user()->id;
        $reciever=$request->receiver_id;
        $message=$request->message;
        $users=DB::table('users')->where('id',$user)->get()[0];
        $to=DB::table('users')->where('id',$reciever)->get()[0];

        $slave =new Messages();
        $slave->to =$reciever;
        $slave->from =$user;
        $slave->message=$message;

        $slave->save();
        $data=['from'=>$user,'to'=>$reciever,'message'=>$message,'user'=>$users,'rec'=>$to];
        event( new Messenger($data));
    }
}
