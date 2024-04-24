<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    public function index(){
        // $restaurant = Restaurant::all()->where('user_id', Auth::id())->first();
        // return view('dashboard', compact('restaurant'));



        // $restaurant = Restaurant::all();
        $restaurant = Restaurant::with('dish','types')->get();
        return response()->json([
            'success'=> true,
            'restaurant'=> $restaurant
        ]);
    }
}
