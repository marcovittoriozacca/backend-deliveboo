<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;
use App\Models\Category;
use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dishes = Dish::with('restaurant','category')->where('restaurant_id', Auth::id())->get();
        return view('dish.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::all();
        return view('dish.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDishRequest $request)
    {
        $new_dish = $request->validated();

        $new_dish['slug'] = Str::slug($new_dish['name'], '-');
        $new_dish['visible'] = true;
        $new_dish['restaurant_id'] = Auth::id();
        if($request->hasFile('image')){
            $path = Storage::disk('public')->put('dish_images', $request->image);
            $new_dish['image'] = $path;
        }

        $new_dish = Dish::create($new_dish);


        return redirect()->route('dishes.index');
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
    public function edit(Dish $dish)
    {

        if($dish->restaurant_id == Auth::id()){
        }else{
            $dish = Dish::with('restaurant')->where('restaurant_id', Auth::id())->where('slug', $dish->slug)->first();
        }
        $categories = Category::all();
        return view('dish.edit', compact('dish', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDishRequest $request, Dish $dish)
    {

        if($dish->restaurant_id == Auth::id()){
        }else{
            $dish = Dish::with('restaurant')->where('restaurant_id', Auth::id())->where('slug', $dish->slug)->first();
        }


        $updated_dish = $request->all();

        $dish->update($updated_dish);
        $dish['slug'] = Str::slug($dish['name'],'-');
        if ($request->hasFile('image')){
            if($dish->image){
                Storage::delete($dish->image);
            }
            $path = Storage::disk('public')->put('dish_images', $request->image);
            $dish['image'] = $path;
        }
        $dish->save();
        return redirect()->route('dishes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        dd($dish);
    }
}
