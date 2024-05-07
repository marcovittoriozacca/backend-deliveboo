<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\User\DishController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\RestaurantController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('/dashboard', [RestaurantController::class, 'index']);
    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('/orders-chart', [OrderController::class, 'ordersChart'])->name('orders-chart');
});



Route::middleware('auth')->group(function () {
    // COMMENTATI PERCHE NON DOBBIAMO DARE LA POSSIBILITà AL RISTORATORE DI MODIFICARE DIRETTAMENTE I PROPRI DATI
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('check-user-restaurant')->group(function () {
        Route::get('/dishes/{dish:slug}/edit', [DishController::class, 'edit']);
        Route::resource('/dishes', DishController::class)
            ->parameters(['dishes' => 'dish:slug']);
    });




        //softdelete route
        Route::put('/dishes/{dish}/softDelete', [DishController::class, 'softDelete'])->name('dishes.softDelete');

            //middleware momentaneamente commentato, più avanti verrà sistemato



});

require __DIR__.'/auth.php';
