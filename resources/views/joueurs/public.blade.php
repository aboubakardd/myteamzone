@extends('layout')

@section('content')
    <div class="container">
        <h1>Joueurs et Statistiques</h1>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Position</th>
                    <!-- <th>Date de naissance</th> -->
                    <th>Statistiques</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($joueurs as $joueur)
                    <tr>
                        <td>{{ $joueur->id }}</td>
                        <td>{{ $joueur->name }}</td>
                        <td>{{ $joueur->position }}</td>
                        <!-- <td>{{ $joueur->birthdate }}</td> -->
                        <td>
                            <!-- Affichage des statistiques -->
                            @if($joueur->statistiques->isNotEmpty())
                                <ul>
                                    @foreach ($joueur->statistiques as $statistique)
                                        <li>Matches joués: {{ $statistique->matchs_joues }}</li>
                                        <li>Buts marqués: {{ $statistique->buts }}</li>
                                        <li>Passes décisives: {{ $statistique->passes_decisives }}</li>
                                        <li>Cartons jaunes: {{ $statistique->cartons_jaunes }}</li>
                                        <li>Cartons rouges: {{ $statistique->cartons_rouges }}</li>
                                        <!-- Ajoute plus d'informations statistiques ici -->
                                    @endforeach
                                </ul>
                            @else
                                Aucune statistique disponible
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
