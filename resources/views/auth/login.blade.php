@extends('layouts.app')

@section('links')

    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="box">
    <form method="POST" action="{{ route('login') }} " class="box">
        @csrf
        <h1>Login</h1>
        <div class="form-group row">
            <div >
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"  placeholder="email">
                @error('email')
                <span  style="color: white">
                                        {{ $message }}
                                    </span>
                @enderror
            </div>
        </div>
                <input placeholder="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <input type="submit" value="{{ __('Login') }}">


    </form>
    </div>
</div>
@endsection
