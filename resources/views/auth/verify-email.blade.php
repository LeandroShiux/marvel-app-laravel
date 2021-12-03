@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ url('css/notify.css')}}">
    <div class="notify">
        <img src="{{ url('images/emailletter.png') }}" alt="Email Letter" width="80">
        <h3 class="content">Um código de verificação foi enviado para seu endereço de email.<h3>
    </div>
@endsection