<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //Method to show all products on page which are in the database
    public function show() {
        $products = Products::all();
        return view('products', ['products' => $products]);
    }

    //Method to retrieve one product using the id from database
    public function singleProduct($id) {
        $product = Products::findOrFail($id);
        return view('product', ['product' => $product]);
    }

    //Method which retrieves products from database according to category
    public function viewByCategory($product_category) {
        $products = Products::all()->where('product_category', $product_category);
        return view('products', ['products' => $products]);
    }

    
    //Method which sorts all products in database either from high to low or low to high
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
