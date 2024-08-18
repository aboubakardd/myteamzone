@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Ajouter des Statistiques pour {{ $joueur->name }}</h1>
    <form action="{{ route('joueurs.statistiques.store', $joueur->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="matchs_joues">Matchs Joués:</label>
            <input type="number" class="form-control" id="matchs_joues" name="matchs_joues" required>
        </div>
        <div class="form-group">
            <label for="buts">Buts:</label>
            <input type="number" class="form-control" id="buts" name="buts" required>
        </div>
        <div class="form-group">
            <label for="passes_decisives">Passes Décisives:</label>
            <input type="number" class="form-control" id="passes_decisives" name="passes_decisives" required>
        </div>
        <div class="form-group">
            <label for="cartons_jaunes">Cartons Jaunes:</label>
            <input type="number" class="form-control" id="cartons_jaunes" name="cartons_jaunes" required>
        </div>
        <div class="form-group">
            <label for="cartons_rouges">Cartons Rouges:</label>
            <input type="number" class="form-control" id="cartons_rouges" name="cartons_rouges" required>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection
