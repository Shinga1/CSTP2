<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;



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


/* Main Frontend Routes */
Route::controller(App\Http\Controllers\FrontendController::class)->group(function() {
    Route::get('/', 'home');
    Route::get('/about_us', 'aboutus');
    Route::get('/contact_us', 'contactus');

});

Route::get('/products', [ProductsController::class, 'show']);

Route::get('/products/{id}', [ProductsController::class, 'singleProduct']);

Route::get('/products/category/{product_category}', [ProductsController::class, 'viewByCategory']);
