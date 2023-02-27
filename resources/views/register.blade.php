@extends('layouts.main')

@section('content')
    <br><br><br><br>

    <div>
        <h1>Register</h1>
        <form action="{{ url('/register') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Enter your Name">

            @error('name')
                <div>
                    {{ $message }}
                </div>
            @enderror

            <input type="text" name="email" placeholder="Enter your Email">

            @error('email')
                <div>
                    {{ $message }}
                </div>
            @enderror

            <input type="password" name="password" placeholder="Enter a password">

            @error('password')
                <div>
                    {{ $message }}
                </div>
            @enderror

            <input type="password" name="password_confirmation" placeholder="Reenter password">

            @error('password_confirmation')
                <div>
                    {{ $message }}
                </div>
            @enderror

            <button type="submit" class="bg-danger">Register Now</button>
        </form>
    </div>
@endsection
