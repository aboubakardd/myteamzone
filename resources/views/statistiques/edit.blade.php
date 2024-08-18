@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Modifier les Statistiques de {{ $joueur->name }}</h1>
    <form action="{{ route('joueurs.statistiques.update', [$joueur->id, $statistique->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="matchs_joues">Matchs Joués:</label>
            <input type="number" class="form-control" id="matchs_joues" name="matchs_joues" value="{{ $statistique->matchs_joues }}" required>
        </div>
        <div class="form-group">
            <label for="buts">Buts:</label>
            <input type="number" class="form-control" id="buts" name="buts" value="{{ $statistique->buts }}" required>
        </div>
        <div class="form-group">
            <label for="passes_decisives">Passes Décisives:</label>
            <input type="number" class="form-control" id="passes_decisives" name="passes_decisives" value="{{ $statistique->passes_decisives }}" required>
        </div>
        <div class="form-group">
            <label for="cartons_jaunes">Cartons Jaunes:</label>
            <input type="number" class="form-control" id="cartons_jaunes" name="cartons_jaunes" value="{{ $statistique->cartons_jaunes }}" required>
        </div>
        <div class="form-group">
            <label for="cartons_rouges">Cartons Rouges:</label>
            <input type="number" class="form-control" id="cartons_rouges" name="cartons_rouges" value="{{ $statistique->cartons_rouges }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
