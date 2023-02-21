@extends('layouts.main')

@section('content')

<br><br><br>
<div>
    <h1>All of our Products</h1>
    
    <h2>View products by a category of your choice:</h2>
    <p>
        <a href="/products">All categories</a>
        <a href="/products/category/Beauty">Beauty</a>
        <a href="/products/category/Electronics">Electronics</a>
        <a href="/products/category/Food">Food</a>
        <a href="/products/category/Perfumes">Perfumes</a>
        <a href="/products/category/Books">Books</a>
    </p>

</div>

<br><br>

<div>
    
    @foreach($products as $product)
    <a href="/products/{{ $product->product_id }}">
        <img src="/assets/images/productImages/{{ $product->product_image }}" alt="image" height="250" width="250"> <br>
        {{ $product->product_name }} <br>
        £{{ $product->product_price }} <br>

        @if($product->product_stock == 0)
            Sorry this product is currently out of stock
        @else
            In stock    
        @endif
        <br><br><br><br>
    </a>    
    @endforeach
    
</div>
@endsection