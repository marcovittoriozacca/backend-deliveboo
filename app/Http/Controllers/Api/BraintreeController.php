<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\OrderConfirmed;
use App\Models\Order;
use Braintree\Gateway;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class BraintreeController extends Controller
{
    public function getToken(){

        $gateway = new Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env("BRAINTREE_MERCHANT_ID"),
            'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
            'privateKey' => env("BRAINTREE_PRIVATE_KEY")
        ]); 
    
        $clientToken = $gateway->clientToken()->generate();

        return response()->json([
            'token' => $clientToken,
        ]);
    }

    public function payment(Request $request){

        $nonce = $request->input('nonce'); // Estrai il nonce dai dati POST
        $gateway = new Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY'),
        ]);

        $total_amount = 0;
        //da array di oggetti ad array associativo
        foreach ($request->cart as $index => $plate) {
            if($index == 0){
                $rest_id = $plate['restaurant_id'];
            }
            $total_amount = $plate['price'] * $plate['quantity'] + $total_amount;
        }

        // Effettua la transazione
        $result = $gateway->transaction()->sale([
            'amount' => $total_amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        // Controlla se la transazione è stata accettata
        if ($result->success) {
            // La transazione è stata accettata, procedi con il successo
            $new_order = Order::create([
                "full_name" => $request->full_name,
                "email" => $request->email,
                "address" => $request->address,
                "tel_number" => $request->tel,
                "description" => $request->description,
                "date" => date("Y-m-d H:i:s", strtotime('+2 hours')),
                "status" => 1,
                "total_price" => $total_amount,
                "restaurant_id" => $rest_id,

            ]);
            $tab_orders = $new_order;
            foreach ($request->cart as $record) {
                $tab_orders->dishes()->attach($record['id'] ,
                [
                    "quantity" => $record['quantity'],
                    "price" => $record['price'],
                    "name" => $record['name'],
                ]);
            }

            Mail::to($new_order->email)->send(new OrderConfirmed($new_order, $request->cart));

            return response()->json(['success' => true, 'transaction_id' => $result->transaction->id]);
        } else {
            // La transazione è stata rifiutata, gestisci di conseguenza
            $errorMessage = $result->message;
            return response()->json(['success' => false, 'message' => $errorMessage]);
        }
    }
}