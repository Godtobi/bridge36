<?php
/**
 * Created by PhpStorm.
 * User: MY PC
 * Date: 11/10/2019
 * Time: 7:30 AM
 */

namespace App\Helpers;
use App\User;
use Illuminate\Support\Facades\DB;

class FacilitatorsHelper
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

    public function facilitators(){

        if(auth()->user()->hasAnyRole(['admin'])){
            $facilitators=User::whereHas('roles', function ($q) {
                $q->Where('name', 'facilitator'); })->get();

        }
        else{
            $facilitators=User::where('country',$this->country())->whereHas('roles', function ($q) {
                $q->Where('name', 'facilitator'); })->get();
        }
        return $facilitators;
    }
}