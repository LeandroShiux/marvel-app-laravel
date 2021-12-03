@extends('layouts.app')

@section('content')
    <div class="container w-50">
        <form action="{{ route('password.update') }}" method="post" class="form-group">
            @csrf
            <input type="hidden" name="token" value="{{$token}}">
            <div>
                <input type="email" name="email" style="font-size:12pt;font-family:'Krona One', sans-serif;" class="form-control mb-3 mt-4 @error('email') border-danger @enderror" placeholder="Email..." autocomplete="email" >

                @error('email')
                    <div class="text-danger mb-4">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div>
                <input type="password" name="password" style="font-size:12pt;font-family:'Krona One', sans-serif;" class="form-control mb-3 mt-4 @error('password') border-danger @enderror" placeholder="New password...">
                @error('password')
                    <div class="text-danger mb-4">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div>
                <input type="password" id="password_confirmation" name="password_confirmation" style="font-size:12pt;font-family:'Krona One', sans-serif;" class="form-control mt-4
                @error('password_confirmation') border-danger @enderror" placeholder="Repeat your new password..."> 
            </div>
            <button class="btn btn-md btn-success mt-4">Save</button>
        </form>
    </div>
@endsection