<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
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

//ristoranti da mostrare nella Home Page di VUE
Route::get('/restaurants', [RestaurantController::class, 'index']);
Route::get('/restaurantsid/{id}', [RestaurantController::class, 'restaurantid']);
//tipologie dei ristoranti utilizzati per il filtraggo nella Home Page di VUE
Route::get('/type', [RestaurantController::class, 'type']);

//endpoint che accetta array e gestisce il filtraggio
Route::get('/filtertypologies', [RestaurantController::class, 'getFilteredTypologies']);

//singolo ristorante preso tramite chiamata API da usare nella SHOW del menù
Route::get('restaurant/{dishes}', [RestaurantController::class, 'dishes']);


Route::get('/braintree/get-token', [BraintreeController::class, 'getToken']);

Route::post('/braintree/payment', [BraintreeController::class, 'payment']);