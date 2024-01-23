<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;

class StripePaymentController extends Controller
{
    public function stripe()
{
    $productItems = [];
    \Stripe\Stripe::setApiKey(config('stripe.sk'));

    foreach(session('cart') as $id => $items){
        $product_name = $items['product_name'];
        $total = $items['price'];
        $quantity = $items['quantity'];

        $two0 = "00";
        $unit_amount = "$total$two0";

        $productItems[] = [
            'price_data' => [
                'product_data' => [
                    'name' => $product_name,
                ],
                'currency' => 'USD',
                'unit_amount' => $unit_amount,
            ],
            'quantity' => $quantity
        ];
    }

    // checkout url;
    $checkoutSession = \Stripe\Checkout\Session::create([
        'line_items' => $productItems, // Remove the outer array
        'mode' => 'payment',
        'allow_promotion_codes' => true,
        'metadata' => [
            'user_id' => "0001"
        ],
        'customer_email' => 'ihsaanchandio@gmail.com',
        'success_url' => route('success'),
        'cancel_url' => route('cancel')
    ]);

    // Ensure the cart data is retained until payment is successful

    return redirect()->away($checkoutSession->url);
}


    public function success()
    {
        session()->put('cart', []);
        session()->flash('success', 'Payment Completed successfully!');
        return redirect()->route('products');
    }

    public function cancel()
    {
        return "Cancel";
    }



}
