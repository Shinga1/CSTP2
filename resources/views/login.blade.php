@extends('layouts.main')

@section ('content')

<div class="about_us">

    <div class="home-bg">
    <form action="/home.blade.php">
        <label for="uname">User name:</label><br>
        <input type="text" id="uname" name="uname"><br>
        <label for="pword">Password:</label><br>
        <input type="text" id="pword" name="pword">
        <input type="Submit" value="Login">
</form>
    </div>
</div>
