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
}

