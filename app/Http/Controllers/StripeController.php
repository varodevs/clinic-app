<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class StripeController extends Controller
// {
//     public function stripe_view(){

//         return view(view:'stripe');

//     }

//     public function checkout(){

//         \Stripe\Stripe::setApiKey(config(key:'stripe.sk'));

//         $session = \Stripe\Checkout\Session::create([
//             'line_items' => [
//                 [
//                     'price_data' => [
//                         'currency' => 'gbp',
//                         'product_data' => [
//                             'name' => 'Session Physio',
//                         ],
//                         'unit_ammount' => 5,
//                     ],
//                     'quantity' => 1,
//                 ],
//             ],
//             'mode'        => 'payment',
//             'success_url' => route(name:'success'),
//             'cancel_url'  => route(name:'stripe'),
//         ]);

//         return redirect()->away($session->url);
//     }

//     public function success(){
//         return view(view:'stripe');
//     }
// }
?>
