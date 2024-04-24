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
        //prendiamo tutti i piatti appartenenti al ristorante dell'utente, con annesse informazioni del ristorante stesso e delle sue categorie
        $dishes = Dish::with('restaurant','category')->where('restaurant_id', Auth::id())->where('deleted_at', null)->get();

        //prendiamo il ristorante dell'utente per una visualizzazione dei dati corretta
        $restaurant = Restaurant::where('id', Auth::id())->first();

        return view('dish.index', compact('dishes', 'restaurant'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //passiamo alla pagina le varie categorie dei piatti (primo, secondo, bevanda, dessert) per inserirli in una select
        $categories = Category::all();

        return view('dish.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDishRequest $request)
    {
        //prendiamo tutti i dati che hanno passato la validazione
        $new_dish = $request->validated();
        
        //creiamo lo slug identificativo del piatto sulla base del suo nome
        $new_dish['slug'] = Str::slug($new_dish['name'], '-');
        
        //controlliamo se nella tabella DISH, filtrando prima per ottenere tutti i piatti dell'utente (SOLO dell'utente), esiste già un piatto con quello slug
        $check_dishes = Dish::with('restaurant')->where('restaurant_id', Auth::id())->where('slug', $new_dish['slug'])->get();
        if(count($check_dishes) >= 1){
            //Nel caso in cui dovesse esserci già un piatto con quello stesso slug, prendiamo l'ultimo record presente nella tabella DISH, sempre filtrando per lo stesso utente
            $last_dish = Dish::where('restaurant_id', Auth::id())->get()->last();
            //usiamo quel record per creare lo slug univoco del piatto, usando l'ultimo ID, incrementandolo di 1 e dandolo come elemento aggiuntivo allo slug
            $new_dish['slug'] = Str::slug($new_dish['name'].'-'.$last_dish->id+1, '-');
        }

        //collegamento al ristorante di appartenenza
        $new_dish['restaurant_id'] = Auth::id();

        if(!key_exists('visible', $new_dish)){
            $new_dish['visible'] = 0;
        }

        //aggiunta dell'immagine, se dovesse essere stata caricata. In caso contrario, nella view esiste un template di fallback
        if($request->hasFile('image')){
            $path = Storage::disk('public')->put('dish_images', $request->image);
            $new_dish['image'] = $path;
        }

        //creazione effettiva del record 
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

        if($dish->restaurant_id != Auth::id()){
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

        if($dish->restaurant_id != Auth::id()){
            $dish = Dish::with('restaurant')->where('restaurant_id', Auth::id())->where('slug', $dish->slug)->first();
        }
        $updated_dish = $request->validated();
        
        $updated_dish['slug'] = Str::slug($updated_dish['name'] ,'-');

        $check_dishes = Dish::with('restaurant')->where('restaurant_id', Auth::id())->where('slug', $updated_dish['slug'])->whereNot('id', $dish->id)->get();
        if(count($check_dishes) >= 1){
            $updated_dish['slug'] = Str::slug($updated_dish['name'].'-'.$dish->id, '-');
        }
        
        if(!key_exists('visible', $updated_dish)){
            $updated_dish['visible'] = 0;
        }
        
        if (key_exists("image", $updated_dish) ){
            if($dish->image){
                Storage::disk('public')->delete($dish->image);
            }
            $path = Storage::disk('public')->put('dish_images', $updated_dish['image']);
            $updated_dish['image'] = $path;
        }
        
        $dish->update($updated_dish);
        $dish->save();
        return redirect()->route('dishes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {

    }

    //cancella in modo fittizio il record, non mostrandolo più nel menù ma tenendolo comunque in memoria nel database
    public function softDelete(Dish $dish){
        $dish->delete();
        return redirect()->route('dishes.index');
        
        // $updated_dish = $dish->toArray();
        // $updated_dish['visible'] = 0;
        // $updated_dish['slug'] = $dish['slug'].'-'.$dish['id'];
        // if($updated_dish['image']){
        //     Storage::disk('public')->delete($updated_dish['image']);
        //     $updated_dish['image'] = null;
        // }
        // $dish->update($updated_dish);
        // $dish->save();
        // return redirect()->route('dishes.index');
    }
}
