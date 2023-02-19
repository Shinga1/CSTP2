@extends('layouts.main')

@section('content')

<div>
    <h1>{{ $product->product_name }}</h1>
    <img src="/productImages/{{ $product->product_image }}" alt="image" height="250" width="250"> <br>

    Product Description: {{ $product->product_description }} <br>

    Price: £{{ $product->product_price }} <br>
    
    @if($product->product_stock == 0)
        Sorry this product is currently out of stock
    @else
        In stock
    @endif

</div>
@endsection