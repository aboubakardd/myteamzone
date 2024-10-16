@extends('layout')

@section('title', 'Accueil')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-4 text-center" style="color: #D2691E;">Prochains Événements</h1>
        <div id="upcoming-events" class="row">
            <p style="color: #A9A9A9;">Chargement des événements...</p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            fetch('/api/upcoming-events')
                .then(response => response.json())
                .then(events => {
                    let eventsHtml = '';

                    if (events.length === 0) {
                        eventsHtml = '<p style="color: #A9A9A9;">Aucun événement à venir.</p>';
                    } else {
                        events.forEach(event => {
                            eventsHtml += `
                                <div class="col-md-4 mb-4">
                                    <div class="card shadow" style="border: 1px solid #D3D3D3;">
                                        <div class="card-body" style="background-color: #FAF9F6;">
                                            <h5 class="card-title" style="color: #D2691E;">${event.title}</h5>
                                            <p class="card-text" style="color: #696969;">${event.description}</p>
                                            <p class="card-text"><strong>Date :</strong> 
                                                <span style="color: #228B22;">${new Date(event.start_time).toLocaleString()}</span></p>
                                            <p class="card-text"><strong>Fin :</strong> 
                                                <span style="color: #CD5C5C;">${new Date(event.end_time).toLocaleString()}</span></p>
                                            <p class="card-text"><strong>Lieu :</strong> 
                                                <span style="color: #DAA520;">${event.location}</span></p>
                                            <a href="/events/${event.id}" class="btn btn-outline-primary">Voir les détails</a>
                                        </div>
                                    </div>
                                </div>
                            `;
                        });
                    }

                    document.getElementById('upcoming-events').innerHTML = eventsHtml;
                })
                .catch(error => {
                    document.getElementById('upcoming-events').innerHTML = `<p style="color: #CD5C5C;">Erreur lors de la récupération des événements</p>`;
                });
        });
    </script>
@endsection
