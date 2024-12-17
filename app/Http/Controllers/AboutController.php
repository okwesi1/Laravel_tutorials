<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    // public function sayHelloToGirls(Request $myRequest){
    //     // dd($myRequest->all());
    //     $name = $myRequest->name;
    //     $age = $myRequest->age;
    //     //MVC architecture
    // }

    public function showForm(){
        return view('welcome');
    }

    public function getFormData(Request $abcd){
        dd($abcd->all());
    }
}
