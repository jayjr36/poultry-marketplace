<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CartController;


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/register', function(){
    return view('auth.register');
})->name('register');

Route::get('/adminhome', function () {
    return view('admin.dashboard');
});

Route::get('/home', function () {
    return view('customer.customerhome');
});

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

// Define routes for the controller methods
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/save', [CartController::class, 'save_cart'])->name('cart.save');
Route::get('/carts', [CartController::class, 'index'])->name('carts.index');
Route::get('/carts/user/{userId}',  [CartController::class, 'indexByUser'])->name('user.cart');
Route::get('/carts/{id}',  [CartController::class, 'show'])->name('cart.withid');

Route::get('/add-balance', [UserController::class,'showBalanceForm'],)->name('add.balance');
Route::post('/update-balance', [UserController::class,'updateBalance'],)->name('update.balance');


Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Auth::routes();
