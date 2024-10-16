<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de votre commande</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin-top: 50px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        h3 {
            margin-top: 30px;
            margin-bottom: 15px;
            color: #007bff;
        }
        .alert {
            margin-bottom: 20px;
        }
        .btn-danger {
            width: 100%;
            padding: 10px;
            font-size: 18px;
        }
        .total {
            font-size: 1.5rem;
            font-weight: bold;
            color: #e63946;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <h1>Confirmation de votre commande</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <p class="text-center">Merci pour votre achat ! Votre commande a été traitée avec succès.</p>
        <p class="text-center">Numéro de commande : <strong>{{ $orderId }}</strong></p>

        <!-- Détails de la commande -->
        <h3>Détails de la commande</h3>
        @if($cartItems->isEmpty())
            <p>Votre panier est vide.</p>
        @else
            <table class="table table-bordered">
                <thead class="thead-light">
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

            <div class="text-right total">
                <strong>Total : {{ $total }} €</strong>
            </div>
        @endif

        <!-- Formulaire pour annuler la commande -->
        <form action="{{ route('order.cancel', ['orderId' => $orderId]) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger mt-3">Annuler la commande</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
