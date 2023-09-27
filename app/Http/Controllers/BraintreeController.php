<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Braintree\Gateway as BraintreeGateway;


class BraintreeController extends Controller
{

    protected $gateway; // Dichiarazione della variabile $gateway

    public function __construct()
    {
        // Inizializzazione di $gateway nel costruttore del controller
        $this->gateway = new BraintreeGateway([
            'environment' => 'sandbox',
            'merchantId' => 'gwbpgnd9y37dch58',
            'publicKey' =>'tf878sp4ygb4shds',
            'privateKey' => '6451cdcaa3cee8f4ae509209e7106c27',
        ]);
    }


    public function token(Request $request)
{

   
    $clientToken =$this->gateway->clientToken()->generate();

    return view('admin.payments.braintree')->with('clientToken', $clientToken);
    
}

public function payment(Request $request){
     $nonceFromTheClient = $request->input("payment_method_nonce");
     $result = $this->gateway->transaction()->sale([
         'amount' => '10.00',
         'paymentMethodNonce' => $nonceFromTheClient,
         'options' => [
           'submitForSettlement' => True
         ]
       ]);

    //  return dd($request);
}


}