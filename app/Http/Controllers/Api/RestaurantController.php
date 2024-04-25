<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Type;
class RestaurantController extends Controller
{
    public function index(){

        $restaurant = Restaurant::with('dish','types')->get();
        return response()->json([
            'success'=> true,
            'restaurant'=> $restaurant
        ]);
    }

    public function type(){

        $type = Type::all('id','slug','image');
        return response()->json([
            'success'=> true,
            'type'=> $type
        ]);
    }

    public function dishes($restaurant){
        
        $dishes = Restaurant::with('dish', 'types')->where('id', $restaurant)->get();
        return response()->json([
            'success' => true,
            'dishes' => $dishes,
        ]);

    }
}
