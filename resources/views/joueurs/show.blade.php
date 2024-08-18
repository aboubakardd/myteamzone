@extends('adminlte::pages')

@section('content')
    <div class="container">
        <h1>Détails du joueur</h1>
        <p><strong>Nom :</strong> {{ $joueur->name }}</p>
        <p><strong>Position :</strong> {{ $joueur->position }}</p>
        <p><strong>Date de naissance :</strong> {{ $joueur->birthdate }}</p>
        <a href="{{ route('joueurs.statistiques.index', $joueur->id) }}" class="btn btn-primary">Voir les Statistiques</a>
        <a href="{{ route('joueurs.index') }}" class="btn btn-primary">Retour</a>
    </div>
@endsection
