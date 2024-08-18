<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Récupère tous les produits depuis la base de données
        return view('shop.index', compact('products')); // Passe les produits à la vue
    }

    public function show(Product $product)
    {
        return view('shop.show', compact('product'));
    }
}
