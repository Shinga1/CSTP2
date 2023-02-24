@extends('layouts.main')

@section('content')

<div>
    <h1>{{ $product->product_name }}</h1>
    <img src="/assets/images/productImages/{{ $product->product_image }}" alt="image" height="250" width="250"> <br>

    <h4>Product Description: {{ $product->product_description }}</h4> <br>

    <h4>Price: £{{ $product->product_price }}</h4> <br>
    
    <h4>@if($product->product_stock > 0)
        In stock

    <h4>Select a quantity:</h4>
        <select name="" id="">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    <br>
    
    <button>Add to basket</button>

    @else
        Sorry this product is currently out of stock
    @endif</h4>

</div>
@endsection