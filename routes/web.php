<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/products', [ProductsController::class, 'show']);

Route::get('/products/{id}', [ProductsController::class, 'singleProduct']);

Route::get('/products/category/{product_category}', [ProductsController::class, 'viewByCategory']);
