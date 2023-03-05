@extends('layouts.main')

@section ('content')

<br><br><br><br><br>

<h1>Here are all your previous orders, {{ auth()->user()->name }}</h1>

<div>
    <table>
        <thead>
            <th>Order Number(s)</th>
            <th>Total paid</th>
            <th>Date of order</th>
            <th>Status of your order(s)</th>
            <th>Details of order</th>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>£{{ $order->subtotal }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->status }}</td>
                    <td><a href="/previous/{{ $order->id }}">View now</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection