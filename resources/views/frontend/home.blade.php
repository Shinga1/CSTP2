@extends('layouts.main')

@section('content')
    <div class="home">

        <div class="home-bg">
            <img src=".png">
            <h1>aspire to inspire.</h1>
            <a href="/products">View our products</a>
        </div>
    </div>

    <section class="home-about" id="about">

        <div class="about-text">
            <span>About Us</span>
            <h2>The Site For Celebrities 💫</h2>
            <p>Celessentials is the stop for all your celebity related needs. Whether you want to jazz up your life with
                tech or relax with a book. We have it all. From books to electronics, clothes to shoes and finally beauty to
                put it all together.</p>
            <a href="{{ url('/about_us') }}" class="button">About Celessentials</a>
        </div>
    </section>

    <section class="home-discover" id="discover">

        <span>Discover what we have in store</span>

        <div class="discover-text">
            <a href="{{ url('/') }}" class="button">Apparel</a>
            <a href="{{ url('/') }}" class="button">Electronics</a>
            <a href="{{ url('/') }}" class="button">Drinks</a>
            <a href="{{ url('/') }}" class="button">Beauty</a>
            <a href="{{ url('/') }}" class="button">Books</a>
        </div>
    </section>

    <section class="home-products" id="products">
        <div class="product-row">
            <div class="product">
                <img src="photo1.jpg" alt="Product 1">
                <button>View Details</button>
            </div>
            <div class="product">
                <img src="photo2.jpg" alt="Product 2">
                <button>View Details</button>
            </div>
            <div class="product">
                <img src="photo3.jpg" alt="Product 3">
                <button>View Details</button>
            </div>
            <div class="product">
                <img src="photo4.jpg" alt="Product 4">
                <button>View Details</button>
            </div>
            <div class="product">
                <img src="photo5.jpg" alt="Product 5">
                <button>View Details</button>
            </div>
        </div>
    </section>
@endsection
