<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function show() {
        $orders = Checkout::where('user_id', auth()->user()->id)->get();
        return view('/previousOrders', ['orders' => $orders]);
    }

    public function orderDetails($id) {
        $products = Orders::where('order_id', $id)->get();

        $allProducts = [];

        for($i = 0; $i<count($products); $i++) {
            $product = Products::findorfail($products[$i]['product_id']);
            array_push($allProducts, [
                'name' => $product->product_name,
                'image' => $product->product_image,
                'price' => $product->product_price,
                'quantity' => $products[$i]['quantity'],
            ]);
        }

        $order = Checkout::findorfail($id);
        $subtotal = $order->subtotal;

        return view('/orderDetails', ['allProducts' => $allProducts, 'subtotal' => $subtotal]);
    }
}
