<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;
use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Restaurant $restaurant)
    {
        $restaurant_id = Auth::id();
        $dishes = Dish::with('restaurant','category')->where('restaurant_id', $restaurant_id)->get();
        return view('dish.index', compact('dishes', 'restaurant'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Restaurant $restaurant)
    {
        return view('dish.create', compact('restaurant'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDishRequest $request, Restaurant $restaurant)
    {
        $new_dish = $request->validated();

        $new_dish['slug'] = Str::slug($new_dish['name'], '-');
        $new_dish['visible'] = true;
        $new_dish['restaurant_id'] = Auth::id();

        //bisogna rimuovere questa riga e il required nelle migrations
        $new_dish['category_id'] = 1;

        $new_dish = Dish::create($new_dish);


        return redirect()->route('dishes.index', compact('restaurant'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Dish $dish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant, Dish $dish)
    {

        return view('dish.edit', compact('restaurant', 'dish'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Restaurant $restaurant, Dish $dish)
    {
        $updish = $request->all();
        $dish->update($updish);
        $dish->save();
        return redirect()->route('dishes.index', compact('restaurant'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        //
    }
}
