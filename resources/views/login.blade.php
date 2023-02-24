@extends('layouts.main')

@section ('content')

<div class="about_us">

    <div class="home-bg">
    <form action="/login.C.php">
        <label for="uname">User name:</label><br>
        <input type="text" id="uname" name="uname"><br>
        <label for="pword">Password:</label><br>
        <input type="text" id="pword" name="pword">
        <input type="Login" value="Login">
</form>
    </div>
</div>
