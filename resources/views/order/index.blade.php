@extends('layout')

@section('content')
    <div class="container mt-5">
        <h1>Mes Commandes</h1>

        @if($orders->isEmpty())
            <p>Vous n'avez pas encore passé de commandes.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>ID de la commande</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                            <td>{{ $order->total / 100 }} €</td>
                            <td>{{ ucfirst($order->status) }}</td>
                            <td>
                                <a href="{{ route('order.confirmation', ['orderId' => $order->id]) }}" class="btn btn-info">Voir les détails</a>
                                <!-- Ajoute le bouton d'annulation si nécessaire -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
