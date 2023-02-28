<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Basket;
use App\Models\Checkout;

class CheckoutController extends Controller
{
    public function showOrder() {
        //get all the products that a user has put in their basket
        $products = Basket::where('user_id', auth()->user()->id)->get();


        foreach($products as $product) {
            $checkout = new Checkout();
            $checkout->user_id = auth()->user()->id;
            $checkout->name = auth()->user()->name;
            $checkout->quantity = $product->quantity;
            $checkout->subtotal = $product->product_price * $product->quantity;

            $checkout->save();
        }

        //delete the basket
        Basket::where('user_id', auth()->user()->id)->delete();

        return view('/checkout', ['products' => $products]);
    }
}
