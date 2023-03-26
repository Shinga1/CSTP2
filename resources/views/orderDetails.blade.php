@extends('layouts.main')

@section('content')
    <div class="orderDetails">
        <div class="order">
            <h1>Details of your order</h1>
            <table>
                <thead>
                    <th>Product Image</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </thead>
                <tbody>
                    @foreach ($allProducts as $product)
                        <tr>
                            <td><img src="/assets/images/productImages/{{ $product['image'] }}" alt="image"
                                    height="150"width="150"></td>
                            <td>{{ $product['name'] }}</td>
                            <td>{{ $product['quantity'] }}</td>
                            <td>£{{ $product['price'] }}</td>
                        </tr>
                        <br><br>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <td colspan="3">Total you paid</td>
                        <td>£{{ $subtotal }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
