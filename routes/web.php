<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;

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
/*
Route::get('/', function () {

   

    return view('hom');
});*/



Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/product/{id}', [App\Http\Controllers\HomeController::class, 'addToPanier'])->name('product.show');
Route::get('/pyment/{price}', [App\Http\Controllers\HomeController::class, 'form'])->name('product.form');
Route::POST('/validate', [App\Http\Controllers\HomeController::class, 'store'])->name('product.store');
Route::get('/panier', [App\Http\Controllers\HomeController::class, 'panier'])->name('product.panier');
Route::get('/cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('/cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('/clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
Route::get('/Formpaye', [CartController::class, 'formpaye'])->name('formpaye');
Route::get('stripe', [App\Http\Controllers\StripeController::class, 'stripe'])->name('stripe');
Route::post('stripe', [App\Http\Controllers\StripeController::class, 'stripePost'])->name('stripe.post');