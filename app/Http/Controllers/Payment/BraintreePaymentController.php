<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BraintreePaymentController extends Controller
{
    public function token()
    {
    	return response()->json([
    		'data' => [
    			'token' => \Braintree_ClientToken::generate()
    		]
    	]);
    }
}
