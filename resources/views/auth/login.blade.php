@extends('layouts/app')

@section('content')
<link rel="stylesheet" href="{{ url('css/login.css') }}">
    @guest
    <div class="form-container">
        <div class="shadow"></div>
        <form action="{{route('login')}}" method="post" class="form">
            @csrf
            @if(session('status'))
                <div class="">
                     Invalid Credentials
                </div>
            @endif
            @if(session('success'))
                <div class="">
                     Seu email foi verificado com sucesso.
                </div>
            @endif
            <div>
                <input type="text" name="username" class="@error('username') border-danger @enderror" placeholder="Username..." autocomplete="username" value="{{old('username')}}"> 
                
                @error('username')
                <div class="">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div>
                <input type="password" name="password" class="@error('password') border-danger @enderror" placeholder="Password...">

                @error('password')
                    <div class="">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <p>Manter logado: <input type="checkbox" name="remember_token" id="remember_token" class=""></p>
            <button type="submit" class="">Login</button>
            <a href="{{url('/forgot-password')}}" class="">Esqueci minha senha</a>
        </form>
    </div>
    @endguest
@endsection