@extends('adminlte::page')

@section('content')
    <div class="container">
        <h1>Ajouter un joueur</h1>
        <form action="{{ route('joueurs.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nom :</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="position">Position :</label>
                <input type="text" class="form-control" id="position" name="position" required>
            </div>
            <div class="form-group">
                <label for="birthdate">Date de naissance :</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" required>
            </div>
            <div class="form-group">
        <label for="parente_id">Parent</label>
        <select name="parente_id" class="form-control">
            <option value="">Sélectionner un parent</option>
            @foreach($parentes as $parente)
                <option value="{{ $parente->id }}">{{ $parente->user->name }}</option>
            @endforeach
        </select>
    </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
@endsection
