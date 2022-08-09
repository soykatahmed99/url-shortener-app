<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('/')}}asset/css/bootstrap.css">
</head>
<body>

<nav class="navbar navbar-expand bg-dark navbar-dark">
    <div class="container">
        <a href="" class="navbar-brand">URL Shortener</a>
        <ul class="navbar-nav">
            <li><a href="{{route('home')}}" class="nav-link">Home</a></li>
            @if(Session::get('user_id'))
            <li><a href="{{route('user.logout')}}" onclick="event.preventDefault(); document.getElementById('userLogout').submit();" class="nav-link">Logout</a></li>
                <form action="{{route('user.logout')}}" method="post" id="userLogout">
                    @csrf
                </form>
            @else
                <li><a href="{{route('home')}}" class="nav-link">Login</a></li>
                <li><a href="{{route('user.register.page')}}" class="nav-link">Register</a></li>
            @endif

        </ul>
    </div>
</nav>


@yield('body')
<script src="{{asset('/')}}asset/js/bootstrap.js"></script>
</body>
</html>
