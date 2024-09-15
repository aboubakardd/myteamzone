<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentConfirmation;

class PaymentController extends Controller
{
    public function handlePayment(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        try {
            $charge = Charge::create([
                'amount' => 1000, // Le montant en centimes, donc ici 10.00€
                'currency' => 'eur',
                'description' => 'Example charge',
                'source' => $request->stripeToken,
                'receipt_email' => $validatedData['email'],
            ]);

            // Message de succès
            return redirect()->route('order.confirmation', ['orderId' => $charge->id])
                             ->with('success', 'Le paiement a été effectué avec succès !');
        } catch (\Exception $e) {
            // Log l'erreur pour débogage
            \Log::error('Stripe charge failed', ['error' => $e->getMessage()]);

            // Message d'échec
            return redirect()->route('payment.form')->with('error', 'Le paiement a échoué. Veuillez réessayer.');
        }
    }
}
