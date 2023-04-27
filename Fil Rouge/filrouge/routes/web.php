<?php


use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Auth::routes();



Route::get('/', [ProductController::class, 'acceuil'])->name('index_product');


Route::get('/service', [ProductController::class, 'index_product'])->name('service');
Route::get('/contact', [ProductController::class, 'contact'])->name('contact');

Route::get('/product/{product}', [ProductController::class, 'show_product'])->name('show_product');
Route::get('/product', [ProductController::class, 'index_product_one'])->name('show_product_one');


Route::middleware('admin')->group(function() {

  Route::get('/create', [ProductController::class, 'create_product'])->name('create_product');
  Route::get('/dashbored', [ProductController::class, 'dashbored'])->name('dashbored');
  Route::post('/product/create', [ProductController::class, 'store_product'])->name('store_product');
  Route::get('/product/{product}/edit', [ProductController::class, 'edit_product'])->name('edit_product');
  Route::patch('/product/{product}/update', [ProductController::class, 'update_product'])->name('update_product');
  Route::delete('/product/{product}', [ProductController::class, 'delete_product'])->name('delete_product');
  Route::post('/order/{order}/confirm', [OrderController::class, 'confirm_payment'])->name('confirm_payment');
});

Route::middleware('auth')->group(function() {
  Route::post('/cart/{product}', [CartController::class, 'add_to_cart'])->name('add_to_cart');
  Route::get('/cart', [CartController::class, 'show_cart'])->name('show_cart');
  Route::delete('/cart/{cart}', [CartController::class, 'delete_cart'])->name('delete_cart');
  Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
  Route::get('/order', [OrderController::class, 'index_order'])->name('index_order');
  Route::get('/order/{order}', [OrderController::class, 'show_order'])->name('show_order');
  Route::post('/order/{order}/pay', [OrderController::class, 'submit_carte'])->name('submit_carte');
  Route::get('/profile', [ProfileController::class, 'show_profile'])->name('show_profile');
  Route::post('/profile', [ProfileController::class, 'edit_profile'])->name('edit_profile');
});