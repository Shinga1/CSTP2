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
        <div class="product-details">
            <div class="product-name">
                <h1>{{ $product->product_name }}</h1>
            </div>
            <div class="product-image">
                <img src="/assets/images/productImages/{{ $product->product_image }}" alt="{{ $product->product_name }}"
                    height="250" width="250">
            </div>
            <div class="product-info">
                <div class="product-decription">
                    <p>{{ $product->product_description }}</p>
                </div>
                <div class="product-price">
                    <p><strong>Price:</strong> £{{ $product->product_price }}</p>
                </div>
                <div class="product-stock">
                    <p><strong>Stock:</strong> {{ $product->product_stock > 0 ? 'In stock' : 'Out of stock' }}</p>
                </div>
                @if ($product->product_stock > 0)
                    <form action="/basket" method="post">
                        @csrf
                        <div class="product-quantity">
                            <label for="quantity">Select a quantity:</label>
                            <select name="quantity" id="quantity" class="option-color">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="product-add-to-cart">
                            <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                            <button type="submit" class="btn btn-primary btn-lg">Add To Basket</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
