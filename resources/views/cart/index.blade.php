@extends('layout')

@section('content')
    <h1>Votre Panier</h1>

    @if($cartItems->isEmpty())
        <p>Votre panier est vide.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price }} €</td>
                        <td>{{ $item->getPriceSum() }} €</td>
                        <td>
                            <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-right">
            <strong>Total: {{ Cart::getTotal() }} €</strong>
        </div>

          <!-- Bouton pour procéder au paiement -->
        <div class="text-right mt-4">
            <a href="{{ route('checkout') }}" class="btn btn-primary">Procéder au paiement</a>
        </div>
    @endif
@endsection
