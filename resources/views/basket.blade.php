@extends('layouts.main')

@section ('content')

<br><br><br><br>

    @if (session()->has('delete'))
        <div class="alert alert-success">
            {{ session()->get('delete') }}
        </div>
    @endif

<div>
    <h1>Basket page</h1>

    @php 
        $subtotal = 0;  
    @endphp

    @foreach ($basket as $product)
    <div>
        <img src="/assets/images/productImages/{{ $product->product_image }}" alt="image" height="250" width="250">
        {{ $product->product_name }}
        £{{ $product->product_price }}
        {{ $product->quantity }}

        <a href="/remove/{{ $product->id }}">Remove</a>
        
    </div>

    @php
        $subtotal = $subtotal + ($product->quantity * $product->product_price);
    @endphp
    
    <br><br>

    @endforeach
    <br><br>

    Subtotal = £{{ $subtotal }}

</div>


@endsection
