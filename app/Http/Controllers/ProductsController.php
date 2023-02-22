<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function show() {
        $products = Products::all();
        return view('products', ['products' => $products]);
    }

    public function singleProduct($id) {
        $product = Products::findOrFail($id);
        return view('product', ['product' => $product]);
    }

    public function viewByCategory($product_category) {
        $products = Products::all()->where('product_category', $product_category);
        return view('products', ['products' => $products]);
    }

    public function sortByPrice ($price) {

        if ($price == 'low-to-high') {
            $products = Products::all()->sortBy('product_price');

            return view('products', ['products' => $products]);
            
        } else {
            $products = Products::all()->sortByDesc('product_price');

            return view('products', ['products' => $products]);
        }
    }

}
