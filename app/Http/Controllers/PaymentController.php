<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment.index');
    }

    public function checkout(Request $request)
    {
        // Using Cashier to create a checkout session for a one-off payment
        // We will charge the user $10.00 (1000 cents). Because we're not creating a subscription,
        // we can use the `checkoutCharge` method.
        
        return $request->user()->checkoutCharge(1000, 'Laravel Stripe Payment', 1, [
            'success_url' => route('payment.success'),
            'cancel_url' => route('payment.cancel'),
        ]);
    }

    public function success()
    {
        return view('payment.success');
    }

    public function cancel()
    {
        return view('payment.cancel');
    }
}
