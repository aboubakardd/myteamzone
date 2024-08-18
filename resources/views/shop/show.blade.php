@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-6">
            @if($product->image)
                <img src="{{ asset('images/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}" width="200">
            @else
                <img src="{{ asset('images/default-product.png') }}" class="img-fluid" alt="Image par défaut">
            @endif
        </div>
        <div class="col-md-6">
            <h1>{{ $product->name }}</h1>
            <p>{{ $product->description }}</p>
            <p><strong>Prix : </strong>{{ $product->price }} €</p>

            <!-- Formulaire pour ajouter le produit au panier -->
            <form action="{{ route('cart.store') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $product->id }}">
                <input type="hidden" name="name" value="{{ $product->name }}">
                <input type="hidden" name="price" value="{{ $product->price }}">
                <input type="number" name="quantity" value="1" min="1">
                <button type="submit" class="btn btn-primary">Ajouter au panier</button>
            </form>
        </div>
    </div>
@endsection
