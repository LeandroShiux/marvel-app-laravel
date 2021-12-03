@extends('layouts/app')

@section('content')
    <link rel="stylesheet" href="{{ url('css/comics.css') }}">

    <form method="get" class="homeform">
        <input type="text" name="comic" placeholder="Buscar pelo nome do Herói ou Série. Ex:Avengers,Spider-Man,etc.">
        <button>Buscar</button>
    </form>
    <div class="hqcovers">
    @if($results != null)
        @if(!auth()->user())
            <h4 class="guide">Para informações de compra,faça Login na sua conta e clique na HQ!<h4>
        @endif
        @foreach($results as $result)
            <div class="content">
                @if(auth()->user())
                <a href="{{ route('comic',['id' => $result['id']]) }}" >
                    <img src="{{ $result['thumbnail']['path'].'/portrait_xlarge.'.$result['thumbnail']['extension'] }}" alt="photo" width="120"> 
                </a>
                @else
                    <img src="{{ $result['thumbnail']['path'].'/portrait_xlarge.'.$result['thumbnail']['extension'] }}" alt="photo" width="120"> 
                @endif
                <div class="info">
                    <p>Título: &nbsp;<span class="span">{{ $result['title']}}<span></p>
                    <p>Páginas: &nbsp;<span class="span">{{ $result['pageCount']}}</span></p>
                    <p>Preço:  &nbsp;<span class="span">R${{ $result['prices'][0]['price']}}</span></p>
                </div>
            </div>
        @endforeach
    @endif
    </div>
@endsection
