<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Basket;
use App\Models\Checkout;
use App\Models\Orders;
use App\Models\Products;

class CheckoutController extends Controller
{
    public function showOrder() {
        //get all the products that a user has put in their basket
        $products = Basket::where('user_id', auth()->user()->id)->get();

        $totalPrice = 0;
        foreach($products as $product) {
            $totalPrice += $product->product_price * $product->quantity;
        }


        $checkout = new Checkout();
        $checkout->user_id = auth()->user()->id;
        $checkout->name = auth()->user()->name;
        $checkout->subtotal = $totalPrice;

        $checkout->save();

        $checkout->id;

            foreach($products as $basketProduct) {
                $orderDetails = new Orders();
                $orderDetails->order_id = $checkout->id;
                $orderDetails->product_id = $basketProduct->product_id;
                $orderDetails->quantity = $basketProduct->quantity;
                $orderDetails->subtotal = $basketProduct->product_price * $basketProduct->quantity;

                $orderDetails->save();

                //update stock levels
                $product = Products::findorfail($basketProduct->product_id);
                $product->product_stock -= $basketProduct->quantity;
                $product->save();

            }



        //delete the basket
        Basket::where('user_id', auth()->user()->id)->delete();

        return view('/checkout', ['products' => $products]);
    }
}
