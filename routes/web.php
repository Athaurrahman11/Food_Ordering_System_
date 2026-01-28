<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\FoodController;

route::get('admin_dashboard',[AdminController::class,'index']);

route::get('menu',[AdminController::class,'menu'])->name('menu');



route::get('add_menu',[AdminController::class,'menu_add']);
route::post('menu_store',[AdminController::class,'menu_store']);

route::get('delete_menu/{id}',[AdminController::class,'delete_menu']);

route::get('edit_menu/{id}',[AdminController::class,'edit_menu']);
route::get('orders',[AdminController::class,'orders']);
route::get('add_food',[AdminController::class,'add_food']);
route::get('food',[AdminController::class,'food'])->name('food_management');

route::post('update_menu/{id}',[AdminController::class,'update_menu']);
route::get('customers',[AdminController::class,'customers']);
route::get('order_status/{id}/{status}',[AdminController::class,'update_order_status']);

route::post('store_food',[AdminController::class,'store_food']);
route::get('edit_food/{id}',[AdminController::class,'edit_food']);
route::post('update_food/{id}',[AdminController::class,'update_food']);
route::get('delete_food/{id}',[AdminController::class,'delete_food']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/restaurants', [RestaurantController::class, 'index']);
require __DIR__.'/auth.php';

route::get('home',function(){
    return view('home');
});

route::get('ind',function(){
    return view('restaurants.index');
});

<<<<<<< HEAD
// Cart Action
Route::post('/cart-add', [FoodController::class, 'addToCart'])->name('cart.add');

Route::get('/login', function () { return view('auth.login'); })->name('login');
Route::get('/register', function () { return view('auth.register'); })->name('register');

// -------------------------------------------------------------------------
// Page Routes
Route::get('/', function () { return view('user.home'); })->name('home');
Route::get('/shop', [FoodController::class, 'index'])->name('shop');
Route::get('/about', function () { return view('user.about'); })->name('about');
Route::get('/tracking', function () { return view('user.tracking'); })->name('tracking');
Route::get('/contact', function () { return view('user.contact'); })->name('contact');
=======
route::get('add_restaurant', [RestaurantController::class, 'create']);
route::post('store_restaurant', [RestaurantController::class, 'store']);
route::get('edit_restaurant/{id}', [RestaurantController::class, 'edit']);
route::post('update_restaurant/{id}', [RestaurantController::class, 'update']);
route::get('delete_restaurant/{id}', [RestaurantController::class, 'destroy']);
>>>>>>> 352787276776fc9ff900a8533d8336610b997f3c
