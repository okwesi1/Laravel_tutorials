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

    public function showForm()
    {
        $abouts = About::query()->get();
        return view('welcome', compact('abouts'));
    }

    public function getFormData(Request $abcd)
    {
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

    public function getQueryParameters(Request $sampleRequestObject)
    {
        //Because we are making a request by passing/sending data, we need to remember the gentleman called Request
        //Remeber that you can give any name to the request object
        //Let us dd the result
        //ARE YOU GUYS FOLLOWING?
        //Richard, is it clear now? Okay
        dd($sampleRequestObject->all());
        //Let us define our route since we are done with the function
        //Any question before we proceed?
        //Abeiku, can you see the text clearly? okay
        //Why is the array empty?
        //127.0.0.1:8000/users?name=Abeiku&age=300&company=GWOSEVO
        //Compare the above url to the one we entered in the browser
        //http://127.0.0.1:8000/users
        //Great. In other words, we did not provide any query parameters. So let us add some
        //Abeiku wants to fly and go for lunch
        //Let me know if you have any question Richard?
    }
}
