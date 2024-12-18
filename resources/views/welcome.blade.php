<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


    </head>
    <body class="antialiased">
       <h1>SAMPLE FORM</h1>
       <form action="{{route('submit')}}" method="POST">
       {{-- <form action="{{route('abeiku.richard.foster')}}" method="POST"> --}}
        @csrf
        <label for="">Name</label><br>
        <input type="text" name="myName" id=""><br>
        <label for="">Age</label><br>
        <input type="text" name="myAge" id=""><br><br>
        <button type="submit">Send to controller</button>
       </form>

       <div>
        <table>
            <thead>
                <th>ID</th>
                <th>Name</th>
            <th>Age</th>
            </thead>
            <tbody>
                @foreach ($abouts as $about)
                    <tr>
                        <td>{{$about->id}}</td>
                        <td>{{$about->name}}</td>
                        <td>{{$about->age}}</td>
                        <td><a href="{{route('edit.about', $about->id)}}">Edit</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
       </div>
    </body>
</html>
