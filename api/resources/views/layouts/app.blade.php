<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Posty</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>
<body class="bg-gray-200">
<nav class="p-6 bg-white flex justify-between mb-6">
    <ul class="flex items-center">
        <li><a href="{{route('home')}}" class="p-3">Home</a></li>
        <li><a href="{{route('dashboard')}}" class="p-3">Dashboard</a></li>
        <li><a href="{{route('posts')}}" class="p-3">Post</a></li>
    </ul>
    <ul class="flex items-center">
        @auth
            <li><a href="" class="p-3">Hello, {{Auth::user()->name}}</a></li>
            <li>
                <form action="{{route('logout')}}" method="post" class="p-3 inline">
                    @csrf
                    <button type="submit" >Logout</button>
                </form>
            </li>
        @endauth
        @guest
            <li><a href="{{route('login')}}" class="p-3">Login</a></li>
            <li><a href="{{route('register')}}" class="p-3">Register</a></li>
        @endguest


    </ul>
</nav>

@yield('content')
</body>
</html>
