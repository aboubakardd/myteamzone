@extends('layout')

@section('content')
    <div class="container mt-5">
        <h1>Confirmation de votre commande</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <p>Merci pour votre achat ! Votre commande a été traitée avec succès.</p>
        <p>Numéro de commande : {{ $orderId }}</p>

        <!-- Détails de la commande -->
        <h3>Détails de la commande</h3>
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
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->price }} €</td>
                            <td>{{ $item->getPriceSum() }} €</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-right">
                <strong>Total : {{ $total }} €</strong>
            </div>
        @endif
        <!-- Ajoute ce formulaire sur la page de confirmation de commande -->
<form action="{{ route('order.cancel', ['orderId' => $orderId]) }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-danger">Annuler la commande</button>
</form>

    </div>
@endsection
