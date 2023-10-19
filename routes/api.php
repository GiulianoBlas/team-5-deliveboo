<?php

use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\CategoryController;
use App\Models\Restaurant;
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


Route::get('/restaurants', [RestaurantController::class, 'index']);

Route::get('/restaurants/{id}', [RestaurantController::class, 'show']);

Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/filteredRestaurants, {selectedCategories}', [RestaurantController::class, 'filter,']);