<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\DishController;
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
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    
    //middleware momentaneamente commentato, più avanti verrà sistemato
    // Route::middleware('check-user-restaurant')->group( function (){});
        Route::resource('/dishes', DishController::class)
            ->parameters(['dishes' => 'dish:slug']);

        // //softdelete route 
        Route::put('/dishes/{dish}/softDelete', [DishController::class, 'softDelete'])->name('dishes.softDelete');
    

});

require __DIR__.'/auth.php';
