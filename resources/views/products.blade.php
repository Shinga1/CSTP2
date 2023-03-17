@extends('layouts.main')

@section('content')
    <div class="home">
        <div class="bg-effect">
            <div class="stars"></div>
        </div>
    </div>

    <section class="products-page" id="products">
        <div class="products-container">
            <h1>All of our Products</h1>


            <div class="products-filter">
                <h2>Filter by:</h2>
                <select name="" onchange="location = this.value">
                    <option value="">Please select a filter</option>
                    <option value="/products">All categories</option>
                    <option value="/products/category/Beauty">Beauty</option>
                    <option value="/products/category/Electronics">Electronics</option>
                    <option value="/products/category/Food">Food</option>
                    <option value="/products/category/Perfumes">Perfumes</option>
                    <option value="/products/category/Books">Books</option>
                    <option value="/products/sorted/high-to-low">Price High-to-low</option>
                    <option value="/products/sorted/low-to-high">Price Low-to-High</option>
                </select>
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
