<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #333;
        }

        .product-image img {
            max-width: 200px;
            height: auto;
            margin-bottom: 15px;
            border-radius: 8px;
        }

        .price {
            font-size: 1.5rem;
            color: #e63946;
            margin-bottom: 20px;
        }

        .form-control, .form-select {
            width: 100%;
            padding: 10px;
            border: 2px solid #dee2e6;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            color: #fff;
            cursor: pointer;
            width: 100%;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>{{ $product->name }}</h1>
    <div class="product-image">
        @if($product->image)
            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
        @else
            <img src="{{ asset('images/default-product.png') }}" alt="Image par défaut">
        @endif
    </div>

    <p class="price">{{ $product->price }} €</p>

    <!-- Formulaire pour ajouter le produit au panier -->
    <form action="{{ route('cart.store') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $product->id }}">
        <input type="hidden" name="name" value="{{ $product->name }}">
        <input type="hidden" name="price" value="{{ $product->price }}">

        <!-- Choix de la taille du maillot -->
        <div class="form-group">
            <label for="size" class="form-label">Choisir la taille du maillot :</label>
            <select name="size" class="form-select">
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
            </select>
        </div>

        <div class="form-group">
            <label for="quantity" class="form-label">Quantité :</label>
            <input type="number" name="quantity" value="1" min="1" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Ajouter au panier</button>
    </form>
</div>

</body>
</html>
