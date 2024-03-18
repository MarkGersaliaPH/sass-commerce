<?php

use App\Http\Controllers\HomeController;
use App\Livewire\Cart;
use App\Livewire\Cart\Table;
use App\Livewire\Checkout;
use App\Livewire\ProductDetail;
use App\Livewire\Shop;
use App\Livewire\ShopController;
use App\Livewire\ShowPosts;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
 Route::get('/',[HomeController::class,'index'])->name('home');
 

 Route::get('/shop',ShopController::class);

 Route::get('/product/{id}',ProductDetail::class)->name("product.detail");

 Route::get('/cart',Table::class)->name('cart');
 Route::get('checkout',Checkout::class)->name('checkout');

