<?php

namespace App\Http\Controllers;

use App\Models\Info\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    // public function sayHelloToGirls(Request $myRequest){
    //     // dd($myRequest->all());
    //     $name = $myRequest->name;
    //     $age = $myRequest->age;
    //     //MVC architecture
    // }

    public function showForm(){
        $abouts = About::query()->get();
        return view('welcome', compact('abouts'));
    }

    public function getFormData(Request $abcd){
        dd($abcd->all());
    }

    public function getAboutData($id)
    {
        // dd($id);
        $data = About::query()->find($id);
        dd($data);
    }

    public function showEditPage($id)
    {
        $data = About::query()->find($id);
        return view('about_edit', compact('data'));
    }

    public function updateAboutData(Request $request, $id)
    {
        // dd($request->all(), $id);

        $data = About::query()->find($id);
        if ($data !== null) {
            $name = $request->input('myName');
            $age = $request->myAge;
            // DB::insert("UPDATE abouts SET name = ?, age = ? WHERE id = $id", [$name, $age]);
            $data->update([
                'name' => $name,
                'age' => $age
            ]);

            return 'Hey programmer, it has worked';
        } else {

        }

    }
}
