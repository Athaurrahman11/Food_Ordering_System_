<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\StripeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified', 'access_middleware'])->group(function () {
    Route::get('admin_dashboard',[AdminController::class,'index'])->name('admin_dashboard');
    Route::get('menu',[AdminController::class,'menu'])->name('menu');
    Route::get('add_menu',[AdminController::class,'menu_add'])->name('menu.add');
    Route::post('menu_store',[AdminController::class,'menu_store'])->name('menu_store');
    Route::get('delete_menu/{id}',[AdminController::class,'delete_menu'])->name('menu.delete');
    Route::get('edit_menu/{id}',[AdminController::class,'edit_menu'])->name('menu.edit');
    Route::get('orders',[AdminController::class,'orders'])->name('orders');
    Route::get('order_status/{id}/{status}', [AdminController::class, 'update_order_status'])->name('order.status.update');
    Route::get('add_food',[AdminController::class,'add_food'])->name('food.add');
    Route::get('food',[AdminController::class,'food'])->name('food_management');
    Route::post('store_food',[AdminController::class,'store_food'])->name('food.store');
    Route::get('edit_food/{id}',[AdminController::class,'edit_food'])->name('food.edit');
    Route::post('update_food/{id}',[AdminController::class,'update_food'])->name('food.update');
    Route::get('delete_food/{id}',[AdminController::class,'delete_food'])->name('food.delete');
    Route::post('update_menu/{id}',[AdminController::class,'update_menu'])->name('menu.update');
    Route::get('customers',[AdminController::class,'customers'])->name('customers');
    Route::get('delete_customer/{id}',[AdminController::class,'delete_customer'])->name('customer.delete');
    Route::get('messages',[AdminController::class,'messages'])->name('messages');
    Route::get('delete_message/{id}',[AdminController::class,'delete_message'])->name('message.delete');
});

Route::get('/homepage', [FoodController::class, 'home'])->middleware(['auth', 'verified', 'user_middleware'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware(['user_middleware'])->group(function () {
    Route::get('home',[FoodController::class, 'home'])->name('user.home'); 
    Route::get('/', [FoodController::class, 'home'])->name('home');

    Route::get('/shop', [FoodController::class, 'index'])->name('shop');

    Route::get('/about', function () { return view('home.about'); })->name('about');
    Route::get('/tracking', function () { return view('home.tracking'); })->name('tracking');
    Route::get('/contact', function () { return view('home.contact'); })->name('contact');
    Route::post('/contact', [FoodController::class, 'sendMessage'])->name('contact.store');
});

Route::middleware(['auth', 'verified', 'user_middleware'])->group(function () {
    Route::post('/cart-add', [FoodController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [FoodController::class, 'viewCart'])->name('cart.view');
    Route::get('/cart-remove/{id}', [FoodController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/cart-increment/{id}', [FoodController::class, 'incrementCart'])->name('cart.increment');
    Route::get('/cart-decrement/{id}', [FoodController::class, 'decrementCart'])->name('cart.decrement');
    Route::get('/checkout', [FoodController::class, 'checkout'])->name('checkout');
    Route::post('/place-order', [FoodController::class, 'placeOrder'])->name('place.order');
    Route::get('/success', [FoodController::class, 'orderSuccess'])->name('success');
    Route::get('my_orders', [FoodController::class, 'myOrders'])->name('my_orders');
    Route::get('cancel_order/{id}', [FoodController::class, 'cancelOrder'])->name('cancel_order');
});
