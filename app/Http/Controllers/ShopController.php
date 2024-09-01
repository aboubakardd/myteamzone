<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
{
    $query = Product::query();

    // Filtrer par catégorie
    if ($request->filled('category')) {
        $query->where('category_id', $request->category);
    }

    // Rechercher par nom ou description
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            $q->where('name', 'like', '%' . $search . '%')
              ->orWhere('description', 'like', '%' . $search . '%');
        });
    }

    // Récupérer les produits filtrés et/ou recherchés
    $products = $query->get();

    // Passer les catégories à la vue (pour le filtre)
    $categories = Category::all();

    return view('shop.index', compact('products', 'categories'));
}
    public function show(Product $product)
    {
        return view('shop.show', compact('product'));
    }
}
