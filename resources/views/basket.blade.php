@extends('layouts.main')

@section ('content')

<br><br><br><br>

<div>
    <h1>Basket page</h1>

    @foreach ($basket as $product)
    <div>
        <img src="/assets/images/productImages/{{ $product->product_image }}" alt="image" height="250" width="250">
        {{ $product->product_name }}
        £{{ $product->product_price }}
        {{ $product->quantity }}
    </div>
    @endforeach
</div>


@endsection
