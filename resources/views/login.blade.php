@extends('layouts.main')

@section ('content')

    <div class="login-title">
    <br> </br><br> </br><br> </br><br>
        <h1>Good to see you again!</h1>
        <br> </br>
    </div>

    <div class="home">
        <div class="bg-effect">
            <div class="stars"></div>
            </div>
        </div>
    </div>

    <div class="about_us">

    @if (session()->has('loginNow'))
        <div class="alert alert-danger">
            {{ session()->get('loginNow') }}
        </div>
    @endif

    <div class="home-bg">

    @if(session('errorMessage'))
        {{ session('errorMessage') }}
    @endif
    <form action="{{ url('/login') }}" method="POST">
        @csrf
        <label for="email">Your email:</label><br>
        <input type="email" name="email" style="color: whitesmoke">
        
        @error('email')
            <div class="danger-colour">
                {{ $message }}
            </div>
        @enderror
        
        <br>
        <label for="password">Password:</label><br>
        <input type="password" name="password" style="color: whitesmoke">

        @error('password')
            <div class="danger-colour">
                {{ $message }}
            </div>
        @enderror

        <button type="submit" style="color: black; background: whiteSmoke;">Login</button>
</form>
    </div>
</div>
