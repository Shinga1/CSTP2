@extends('layouts.main')

@section('content')

<div>
    <h1>{{ $product->product_name }}</h1>
    <img src="/assets/images/productImages/{{ $product->product_image }}" alt="image" height="250" width="250"> <br>

    Product Description: {{ $product->product_description }} <br>

    Price: £{{ $product->product_price }} <br>
    
    @if($product->product_stock > 0)
        In stock
    @else
        Sorry this product is currently out of stock
    @endif

</div>
@endsection