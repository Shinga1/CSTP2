<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Basket;
use App\Models\Checkout;
use App\Models\Products;

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

            //update stock after checkout
            $product = Products::where('product_id', $product->product_id)->first();
            $product->product_stock -= $checkout->quantity;
            $product->update();
        }

        //delete the basket
        Basket::where('user_id', auth()->user()->id)->delete();

        return view('/checkout', ['products' => $products]);
    }
}
