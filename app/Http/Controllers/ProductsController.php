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
}
