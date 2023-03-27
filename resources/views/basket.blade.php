@extends('layouts.main')


@section('content')
    @if (auth()->user()->id && $basket->count() == 0)
        <h1 class="basket-nothing">{{ auth()->user()->name }} you currently have nothing in your basket</h1>
        <div class="nothing-btn-container">
            <a href="/products" class="nothing-btn">Start shopping</a>
        </div>
    @else
        @if (session()->has('delete'))
            <div class="alert alert-success">
                {{ session()->get('delete') }}
            </div>
        @endif

        <div class="basket-page">
            <div>
                <h1>Basket Page</h1>

                @php
                    $subtotal = 0;
                @endphp

                @foreach ($basket as $product)
                    <div class="image-text">
                        <img src="/assets/images/productImages/{{ $product->product_image }}" alt="image" height="150"
                            width="150">
                        <br>
                        {{ $product->product_name }}
                        <br>
                        £{{ $product->product_price }}
                        <br>
                        Quantity: {{ $product->quantity }}
                        <a class="remove" href="/remove/{{ $product->id }}">Remove</a>
                    </div>

                    @php
                        $subtotal = $subtotal + $product->quantity * $product->product_price;
                    @endphp

                    <br><br>
                @endforeach
                <br><br>

                <div class="basekt-price">
                    Subtotal = £{{ $subtotal }}

                    <form action="/checkout" method="post">
                        @csrf
                        <button class="bg-danger" type="submit">Buy now</button>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection
