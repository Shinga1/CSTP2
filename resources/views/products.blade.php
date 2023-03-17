@extends('layouts.main')

@section('content')
    <section class="products-page" id="products">
        <div class="products-container">
            <h1>All of our Products</h1>

            <div class="products-filter">
                <h2>Filter by:</h2>
                <p>
                    <a href="/products">All categories</a>
                    <a href="/products/category/Beauty">Beauty</a>
                    <a href="/products/category/Electronics">Electronics</a>
                    <a href="/products/category/Food">Food</a>
                    <a href="/products/category/Perfumes">Perfumes</a>
                    <a href="/products/category/Books">Books</a>
                    <a href="/products/sorted/high-to-low" class="high-low">High - low</a>
                    <a href="/products/sorted/low-to-high" class="low-high">Low - high</a>
                </p>
            </div>

            <div class="products-list">
                @foreach ($products as $product)
                    <a href="/products/{{ $product->product_id }}" class="product-card">
                        <img src="/assets/images/productImages/{{ $product->product_image }}" alt="image"
                            class="product-image"> <br>
                        <span class="product-name">{{ $product->product_name }}</span> <br>
                        <span class="product-price">£{{ $product->product_price }}</span> <br>

                        @if ($product->product_stock > 0)
                            <span class="product-stock in-stock">In stock</span>
                        @else
                            <span class="product-stock out-of-stock">Sorry this product is currently out of stock</span>
                        @endif

                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
