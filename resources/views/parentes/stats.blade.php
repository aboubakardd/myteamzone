@extends('layout')

@section('title', 'Statistiques de ' . $joueur->name)

@section('content_header')
    <h1>Statistiques de {{ $joueur->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Informations du joueur</h5>
            <ul class="list-unstyled">
                <li><strong>Nom:</strong> {{ $joueur->name }}</li>
                <li><strong>Email:</strong> {{ $joueur->email ?? 'Non disponible' }}</li>
                <li><strong>Position:</strong> {{ $joueur->position }}</li>
                <li><strong>Date de naissance:</strong> {{ $joueur->birthdate }}</li>
            </ul>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">Statistiques</h5>

            @if ($statistiques->isEmpty())
                <p>Aucune statistique disponible pour le joueur.</p>
            @else
                <ul class="list-group">
                    @foreach ($statistiques as $statistique)
                        <li class="list-group-item">
                            <strong>Date:</strong> {{ $statistique->date }}<br>
                            <strong>Matches:</strong> {{ $statistique->matches }}<br>
                            <strong>Buts:</strong> {{ $statistique->buts }}
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection
