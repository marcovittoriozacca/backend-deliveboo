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

    public function getFilteredTypologies(Request $request){
        $types = $request->type;
        //questa funzione restituisce prima le tipologie e poi i ristoranti associati come array interni, orribile da vedere
        // $restaurants = Type::whereIn('slug', $typologies)->with('restaurants')->get();

        //in questa abbiamo ogni ristorante con le tipologie associate, contenuto nell'array types passato da vue a laravel. Poi con una funzione anonima di php
        //(simili a quelle di Js che iterano ogni elemento - whereHas), andiamo a iterare ogni elemento di types e prendiamo tutti i ristoranti che hanno almeno
        //una delle tipologie dichiarate nell'array types
        $restaurants = Restaurant::with('types');
        foreach ($types as $type) {
            $restaurants->whereHas('types', function ($query) use ($type) {
                $query->where('slug', $type);
            });
        }
        $restaurants = $restaurants->get();
        return response()->json([
            'success' => true,
            'restaurants' => $restaurants,
        ]);

    }


    public function dishes($restaurant){
        //presa dei dati tramite id
        // $restaurant = Restaurant::with('types')->where('id', $restaurant)->first();

        //presa dei dati tramite slug
        $restaurant_api = Restaurant::with('types')->where('slug', $restaurant)->first();
        ///////------

        if(!$restaurant_api){
            return response()->json([
                'success' => false,
                "error" => 'No restaurant available with that id',
            ]);
        }else{
            $dishes = Dish::with('category')->where('restaurant_id', $restaurant_api->id)->get();
            return response()->json([
                'success' => true,
                'dishes' => $dishes,
                'restaurant' => $restaurant_api
            ]);
        }

    }

    public function restaurantid($id){
        $restaurant=Restaurant::all()->where('id',$id)->first();

        return response()->json([
            'success' => true,
            'restaurant'=> $restaurant
        ]);
    }
}
