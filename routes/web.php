<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;


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

Route::get('/products/sorted/{price}', [ProductsController::class, 'sortByPrice']);

Route::get('/register', [RegisterController::class, 'register']);
Route::post('/register', [RegisterController::class, 'registerDone']);


Route::get('/login', [LoginController::class, 'login']);
Route::post('/login', [LoginController::class, 'authenticate']);

