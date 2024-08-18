@extends('layout')

@section('content')
    <div class="row">
        @forelse($products as $product)
            <div class="col-md-4">
                <div class="card">
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
@endsection
