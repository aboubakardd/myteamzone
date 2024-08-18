@extends('adminlte::page')

@section('content')
    <div class="container">
        <h1>Joueurs</h1>
        <a href="{{ route('joueurs.create') }}" class="btn btn-primary">Ajouter un joueur</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Position</th>
                    <th>Date de naissance</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($joueurs as $joueur)
                    <tr>
                        <td>{{ $joueur->id }}</td>
                        <td>{{ $joueur->name }}</td>
                        <td>{{ $joueur->position }}</td>
                        <td>{{ $joueur->birthdate }}</td>
                        <td>
                        <a href="{{ route('joueurs.statistiques.index', $joueur->id) }}" class="btn btn-primary">Voir les Statistiques</a>
                            <a href="{{ route('joueurs.show', $joueur) }}" class="btn btn-info">Voir</a>
                            <a href="{{ route('joueurs.edit', $joueur) }}" class="btn btn-warning">Éditer</a>
                            <form action="{{ route('joueurs.destroy', $joueur) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
