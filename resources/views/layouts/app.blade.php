<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    <title>Splendor Comics</title>
</head>

<body>
    <nav class="navbar">
      <div class="links">
        <div class="brand">SPLENDOR COMICS</div>
        <div class="pages"> 
          <a href="{{route('home')}}">Home</span></a>
          <a href="{{route('comics')}}">Comics</a>
          <!--Logo abaixo o link de acesso somente para ADMs-->
          @auth
            @can('access')
              <a href="{{route('admin')}}"><span class="button">Admin</span></a>
            @endcan
          @endauth
        </div>
      </div>
        <div class="authlinks">
          @guest
            <a href="{{ route('login') }}" class="">Login</a>
            <a href="{{route('register')}}" class="n">Register</a>
          @endguest
          @auth
            <a href="" style="text-decoration:none;">{{auth()->user()->username}}</a>
            <form action="{{route('logout')}}" method="post" class="form-logout">
              @csrf
              <button type="submit">Logout</a>
            </form>
          @endauth
        </div>
      </nav>

        <div class="">
            @yield('content')
        </div>
</body>
</html>