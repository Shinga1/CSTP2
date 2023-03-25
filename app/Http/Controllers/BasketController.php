<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Basket;
use App\Models\Products;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BasketController extends Controller
{

    public function __construct() {
        $this->middleware('UserAuth');
    }

    public function show() {
        $basket = Basket::where('user_id', auth()->user()->id)->get();
        return view('/basket', ['basket' => $basket]);
    }

    public function basketStore(Request $request) {
        
        if(auth()->user()) {
            //check the stock of the product so it can be added if the requested amount is availble
            $stock = Products::where('product_id', $request->product_id)->value('product_stock');

            if($stock >= $request->quantity) {
                
            $product_price = Products::findorfail($request->product_id)->product_price;
            $product_name = Products::findorfail($request->product_id)->product_name;
            $product_image = Products::findorfail($request->product_id)->product_image;

            //Create new basket and store it in the session
            $Basket = new Basket;
            Session::push('basket', $Basket);

            //Check product if it exists in the basket
            $currentBasket = Basket::where('user_id', auth()->user()->id)->where('product_id', $request->product_id)->first();

            //If the product is already in basket the quantity just increases otherwise create new basket
            if($currentBasket) {
                $currentBasket->increment('quantity', $request->quantity);
                $currentBasket->update();
            } else {
                $Basket->user_id = auth()->user()->id;
                $Basket->product_id = $request->product_id;
                $Basket->product_image = $product_image;
                $Basket->product_name = $product_name;
                $Basket->email = auth()->user()->email;
                $Basket->product_price = $product_price;
                $Basket->quantity = $request->quantity;
                $Basket->save();
            }
            return redirect()->back()->with('message', 'Product has been sucessfully added to your basket');
        } else {
            return redirect()->back()->with('stockLow', 'Sorry there is only '. $stock . ' available');
            }
        } else {
            return redirect('/login')->with('loginNow', 'You need to login before you add to your basket');
        } 
    }

    public function basketRemove($id) {

        Basket::where('id', $id)->delete();

        return redirect('/basket')->with('delete', "Product removed sucessfully");
    }

    public function getBasketCount() {
        $basketCount = Basket::where('user_id', auth()->user()->id)->sum('quantity');
        return $basketCount;
    }
    
}