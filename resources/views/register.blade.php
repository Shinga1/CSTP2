@extends('layouts.main')

@section('content')
    <br><br><br><br>

    <div>
        <div class="register-font">
            <h1>Register</h1>
        </div>
        <form action="{{ url('/register') }}" method="POST">
            @csrf
            <input type="text" name="name" style="color:white" placeholder="Enter your Name">

            @error('name')
                <div>
                    {{ $message }}
                </div>
            @enderror

            <input type="text" name="email" style="color:white"  placeholder="Enter your Email">

            @error('email')
                <div>
                    {{ $message }}
                </div>
            @enderror

            <input type="password" name="password" style="color:white"  placeholder="Enter a password">

            @error('password')
                <div>
                    {{ $message }}
                </div>
            @enderror

            <input type="password" name="password_confirmation" style="color:white"  placeholder="Re-enter password">

            @error('password_confirmation')
                <div>
                    {{ $message }}
                </div>
            @enderror

            <button type="submit" class="bg-danger">Register Now</button>
        </form>
       
    </div>
@endsection
