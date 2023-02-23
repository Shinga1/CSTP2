@extends('layouts.main')

@section('content')
    <div class="home">

        <div class="bg-effect">
            <div class="stars"></div>

            <img class="main-photo" src="{{ asset('assets/images/') }}">
            <div class="home-bg">
                <h1>aspire to inspire.</h1>
                <a href="/products">View our products</a>
            </div>

            <section class="home-about" id="about">
                <div class="about-text">
                    <h2>The Site For Celebrities 💫</h2>
                    <p>Celessentials is the stop for all your celebity related needs. Whether you want to jazz up your life
                        with
                        tech or relax with a book. We have it all. From books to electronics, clothes to shoes and finally
                        beauty to
                        put it all together.</p>
                    <a href="{{ url('/about_us') }}" class="button">Find Out More</a>
                </div>
            </section>

            <section class="home-reviews">
                <div class="reviews-container">
                    <div class="review">
                        <p class="review-text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit."</p>
                        <p class="customer">- KS</p>
                    </div>
                    <<div class="review">
                        <p class="review-text">"Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                            ac turpis egestas."</p>
                        <p class="customer">- KS</p>
                </div>
                <button class="prev-button"><i class="fas fa-chevron-left"></i></button>
                <button class="next-button"><i class="fas fa-chevron-right"></i></button>
            </section>

            <section class="home-products" id="products">
                <div class="product-row">
                    <div class="product">
                        <img src="{{ asset('assets/images/productImages/yeezy.jpg') }}">
                        <button>Apparel</button>
                    </div>
                    <div class="product">
                        <img src="{{ asset('assets/images/productImages/beats.jpg') }}">
                        <button>Electronics</button>
                    </div>
                    <div class="product">
                        <img src="{{ asset('assets/images/productImages/fenty.png') }}">
                        <button>Makeup & Beauty</button>
                    </div>
                    <div class="product">
                        <img src="{{ asset('assets/images/productImages/snoop-loopz.png') }}">
                        <button>Consumables</button>
                    </div>
                    <div class="product">
                        <img src="{{ asset('assets/images/productImages/book.png') }}">
                        <button>Celebrity Books</button>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
