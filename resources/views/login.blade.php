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
        <div class="login">
            <h1>Login</h1>
            <p>Please enter your email and password to log in.</p>
        </div>
        <div class="content">

            <form action="{{ url('/login') }}" method="POST">
                @csrf
                <label for="email"> Email:</label>
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
    </section>
@endsection
