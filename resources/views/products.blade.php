@extends('layouts.main')

@section('content')

<div>
    <h1>All of our Products</h1>
</div>

<div>
    
    @foreach($products as $product)
    <a href="/products/{{ $product->product_id }}">
        <img src="/productImages/{{ $product->product_image }}" alt="image" height="250" width="250"> <br>
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