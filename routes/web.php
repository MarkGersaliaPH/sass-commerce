<?php

use App\Http\Controllers\HomeController;
use App\Livewire\CartPage;
use App\Livewire\Checkout;
use App\Livewire\Checkout\Guest;
use App\Livewire\Checkout\NotLoggedIn;
use App\Livewire\ProductDetail;
use App\Livewire\Shop;
use App\Livewire\ShopController;
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
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/shop', Shop::class)->name('shop');

Route::get('/product/{id}', ProductDetail::class)->name('product.detail');

Route::get('/cart', CartPage::class)->name('cart');

Route::get('checkout', Checkout::class)->middleware('shop')->name('checkout');
Route::get('checkout-guest', Guest::class)->name('checkout.guest');

Route::get('checkout/not-logged-in', NotLoggedIn::class)->name('checkout.not-logged-in');
