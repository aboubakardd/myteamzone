@extends('layout')

@section('content')
<div class="shop-container">
    <div class="filter-search-bar">
        <form method="GET" action="{{ route('shop.index') }}" class="form-inline">
            <div class="form-group">
                <label for="category">Filtrer par catégorie:</label>
                <select name="category" id="category" class="form-control">
                    <option value="">Toutes les catégories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="search">Recherche de produits:</label>
                <input type="text" name="search" id="search" class="form-control" placeholder="Rechercher...">
            </div>
            <button type="submit" class="btn btn-primary">Filtrer</button>
        </form>
    </div>

    <div class="row product-grid">
        @forelse($products as $product)
            <div class="col-md-4">
                <div class="card product-card">
                    @if($product->image)
                        <img src="{{ asset('images/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    @else
                        <img src="{{ asset('images/default-product.png') }}" class="card-img-top" alt="Image par défaut">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text">{{ $product->price }} €</p>
                        <a href="{{ route('shop.show', $product->id) }}" class="btn btn-primary">Voir le produit</a>
                    </div>
                </div>
            </div>
        @empty
            <p>Aucun produit disponible.</p>
        @endforelse
    </div>
</div>
@endsection
