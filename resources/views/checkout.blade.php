@extends('layouts.main')

@section('content')
    <br><br><br><br>

    <h1>Summary of your order, {{ auth()->user()->name }}</h1>

    @php
        $subtotal = 0;
    @endphp

    @foreach ($products as $product)
        <div>
            <img src="/assets/images/productImages/{{ $product->product_image }}" alt="image" height="250" width="250">
            {{ $product->product_name }}
            £{{ $product->product_price }}
            Quantity: {{ $product->quantity }}
        </div>

        @php
            $subtotal = $subtotal + $product->quantity * $product->product_price;
        @endphp
    @endforeach

    <div>
        Total you have paid = £{{ $subtotal }}
    </div>

    <p>View your order details by clicking <a href="/previous">here</a></p>
@endsection
