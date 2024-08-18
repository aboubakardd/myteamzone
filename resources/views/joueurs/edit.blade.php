@extends('adminlte::page')

@section('content')
    <div class="container">
        <h1>Éditer le joueur</h1>
        <form action="{{ route('joueurs.update', $joueur) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nom :</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $joueur->name }}" required>
            </div>
            <div class="form-group">
                <label for="position">Position :</label>
                <input type="text" class="form-control" id="position" name="position" value="{{ $joueur->position }}" required>
            </div>
            <div class="form-group">
                <label for="birthdate">Date de naissance :</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ $joueur->birthdate }}" required>
            </div>
            <div class="form-group">
        <label for="parente_id">Parent</label>
        <select name="parente_id" class="form-control">
            <option value="">Sélectionner un parent</option>
            @foreach($parentes as $parente)
                <option value="{{ $parente->id }}" {{ $joueur->parente_id == $parente->id ? 'selected' : '' }}>{{ $parente->user->name }}</option>
            @endforeach
        </select>
    </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
@endsection
