@extends('layout')

@section('content')
    <div class="container">
        <h1 class="mb-5 text-center" style="color: #D2691E;">Joueurs et Statistiques</h1>

        <div class="row">
            @foreach ($joueurs as $joueur)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow" style="border: 1px solid #D3D3D3;">
                        <div class="card-body" style="background-color: #FAF9F6;">
                            <h5 class="card-title" style="color: #D2691E;">{{ $joueur->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $joueur->position }}</h6>

                            @if($joueur->statistiques->isNotEmpty())
                                <ul class="list-group list-group-flush">
                                    @foreach ($joueur->statistiques as $statistique)
                                        <li class="list-group-item" style="background-color: #FFFBEA;">Matches joués: 
                                            <strong style="color: #CD5C5C;">{{ $statistique->matchs_joues }}</strong></li>
                                        <li class="list-group-item" style="background-color: #FFFBEA;">Buts marqués: 
                                            <strong style="color: #228B22;">{{ $statistique->buts }}</strong></li>
                                        <li class="list-group-item" style="background-color: #FFFBEA;">Passes décisives: 
                                            <strong style="color: #228B22;">{{ $statistique->passes_decisives }}</strong></li>
                                        <li class="list-group-item" style="background-color: #FFFBEA;">Cartons jaunes: 
                                            <strong style="color: #DAA520;">{{ $statistique->cartons_jaunes }}</strong></li>
                                        <li class="list-group-item" style="background-color: #FFFBEA;">Cartons rouges: 
                                            <strong style="color: #CD5C5C;">{{ $statistique->cartons_rouges }}</strong></li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="card-text" style="color: #A9A9A9;">Aucune statistique disponible</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
