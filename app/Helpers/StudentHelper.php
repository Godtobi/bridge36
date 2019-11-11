<?php
/**
 * Created by PhpStorm.
 * User: MY PC
 * Date: 11/10/2019
 * Time: 1:47 AM
 */

namespace App\Helpers;
use App\User;
use Illuminate\Support\Facades\DB;
class StudentHelper
{
    public function country(){
        if(auth()->user()->hasAnyRole(['canada_admin'])){
            $country='canada';
        }
        elseif(auth()->user()->hasAnyRole(['nigeria_admin'])){
            $country='nigeria';
        }
        else{
            $country = '*';
        }
        return $country;
    }

    public function adminSelectSix(){

        if(auth()->user()->hasAnyRole(['admin'])){
            $student=DB::table('users')->take(6)->get();
        }
        else{
            $student=DB::table('users')->where('country',$this->country())->take(6)->get();
        }
        return $student;
    }

    public function messagestudent(){
        if(auth()->user()->hasAnyRole(['admin'])){
            $student=DB::table('users')->where('id','!=',auth()->user()->id)->get();
        }
        elseif(auth()->user()->hasAnyRole(['facilitator'])){
            $student = User::where('country',auth()->user()->country)->where('id','!=',auth()->user()->id)->whereHas('roles', function ($q) {
                $q->Where('name', 'student'); })
                ->whereHas('courses', function ($q) {
                    $q->Where('tutor_id',auth()->user()->id); })->get();
        }
        else{
            $student=DB::table('users')->where('country',auth()->user()->country)->where('id','!=',auth()->user()->id)->get();
        }
        return $student;
    }



    public function adminSelectAll(){
        if(auth()->user()->hasAnyRole(['admin'])){

            $students = User::whereHas('roles', function ($q) {
                $q->Where('name', 'student'); })->get();
        }
        else{
            $students = User::where('country',$this->country())->whereHas('roles', function ($q) {
                $q->Where('name', 'student'); })->get();
        }

        return $students;
    }

    public function studentSelectSix(){

    }

    public function studentSelectAll(){

    }



}