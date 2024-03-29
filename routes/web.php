<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DishController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Middleware\RestrictAccess;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    if(Auth::id())
    {
        return view('admin.dashboard');
    }

    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')
->prefix('admin')
->group(function () {
    
    Route::resource('/profile', ProfileController::class)->except(['index', 'show', 'create', 'store']);
    Route::resource('/dishes', DishController::class)->except(['index']);
    Route::get('/orders', [OrderController::class,'returnView'])->name('orders.view');
    Route::get('/dishes', [DishController::class,'returnView'])->name('dishes.view');
    Route::delete('/orders', [OrderController::class, 'destroy'])->name('orders');
    Route::get('/statistics', [RestaurantController::class, 'returnView'])->name('restaurant-statistics');
    Route::get('/statistics/search', [RestaurantController::class, 'search'])->name('restaurant-statistics-search');
});



require __DIR__.'/auth.php' ;
