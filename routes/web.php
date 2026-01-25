<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.layout');
});
Route::get('/home', function () {
    return view('user.home');
});
Route::get('/ad', function () {
    return view('admin.dashboard');
});

Route::get('/menu', function () {
    return view('admin.menu');
});
Route::get('/cus', function () {
    return view('admin.customers');
});
Route::get('/or', function () {
    return view('admin.orders');
});
Route::get('/foodMa', function () {
    return view('admin.foodManagement');
});

Route::get('/food', function () {
    return view('admin.food');
});

Route::get('/foodCat', function () {
    return view('admin.category');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
