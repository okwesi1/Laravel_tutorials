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
       <h1>EDIT ABOUT</h1>
       <form action="{{route('update',$data->id)}}" method="POST">
       {{-- <form action="{{route('abeiku.richard.foster')}}" method="POST"> --}}
        @csrf
        <label for="">Name</label><br>
        <input type="text" name="myName" id="" value="{{$data->name}}"><br>
        <label for="">Age</label><br>
        <input type="text" name="myAge" id="" value="{{$data->age}}"><br><br>
        <button type="submit">Update</button>
       </form>
    </body>
</html>
