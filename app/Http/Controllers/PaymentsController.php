<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;

class PaymentsController extends Controller
{
    public function store(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        // Token is created using Stripe.js or Checkout!
        // Get the payment token submitted by the form:
        $token = $request['stripeToken'];

        // Create a Customer:
        $customer = Customer::create(array(
          "email" => "mepandeyn@gmail.com",
          "source" => $token,
        ));

        // Charge the Customer instead of the card:
        $charge = Charge::create(array(
          "amount" => 1000,
          "currency" => "usd",
          "customer" => $customer->id
        ));

        return view('about.index', ['title'=>'About Us']);
    }
}
