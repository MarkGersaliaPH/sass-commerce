<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Livewire\CartPage;
use App\Livewire\Checkout;
use App\Livewire\Checkout\Guest;
use App\Livewire\Checkout\NotLoggedIn;
use App\Livewire\ProductDetail;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/',[HomeController::class,'index'])->name('home');
 

Route::get('/shop',ShopController::class);

Route::get('/product/{id}',ProductDetail::class)->name("product.detail");

Route::get('/cart',CartPage::class)->name('cart');

Route::get('checkout',Checkout::class)->middleware('shop')->name('checkout');
Route::get('checkout-guest',Guest::class)->name('checkout.guest');

Route::get('checkout/not-logged-in',NotLoggedIn::class)->name('checkout.not-logged-in');

require __DIR__.'/auth.php';
