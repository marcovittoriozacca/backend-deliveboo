<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders=Order::with(['dishes' => function ($query) {
            $query->where('restaurant_id', Auth::id());
        }])->get()->groupBy('id');
        $restaurant=Restaurant::all()->where('id',Auth::id())->first();
        return view('dish.orders',compact('orders','restaurant'));
    }



    public function ordersChart()
    {
        // Ottieni tutti gli ordini dal database
        $orders = Order::all();

        // Raggruppa gli ordini per mese e anno e conta il numero di ordini
        $ordersCount = $orders->groupBy(function ($order) {
            return $order->created_at->format('Y-m'); // Chiave basata sul timestamp Unix
        })->map(function ($group) {
            return $group->count();
        });

        // Ordina le chiavi (timestamp Unix) in ordine cronologico
        $ordersCount = $ordersCount->sortKeys();

        // Estrai le etichette (mese/anno) e i dati (numero di ordini) dal conteggio
        $labels = $ordersCount->keys();
        $data = $ordersCount->values();

        // Passa i dati alla vista
        return view('dish.orders_chart', compact('labels', 'data'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $id)
    {

        $orders=Order::with(['dishes' => function ($query) {
            $query->where('restaurant_id', Auth::id());
        }])->where('id',$id->id)->get();

        return view('Dish.singleorder',compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
