<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Braintree\Gateway;
use Illuminate\Http\Request;

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
        // //da array di oggetti ad array associativo
        foreach ($request->cart as $plate) {
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
            return response()->json(['success' => true, 'transaction_id' => $result->transaction->id, 'cart' => $total_amount]);
        } else {
            // La transazione è stata rifiutata, gestisci di conseguenza
            $errorMessage = $result->message;
            return response()->json(['success' => false, 'message' => $errorMessage]);
        }
    }
}