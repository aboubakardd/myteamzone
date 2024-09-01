@extends('layout')

@section('title', 'Accueil')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-4">Prochains Événements</h1>
        <div id="upcoming-events" class="row">
            <p>Chargement des événements...</p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            fetch('/api/upcoming-events')
                .then(response => response.json())
                .then(events => {
                    let eventsHtml = '';

                    if (events.length === 0) {
                        eventsHtml = '<p>Aucun événement à venir.</p>';
                    } else {
                        events.forEach(event => {
                            eventsHtml += `
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">${event.title}</h5>
                                            <p class="card-text">${event.description}</p>
                                            <p class="card-text"><strong>Date :</strong> ${new Date(event.start_time).toLocaleString()}</p>
                                            <p class="card-text"><strong>Fin :</strong> ${new Date(event.end_time).toLocaleString()}</p>
                                            <p class="card-text"><strong>Lieu :</strong> ${event.location}</p>
                                            <a href="/events/${event.id}" class="btn btn-primary">Voir les détails</a>
                                        </div>
                                    </div>
                                </div>
                            `;
                        });
                    }

                    document.getElementById('upcoming-events').innerHTML = eventsHtml;
                })
                .catch(error => {
                    document.getElementById('upcoming-events').innerHTML = `<p>Erreur lors de la récupération des événements</p>`;
                });
        });
    </script>
@endsection
