@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Statistiques de {{ $joueur->name }}</h1>
    <a href="{{ route('joueurs.statistiques.create', $joueur->id) }}" class="btn btn-primary">Ajouter des Statistiques</a>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered mt-3">
        <tr>
            <th>Matchs Joués</th>
            <th>Buts</th>
            <th>Passes Décisives</th>
            <th>Cartons Jaunes</th>
            <th>Cartons Rouges</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($statistiques as $statistique)
        <tr>
            <td>{{ $statistique->matchs_joues }}</td>
            <td>{{ $statistique->buts }}</td>
            <td>{{ $statistique->passes_decisives }}</td>
            <td>{{ $statistique->cartons_jaunes }}</td>
            <td>{{ $statistique->cartons_rouges }}</td>
            <td>
                <a href="{{ route('joueurs.statistiques.edit', [$joueur->id, $statistique->id]) }}" class="btn btn-primary">Modifier</a>
                <form action="{{ route('joueurs.statistiques.destroy', [$joueur->id, $statistique->id]) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
