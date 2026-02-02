<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function pay($order_id, $amount)  {
        
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $checkout_session=Session::create([
               'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Food Order #' . $order_id,
                    ],
                    'unit_amount' => $amount * 100, // Amount in cents
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('success', ['order_id' => $order_id]),
            'cancel_url' => route('checkout'),
        ]);

        return redirect()->away($checkout_session->url);

    }
}
