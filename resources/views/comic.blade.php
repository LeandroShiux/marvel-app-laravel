@extends('layouts/app')

@section('content')
<link rel="stylesheet" href="{{ url('css/comic.css')}}">
   @if($result != null)
   <div class="container">
    <div class="content">
        <div class="hqimage">
            <img src="{{ $result['thumbnail']['path'].'/portrait_xlarge.'.$result['thumbnail']['extension'] }}" alt="photo" width="150"> 
            <p>&copy; 2021 Marvel</p>
        </div>
        <div class="info">
            <p>ID: <span>{{ $result['id'] }}<span></p>
            <p>Título: <span>{{ $result['title'] }}<span></p>
            <p>Páginas: <span>{{ $result['pageCount'] }}</span></p>
            <p>Preço: <span>R${{ $result['prices'][0]['price'] }}</span></p>
            <div class="barcode">
                <p class="code">{{ $result['upc']}}</p>
                <i class="fas fa-barcode"></i>
            </div>
        </div>
    </div>
    <div class="posts-container">
        @auth
            <form action="{{ route('comic') }}" method="post" class="form-posts">
                @csrf
                <div>
                    <textarea name="body" cols="80" rows="15" class="textarea @error('body') danger @enderror" placeholder="Escreva seu comentário..."></textarea>
                    @error('body')
                        <div class="">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <button class="btn" type="submit" class="">Post</button>
                </div>
            </form>
        @endauth
        @if($posts != null)
            @foreach ($posts as $post)
                <div class="post">
                    <div class="header">{{ $post->user->username }} <span>{{$post->created_at->diffForHumans() }}</span></div>
                    <p class="postbody">{{ $post->body }}</p>
                    <div class="buttons">
                        @auth
                        @if(!$post->likedBy(auth()->user()))
                            <form action="{{ route('post.likes', $post) }}" method="post" class="likeform">
                                @csrf
                                <button type="submit" class="likebtn">Like</button>
                            </form>
                        @else
                            <form action="{{ route('post.likes', $post) }}" method="post" class="unlikeform">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="unlikebtn">Unlike</button>
                            </form>
                        @endif
                    @endauth
                    <span class="countlikes">{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
                        @can('delete', $post)
                        <form action="{{ route('post.destroy', $post) }}" method="post" class="deleteform">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="deletebtn">Delete</button>
                        </form>
                    @endcan
                    </div>
                </div>
            @endforeach
        @else
            <p>Ainda não tem posts,faça um comentário!</p>
        @endif
    </div>
    </div>
   @endif   
@endsection