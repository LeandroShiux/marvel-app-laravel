@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{url('css/forgotpassword.css')}}">
    <div class="form-container">
        <form action="{{ route('password.email') }}" method="post" class="form">
            @csrf
            <h4>Entre com seu email e click em 'Send link'. Um link para redefinição de senha será enviado para seu email</h4>
            <input type="email" name="email" style="font-size:12pt;font-family:'Krona One', sans-serif;" class="form-control mb-3 mt-4 @error('email') border-danger @enderror" placeholder="Email..." autocomplete="email" value="{{old('email')}}">
            <button>Send link</button>
        </form>
    </div>
@endsection