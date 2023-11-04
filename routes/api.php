<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('task', App\Http\Controllers\Admin\TaskController::class);


Route::get('menu-category/{restaurant}', [App\Http\Controllers\Api\MenuCategoryController::class, 'index']);
Route::post('menu-category', [App\Http\Controllers\Api\MenuCategoryController::class, 'store']);
//Route::put('menu-category/{menuCategory}', [App\Http\Controllers\Api\MenuCategoryController::class, 'update']);
Route::delete('menu-category/{menuCategory}', [App\Http\Controllers\Api\MenuCategoryController::class, 'destroy']);
// todo:: edit the name of routes
Route::get('menu-item/{restaurant}', [App\Http\Controllers\Api\MenuItemController::class, 'index']);
Route::post('menu-item', [App\Http\Controllers\Api\MenuItemController::class, 'store']);
//Route::put('menu-item/{menuItem}', [App\Http\Controllers\Api\MenuItemController::class, 'update']);
Route::delete('menu-item/{menuItem}', [App\Http\Controllers\Api\MenuItemController::class, 'destroy']);


Route::get('restaurants/{restaurant}/images', [App\Http\Controllers\Api\UploadImagesController::class, 'index'])->name('restaurants.images');
Route::post('restaurants/{restaurant}/images', [App\Http\Controllers\Api\UploadImagesController::class, 'store'])->name('restaurants.images.store');
Route::delete('restaurants/images/{image}', [App\Http\Controllers\Api\UploadImagesController::class, 'destroy'])->name('restaurants.images.destroy');
