<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Confirmation de Paiement</title>
</head>
<body>
    <h1>Confirmation de Paiement</h1>
    <p>Bonjour {{ $data['first_name'] }} {{ $data['name'] }},</p>
    <p>Nous vous confirmons que votre paiement a été effectué avec succès.</p>
    <p>Adresse de livraison : {{ $data['address'] }}</p>
    <p>Merci pour votre achat !</p>
</body>
</html>
