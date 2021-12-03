@extends('layouts/app')

@section('content')
<link rel="stylesheet" href="{{ url('css/emailverified.css')}}">
    <div class="notify">
        <img src="{{ url('images/lockopen.png') }}" alt="Open Lock" width="80">
        <h3 class="content">Parabéns!A sua conta foi verificada com sucesso.<h3>
        <h3 class="content">Agora você pode fazer o Login em Splendor Comics.</h3>
    </div>
@endsection