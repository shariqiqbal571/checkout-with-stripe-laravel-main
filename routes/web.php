<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StripePaymentController;
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

// Route::get('/', function () {
//     return view('products');
// });
Route::get('/', [ProductController::class, 'index'])->name('products');


Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/cart', [ProductController::class, 'cart'])->name('cart');
Route::get('/product/add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add-to-cart');
Route::delete('/item/remove-from-cart', [ProductController::class, 'remove'])->name('remove_from_cart');
Route::patch('/item/update--item-from-cart', [ProductController::class, 'updateItem'])->name('update-item-from-cart');

Route::post('/stripe',[StripePaymentController::class,'stripe'] )->name('stripe');
Route::get('/success',[StripePaymentController::class,'success'] )->name('success');
Route::get('/cancel',[StripePaymentController::class,'cancel'] )->name('cancel');



// Route::get('/products', [CartController::class, 'index'])->name('products');
// Route::post('/product/store', [CartController::class, 'store'])->name('product.store');
// Route::get('/product/destory/sessions', [CartController::class, 'sessionDestory'])->name('product.session.destory');

// Route::get('/posts', [PostController::class, 'index'])->name('posts');
// Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
// Route::post('/posts/store', [PostController::class, 'store'])->name('post.store');
// Route::delete('/posts/delete/{id}', [PostController::class, 'destroy'])->name('post.delete');



