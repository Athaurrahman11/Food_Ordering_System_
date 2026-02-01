<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\FoodController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Admin Routes
route::get('admin_dashboard',[AdminController::class,'index'])->name('admin_dashboard')->middleware(['auth','verified']);
route::get('menu',[AdminController::class,'menu'])->name('menu');
route::get('add_menu',[AdminController::class,'menu_add']);
route::post('menu_store',[AdminController::class,'menu_store']);
route::get('delete_menu/{id}',[AdminController::class,'delete_menu']);
route::get('edit_menu/{id}',[AdminController::class,'edit_menu']);
route::get('orders',[AdminController::class,'orders']);
route::get('add_food',[AdminController::class,'add_food']);
route::get('food',[AdminController::class,'food'])->name('food_management');
route::post('store_food',[AdminController::class,'store_food']);
route::get('edit_food/{id}',[AdminController::class,'edit_food']);
route::post('update_food/{id}',[AdminController::class,'update_food']);
route::get('delete_food/{id}',[AdminController::class,'delete_food']);
route::post('update_menu/{id}',[AdminController::class,'update_menu']);
route::get('customers',[AdminController::class,'customers']);

// User Dashboard (Authenticated)
Route::get('/homepage', [FoodController::class, 'home'])->middleware(['auth', 'verified','access_middleware'])->name('dashboard');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/restaurants', [RestaurantController::class, 'index']);
require __DIR__.'/auth.php';

// -------------------------------------------------------------------------
// Food Ordering System Routes
// -------------------------------------------------------------------------

// Home Page
// Using 'user.home' as route name because blade files reference route('user.home')
route::get('home',[FoodController::class, 'home'])->name('user.home'); 
Route::get('/', [FoodController::class, 'home'])->name('home'); // Alias for root

// Menu / Shop Page
Route::get('/shop', [FoodController::class, 'index'])->name('shop');

// Static Pages
Route::get('/about', function () { return view('home.about'); })->name('about');
Route::get('/tracking', function () { return view('home.tracking'); })->name('tracking');
Route::get('/contact', function () { return view('home.contact'); })->name('contact');

// Cart Actions (Session Based)
Route::post('/cart-add', [FoodController::class, 'addToCart'])->name('cart.add')->middleware(['auth','verified']);
Route::get('/cart', [FoodController::class, 'viewCart'])->name('cart.view');
Route::get('/cart-remove/{id}', [FoodController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/cart-increment/{id}', [FoodController::class, 'incrementCart'])->name('cart.increment');
Route::get('/cart-decrement/{id}', [FoodController::class, 'decrementCart'])->name('cart.decrement');
Route::get('/checkout', [FoodController::class, 'checkout'])->name('checkout');
Route::post('/place-order', [FoodController::class, 'placeOrder'])->name('place.order');

// Other
route::get('ind',function(){
    return view('restaurants.index');
});
