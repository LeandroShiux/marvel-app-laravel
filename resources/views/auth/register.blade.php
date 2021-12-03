@extends('layouts/app')

@section('content')
<link rel="stylesheet" href="{{ url('css/register.css') }}">

    <div class="form-container">
        <div class="shadow"></div>
        <form action="{{route('register')}}" method="post" class="form">
            @csrf
            <div>
                <input type="text" name="name" class="@error('name') danger @enderror" placeholder="Name..." autocomplete="name" value="{{old('name')}}">  
                @error('name')
                    <div class="">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div>
                <input type="text" name="username" class="@error('username') danger @enderror" placeholder="Username..." autocomplete="username" value="{{old('username')}}"> 
                @error('username')
                <div class="">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div>
                <input type="email" name="email" class=" @error('email') danger @enderror" placeholder="Email..." autocomplete="email" value="{{old('email')}}">

                @error('email')
                    <div class="">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div>
                <input type="password" name="password" class=" @error('password') danger @enderror" placeholder="Password...">

                @error('password')
                    <div class="">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div>
                <input type="password" id="password_confirmation" name="password_confirmation" class="@error('password_confirmation') danger @enderror" placeholder="Repeat your password..."> 
            </div>
            <div>
                <button type="submit" class="">Register</button>
            </div>
            <span>Já possui uma conta?  <a href="{{ route('login')}}">Login</a><span>
        </form>
    </div>
@endsection
