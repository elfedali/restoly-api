<?php


use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\Commercial\DashboardController::class, 'index'])->name('commercial.dashboard');

// // user
// Route::get('/user', [App\Http\Controllers\Commercial\UserController::class, 'index'])->name('commercial.user.index');
// Route::get('/user/create', [App\Http\Controllers\Commercial\UserController::class, 'create'])->name('commercial.user.create');
// Route::post('/user', [App\Http\Controllers\Commercial\UserController::class, 'store'])->name('commercial.user.store');
// Route::get('/user/{user}/edit', [App\Http\Controllers\Commercial\UserController::class, 'edit'])->name('commercial.user.edit');
// Route::put('/user/{user}', [App\Http\Controllers\Commercial\UserController::class, 'update'])->name('commercial.user.update');
// Route::get('/user/{user}/show', [App\Http\Controllers\Commercial\UserController::class, 'show'])->name('commercial.user.show');

// // restaurant
// Route::get('/restaurant', [App\Http\Controllers\Commercial\RestaurantController::class, 'index'])->name('commercial.restaurant.index');
// Route::get('/restaurant/create', [App\Http\Controllers\Commercial\RestaurantController::class, 'create'])->name('commercial.restaurant.create');
// Route::post('/restaurant', [App\Http\Controllers\Commercial\RestaurantController::class, 'store'])->name('commercial.restaurant.store');
// Route::get('/restaurant/{restaurant}/edit', [App\Http\Controllers\Commercial\RestaurantController::class, 'edit'])->name('commercial.restaurant.edit');
// Route::put('/restaurant/{restaurant}', [App\Http\Controllers\Commercial\RestaurantController::class, 'update'])->name('commercial.restaurant.update');
// Route::get('/restaurant/{restaurant}/show', [App\Http\Controllers\Commercial\RestaurantController::class, 'show'])->name('commercial.restaurant.show');

// //
