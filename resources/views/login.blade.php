@extends('layouts.main')

@section ('content')

<div class="about_us">
<br><br><br><br>

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
            <div>
                {{ $message }}
            </div>
        @enderror
        
        <br>
        <label for="password">Password:</label><br>
        <input type="password" name="password" style="color: whitesmoke">

        @error('password')
            <div>
                {{ $message }}
            </div>
        @enderror

        <button class="bg-danger" type="submit">Login</button>
</form>
    </div>
</div>
