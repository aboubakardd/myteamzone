<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $event->title }}</title>
    <!-- Assurez-vous d'inclure Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 800px;
        }

        .card {
            border-radius: 15px;
        }

        .card-header {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .card-footer {
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
        }

        h1 {
            font-size: 2.5rem;
            color: #333;
        }

        .card-text {
            font-size: 1.1rem;
        }

        .btn-danger {
            padding: 10px 20px;
            font-size: 1.1rem;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1 class="mt-4 mb-4 text-center">{{ $event->title }}</h1>
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white text-center">
            <h4>{{ $event->title }}</h4>
        </div>
        <div class="card-body">
            <p class="card-text">{{ $event->description }}</p>
            <p class="card-text"><strong>Date de début :</strong> {{ $event->start_time }}</p>
            <p class="card-text"><strong>Date de fin :</strong> {{ $event->end_time }}</p>
            <p class="card-text"><strong>Lieu :</strong> {{ $event->location }}</p>
            <a href="{{ route('public.events.index') }}" class="btn btn-danger">Retour</a>
        </div>
        <div class="card-footer text-muted text-center">
            &copy; {{ date('Y') }} MyTeamZone. Tous droits réservés.
        </div>
    </div>
</div>

<!-- Assurez-vous d'inclure Bootstrap JS si nécessaire -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
