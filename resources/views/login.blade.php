@extends('layouts.main')

@section('content')
    @if (session()->has('loginNow'))
        <div class="alert alert-danger">
            {{ session()->get('loginNow') }}
        </div>
    @endif

    @if (session('errorMessage'))
        {{ session('errorMessage') }}
    @endif

    <div class="login-page">
        <div class="content">
            <h1 class="title">{{ __('Login') }}</h1>

            <form action="{{ url('/login') }}" method="POST">
                @csrf
                <label for="email">Your Email:</label>
                <input type="email" name="email">

                @error('email')
                    <div class="danger-colour">
                        {{ $message }}
                    </div>
                @enderror

                <label for="password">Password:</label>
                <input type="password" name="password">

                @error('password')
                    <div class="danger-colour">
                        {{ $message }}
                    </div>
                @enderror

                <button type="submit">Login</button>
            </form>
        </div>
    </div>
@endsection
