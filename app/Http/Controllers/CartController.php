<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    // Méthode pour afficher le contenu du panier
    public function index()
    {
        // Récupère le contenu du panier
        $cartItems = Cart::getContent();

        // Retourne la vue avec les items du panier
        return view('cart.index', compact('cartItems'));
    }

    // Méthode pour ajouter un produit au panier
    public function store(Request $request)
    {
        // Validation des champs requis
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required|integer|min:1',
        ]);

        // Ajout au panier
        Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array() // Optionnel : vous pouvez ajouter d'autres attributs ici
        ));

        // Redirige vers la page du panier
        return redirect()->route('cart.index')->with('success', 'Produit ajouté au panier');
    }

    // Méthode pour supprimer un produit du panier
    public function destroy($id)
    {
        Cart::remove($id);
        return redirect()->route('cart.index')->with('success', 'Produit retiré du panier');
    }
}
