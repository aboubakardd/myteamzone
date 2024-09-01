<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procéder au paiement</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Procéder au paiement</h1>

        <!-- Affichage des messages de succès ou d'échec -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('stripe.payment') }}" method="post" id="payment-form">
    @csrf
    <div class="form-row">
        <label for="name">Nom</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>
    <div class="form-row mt-2">
        <label for="first_name">Prénom</label>
        <input type="text" id="first_name" name="first_name" class="form-control" required>
    </div>  
    <div class="form-row mt-2">
        <label for="address">Adresse de livraison</label>
        <input type="text" id="address" name="address" class="form-control" required>
    </div>
    <div class="form-row mt-2">
        <label for="email">Email de confirmation</label>
        <input type="email" id="email" name="email" class="form-control" required>
    </div>
    <div class="form-row mt-3">
        <label for="card-element">Carte de crédit ou débit</label>
        <div id="card-element">
            <!-- A Stripe Element will be inserted here. -->
        </div>
        <div id="card-errors" role="alert"></div>
    </div>

    <button type="submit" class="btn btn-success mt-3">Payer</button>
</form>

        <script src="https://js.stripe.com/v3/"></script>
        <script>
            var stripe = Stripe('{{ env('STRIPE_KEY') }}');
            var elements = stripe.elements();

            var style = {
                base: {
                    color: '#32325d',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };

            var card = elements.create('card', {style: style});
            card.mount('#card-element');

            card.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        stripeTokenHandler(result.token);
                    }
                });
            });

            function stripeTokenHandler(token) {
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);
                form.submit();
            }
        </script>
    </div>
</body>
</html>
