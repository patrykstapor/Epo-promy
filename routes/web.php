<?php

use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CartController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// prosta wyszukiwarka rejsów (GET, by dało się linkować/wracać do wyników)
Route::get('/proms', [SearchController::class, 'index'])->name('sailings.search');
Route::post('/koszyk/dodaj', [CartController::class, 'add'])->name('cart.add');
Route::get('/koszyk', [CartController::class, 'index'])->name('cart.index');
Route::post('/koszyk/usun', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/checkout/pasazerowie', [CheckoutController::class, 'passengers'])->name('checkout.passengers');
Route::post('/checkout/pasazerowie', [CheckoutController::class, 'storePassengers']);
Route::get('/checkout/podsumowanie', [CheckoutController::class, 'review'])->name('checkout.review');
Route::post('/checkout/zaplac', [CheckoutController::class, 'pay'])->name('checkout.pay');
Route::get('/checkout/sukces', [CheckoutController::class, 'success'])->name('checkout.success');
