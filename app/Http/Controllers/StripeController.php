<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;
use App\Models\Subscriber;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;
use Stripe;
use DateTime;

class StripeController extends Controller
{
    /* Function to return the payment page view */
    public function handleGet(Request $request, $trainer_id, $subscription_tier)
    {
        $user = Auth::user();
        $total = Subscription::where('trainer_id', $trainer_id)->first()["tier{$subscription_tier}_price"];
        return view('payment', compact('trainer_id', 'subscription_tier', 'user', 'total'));
    }
  
    /* Function to handle the payment and payment details*/
    public function handlePost(Request $request, $trainer_id, $subscription_tier)
    {
        $user = Auth::user();
        $total = Subscription::where('trainer_id', $trainer_id)->first()["tier{$subscription_tier}_price"];
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $charge = Stripe\Charge::create ([
                "amount" => $total * 100,
                "currency" => "GBP",
                "source" => $request->stripeToken,
                "description" => "Making test payment.",
                "receipt_email" => $user->email,
        ]);
        
        $order = new Order();
        $date = DateTime::createFromFormat('U', $charge->created);
        
        // Create new entry based on the payment information
        $order->fill([
            'stripe_id' => $charge->id,
            'customer_email' => $user->email,
            'trainer_id' => $trainer_id,
            'subscription_tier' => $subscription_tier,
            'price' => $total,
            'status' => $charge->status,
            'date' => $date,
        ]);
  
        $order->save();
        
        // Create new entry for user to match with trainer and subscription tier
        if($charge->status == "succeeded"){
            Subscriber::create([
                'user_id' => $user->id,
                'trainer_id' => $trainer_id,
                'subscription_tier' => $subscription_tier,
            ]);
        }
        
        session()->flash('success', 'Payment has been successfully processed.');
          
        return back();
    }
}
