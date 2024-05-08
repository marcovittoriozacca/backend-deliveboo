<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\Dish;
use Carbon\Carbon;
use Illuminate\Http\Request;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::whereHas('dishes', function ($query) {
            $query->where('restaurant_id', Auth::id())->withTrashed();
            })->get()->sortDesc();
        $restaurant=Restaurant::all()->where('id',Auth::id())->first();

        return view('dish.orders',compact('orders','restaurant'));
    }


    /*
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
    */

    public function ordersChart()
    {
        // Ottieni la data e l'ora di oggi
        $today = Carbon::now()->addHours(2);

        // Sottrai un anno esatto dalla data odierna
        $oneYearAgo = $today->copy()->subYear();

        // Ora puoi usare queste date per filtrare gli ordini
        $orders = Order::where('restaurant_id', Auth::id())
               ->where('date', '>=', $oneYearAgo)
               ->where('date', '<=', $today)
               ->get();
        
        // Raggruppa gli ordini per mese e anno e conta il numero di ordini
        $ordersCount = $orders->groupBy(function ($order) {
            return Carbon::parse($order->date)->format('Y-m'); // Chiave basata sul timestamp Unix
        })->map(function ($group) {
            return $group->count();
        });

        // Inizializza un array vuoto per conteggiare le vendite di ogni piatto
        $salesByDish = [];

        // Itera attraverso gli ordini
        foreach ($orders as $order) {
            // Ottieni i piatti associati a ciascun ordine insieme alla quantità ordinata
            $dishes = $order->dishes()->withPivot('quantity')->get();

            // Itera attraverso i piatti e aggiorna il conteggio delle vendite per ciascun piatto
            foreach ($dishes as $dish) {
                $dishId = $dish->id;
                $quantity = $dish->pivot->quantity;
                // Se il piatto non è ancora presente nell'array, inizializza il conteggio con la quantità ordinata
                if (!isset($salesByDish[$dishId])) {
                    $salesByDish[$dishId] = $quantity;
                } else {
                    // Altrimenti, aggiungi la quantità ordinata al conteggio esistente
                    $salesByDish[$dishId] += $quantity;
                }
            }
        }

        // Ordina i dati in base al numero di vendite, in ordine decrescente
        arsort($salesByDish);

        // Estrai i nomi dei piatti e i dati (numero di vendite) dal conteggio
        $dishesLabels = [];
        $dishesData = [];
        foreach ($salesByDish as $dishId => $sales) {
            $dish = Dish::find($dishId);
            $dishesLabels[] = $dish->name;
            $dishesData[] = $sales;
        }


        $orderCountsByHour = [];

        // Itera attraverso gli ordini e conta il numero di ordini per ciascuna fascia oraria
        foreach ($orders as $order) {
            // Estrai l'ora dal campo created_at
            $hour = date('H', strtotime($order->date));
        
            // Incrementa il conteggio degli ordini per l'ora corrente
            if (!isset($orderCountsByHour[$hour])) {
                $orderCountsByHour[$hour] = 1;
            } else {
                $orderCountsByHour[$hour]++;
            }
        }
        
        // Inizializza un array per le etichette delle fasce orarie e un array per i dati dei conteggi degli ordini
        $hoursLabels = [];
        $hoursData = [];
        
        // Itera attraverso le ore del giorno (da 00 a 23) e ottieni il conteggio degli ordini per ogni ora
        for ($hour = 0; $hour < 24; $hour++) {
            // Formatta l'ora come stringa a due cifre (es. "08" per le ore 8:00)
            $hourFormatted = str_pad($hour, 2, '0', STR_PAD_LEFT);
            
            // Aggiungi l'ora formattata alle etichette
            $hoursLabels[] = $hourFormatted . ':00';
        
            // Se esiste un conteggio per questa ora, aggiungilo ai dati, altrimenti aggiungi zero
            if (isset($orderCountsByHour[$hourFormatted])) {
                $hoursData[] = $orderCountsByHour[$hourFormatted];
            } else {
                $hoursData[] = 0;
            }
        } 


        // Ordina le chiavi (timestamp Unix) in ordine cronologico
        $ordersCount = $ordersCount->sortKeys();

        // Estrai le etichette (mese/anno) e i dati (numero di ordini) dal conteggio
        $ordersLabels = $ordersCount->keys();
        $ordersData = $ordersCount->values();

        // Passa i dati alla vista
        return view('dish.orders_chart', compact('ordersLabels', 'ordersData', 'dishesLabels', 'dishesData','hoursLabels', 'hoursData'));
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
