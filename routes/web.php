<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;

route::get('admin_dashboard',[AdminController::class,'index']);

route::get('menu',[AdminController::class,'menu'])->name('menu');



route::get('add_menu',[AdminController::class,'menu_add']);
route::post('menu_store',[AdminController::class,'menu_store']);

route::get('delete_menu/{id}',[AdminController::class,'delete_menu']);

route::get('edit_menu/{id}',[AdminController::class,'edit_menu']);
route::get('orders',[AdminController::class,'orders']);
route::get('add_food',[AdminController::class,'add_food']);
route::get('food',[AdminController::class,'food']);

route::post('update_menu/{id}',[AdminController::class,'update_menu']);






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
