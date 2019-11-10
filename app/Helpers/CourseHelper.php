<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use App\Courses;

class CourseHelper
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
            $courses=DB::table('courses')->take(6)->get();
        }
        else{
            $courses=DB::table('courses')->where('country',$this->country())->take(6)->get();
        }
     return $courses;
    }

    public function adminSelectAll(){
        if(auth()->user()->hasAnyRole(['admin'])){
            $courses=DB::table('courses')->get();
        }
        else{
            $courses=DB::table('courses')->where('country',$this->country())->get();
        }
        return $courses;
    }

    public function studentSelectSix(){

    }

    public function studentSelectAll(){

    }

}