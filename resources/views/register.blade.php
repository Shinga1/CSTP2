@extends('layouts.main')

@section('content')
    <div class="register-page">
        <div class="content">
            <h1 class="title">{{ __('Register') }}</h1>

            <form action="{{ url('/register') }}" method="POST">
                @csrf

                <label for="name">Enter Your Name:</label>
                <input type="text" name="name">

                @error('name')
                    <div class="danger-colour">
                        {{ $message }}
                    </div>
                @enderror

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

                <label for="password">Re-Enter Password:</label>
                <input type="password" name="password_confirmation">

                @error('password_confirmation')
                    <div class="danger-colour">
                        {{ $message }}
                    </div>
                @enderror

                <button type="submit">Register Now</button>
            </form>
        </div>
    </div>
@endsection
