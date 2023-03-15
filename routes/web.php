<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\FrontendController;

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

Route::post('/contact_us', [FrontendController::class, 'message']);
Route::get('/contact_us', [FrontendController::class, 'contactus']);

Route::post('/layouts/main', [FrontendController::class, 'subscribe']);

/* Main Frontend Routes */
Route::controller(App\Http\Controllers\FrontendController::class)->group(function() {
    Route::get('/', 'home');
    Route::get('/about_us', 'aboutus');

});

Route::get('/products', [ProductsController::class, 'show']);

Route::get('/products/{id}', [ProductsController::class, 'singleProduct']);

Route::get('/products/category/{product_category}', [ProductsController::class, 'viewByCategory']);

Route::get('/products/sorted/{price}', [ProductsController::class, 'sortByPrice']);

Route::get('/register', [RegisterController::class, 'register']);
Route::post('/register', [RegisterController::class, 'registerDone']);


Route::get('/login', [LoginController::class, 'login']);
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/logout', [LogoutController::class, 'logout']);

Route::post('/basket', [BasketController::class, 'basketStore']);
Route::get('/basket', [BasketController::class, 'show']);

Route::get('/remove/{id}', [BasketController::class, 'basketRemove']);

Route::post('/checkout', [CheckoutController::class, 'showOrder']);

Route::get('/previous', [OrdersController::class, 'show']);
Route::get('/previous/{id}', [OrdersController::class, 'orderDetails']);