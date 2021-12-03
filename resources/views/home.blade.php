@extends('layouts/app')

@section('content')
    <link rel="stylesheet" href="{{ url('css/home.css')}}">
    <div class="container">
        <h2 class="maintitle">Busque as melhores HQs pelos melhores preços</h2>
        <img src="{{ url('images/marvellayout.jpg')}}" alt="marvellayout">
    </div>

    @if(isset($results) && $results != null)
    <div class="latest-container">
        <h2 class="subtitle">Lançamentos da última semana</h2>
        <div class="latest">
            @foreach($results as $result)
                <img src="{{ $result['thumbnail']['path'].'/portrait_medium.'.$result['thumbnail']['extension'] }}" alt="photo" width="100">  
            @endforeach
        </div>
    </div>
    @endif
@endsection