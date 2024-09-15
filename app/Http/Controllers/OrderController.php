<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Cart;
use App\Models\Order; 
use Stripe\Stripe;
use Stripe\Refund;

class OrderController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:sanctum');
    // }

    public function index()
    {
        // Récupère l'utilisateur authentifié
        $user = auth()->user(); // Utiliser l'utilisateur connecté avec Sanctum

        // Récupère toutes les commandes de l'utilisateur
        $orders = Order::where('user_id', $user->id)->get();

        return view('order.index', compact('orders'));
    }
    
    public function confirmation($orderId)
    {
        // Récupère les articles du panier pour simuler la commande
        // En général, tu récupérerais ces informations depuis une base de données ou autre source
        $cartItems = Cart::getContent();
        $total = Cart::getTotal();

        return view('order.confirmation', [
            'orderId' => $orderId,
            'cartItems' => $cartItems,
            'total' => $total
        ]);
    }   

    public function cancelOrder($orderId)
    {
        // Trouver la commande
        $order = Order::find($orderId);

        if ($order) {
            // Mettre à jour le statut de la commande
            $order->status = 'annulée';
            $order->save();

            // Annuler le paiement et traiter le remboursement
            $this->refundOrder($order);

            return redirect()->route('order.confirmation', ['orderId' => $orderId])
                             ->with('success', 'La commande a été annulée et le remboursement a été traité.');
        }

        return redirect()->route('order.confirmation', ['orderId' => $orderId])
                         ->with('error', 'La commande n\'a pas pu être trouvée.');
    }

    public function processPayment(Request $request)
    {
        // Valider les informations de paiement
        $request->validate([
            'payment_method' => 'required|string',
            'amount' => 'required|numeric|min:1',
        ]);
    
        // Processus de paiement ici...
    }

    private function refundOrder($order)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $refund = Refund::create([
                'charge' => $order->charge_id, // ID de la charge Stripe stocké dans la commande
                'amount' => $order->total * 100, // Montant en centimes
            ]);

            return $refund->status === 'succeeded';
        } catch (\Exception $e) {
            \Log::error('Refund failed: ' . $e->getMessage());
            return false;
        }

        
    }
}
