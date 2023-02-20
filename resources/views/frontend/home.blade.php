@extends('layouts.main')

@section('content')
    <div class="home">

        <div class="home-bg">
            <h1>Welcome to Celessentials</h1>
            <a href="/products">View our products</a>
        </div>
    </div>

    <section class="home-about" id="about">

        <div class="about-text">
            <span>About Us</span>
            <h2>The Site For Celebrities</Table>
            </h2>
            <p>..........</p>
            <a href="{{ url('/about_us') }}" class="button">Find Out More</a>
        </div>
    </section>
@endsection
