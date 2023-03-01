@extends('layouts.main')

@section('content')
    <br><br><br><br>

    <div>
        <div class="font-colour">
            <br></br>
            <h1>Register</h1>
            <br></br>
        </div>

        <div class="home">
            <div class="bg-effect">
                <div class="stars"></div>
                </div>
            </div>
        </div>
        
        <form action="{{ url('/register') }}" method="POST">
            @csrf
            <input type="text" name="name" style="color:white" placeholder="Enter your Name">

            @error('name')
                <div class="danger-colour">
                    {{ $message }}
                </div>
            @enderror

            <input type="text" name="email" style="color:white"  placeholder="Enter your Email">

            @error('email')
                <div class="danger-colour">
                    {{ $message }}
                </div>
            @enderror

            <input type="password" name="password" style="color:white"  placeholder="Enter a password">

            @error('password')
                <div class="danger-colour">
                    {{ $message }}
                </div>
            @enderror

            <input type="password" name="password_confirmation" style="color:white"  placeholder="Re-enter password">

            @error('password_confirmation')
                <div class="danger-colour">
                    {{ $message }}
                </div>
            @enderror

            <br></br>
            <button type="submit" style="color: black; background: whiteSmoke;">Register Now</button>
        </form>
       
    </div>
@endsection
