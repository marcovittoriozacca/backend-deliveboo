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
        //presa dei dati tramite id
        // $restaurant = Restaurant::with('types')->where('id', $restaurant)->first();

        //presa dei dati tramite slug
        $restaurant_api = Restaurant::with('types')->where('slug', $restaurant)->first();
        ///////------

        $dishes = Dish::with('category')->where('restaurant_id', $restaurant_api->id)->get();

        if(count($dishes) < 1){
            return response()->json([
                'success' => false,
                "error" => 'No restaurant available with that id',
            ]);
        }else{
            return response()->json([
                'success' => true,
                'dishes' => $dishes,
                'restaurant' => $restaurant_api
            ]);
        }

    }
}
