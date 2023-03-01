@extends('layouts.main')

@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }} <a href="{{ url('/basket') }}">Do you want to checkout now?</a>
        </div>
    @endif

    @if (session()->has('stockLow'))
        <div class="alert alert-danger">
            {{ session()->get('stockLow') }}
        </div>
    @endif

    <div class="individual-products">
        <div>
            <div class="product-name">
                <h1>{{ $product->product_name }}</h1>
            </div>
            <img src="/assets/images/productImages/{{ $product->product_image }}" alt="image" height="250" width="250">
            <br>

            <div class="product-decription">
                <h4>Product Description: {{ $product->product_description }}</h4> <br>

                <h4>Price: £{{ $product->product_price }}</h4> <br>

                <h4>
                    @if ($product->product_stock > 0)
                        In stock
                        <form action="/basket" method="post">
                            @csrf
                            <h4>Select a quantity:</h4>
            </div>
            <select name="quantity" id=""class="option_color">select one option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <br>

            <input type="hidden" name="product_id" value="{{ $product->product_id }}">
            <button type="submit" class="bg-danger">Add To Basket</button>
            </form>
        @else
            Sorry this product is currently out of stock
            @endif
            </h4>

        </div>
    </div>
@endsection
