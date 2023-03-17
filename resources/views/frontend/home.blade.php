@extends('layouts.main')

@section('content')
    <div class="home">

        <div class="bg-effect">
            <div class="stars"></div>

            <img class="main-photo" src="{{ asset('assets/images/logo.png') }}" style = "margin-right: 275px; margin-top: 40px">
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
                        <div class="rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                        </div>
                        <p class="review-text">"I absolutely love Celessentials! Their selection of celebrity-produced
                            products is top-notch, and their customer service is excellent. I've bought a few items from
                            them now, and I've been thrilled with the quality every time."</p>
                        <p class="customer">- Olivia W.</p>
                    </div>
                    <div class="review">
                        <div class="rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <p class="review-text">"Celessentials has a great selection of products, and I'm always excited to
                            see what new items they have. The only reason I'm not giving them 5 stars is because I've had a
                            couple of issues with shipping times, but overall, I've been really happy with my purchases."
                        </p>
                        <p class="customer">- James L.</p>
                    </div>
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
                        <img src="{{ asset('assets/images/productImages/fenty.jpg') }}">
                        <button>Makeup & Beauty</button>
                    </div>
                    <div class="product">
                        <img src="{{ asset('assets/images/productImages/snoop-loopz.jpg') }}">
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
