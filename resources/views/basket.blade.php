@extends('layouts.main')

@section('content')

    <br><br><br><br>

    @if (auth()->user()->id && $basket->count() == 0)
        <h1>{{ auth()->user()->name }} you currently have nothing in your basket</h1>
        <a href="/products">Go to products page to add to basket</a>
    @else
        @if (session()->has('delete'))
            <div class="alert alert-success">
                {{ session()->get('delete') }}
            </div>
        @endif

        <div class="basket-page">
            <div>
                <h1>Basket page</h1>

                @php
                    $subtotal = 0;
                @endphp

                @foreach ($basket as $product)
                    <div>
                        <img src="/assets/images/productImages/{{ $product->product_image }}" alt="image" height="250"
                            width="250">
                        {{ $product->product_name }}
                        £{{ $product->product_price }}
                        Quantity: {{ $product->quantity }}

                        <a href="/remove/{{ $product->id }}">Remove</a>

                    </div>

                    @php
                        $subtotal = $subtotal + $product->quantity * $product->product_price;
                    @endphp

                    <br><br>
                @endforeach
                <br><br>

                <div>
                    Subtotal = £{{ $subtotal }}

                    <form action="/checkout" method="post">
                        @csrf
                        <button class="bg-danger" type="submit">Buy now</button>
                    </form>
                </div>
            </div>
    @endif

@endsection
