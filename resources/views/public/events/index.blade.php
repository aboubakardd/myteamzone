@extends('layout')

@section('title', 'Événements')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-4">Événements</h1>
        @if($events->isEmpty())
            <p>Aucun événement n'est disponible pour le moment.</p>
        @else
            <div class="row">
                @foreach ($events as $event)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $event->title }}</h5>
                                <p class="card-text">{{ $event->description }}</p>
                                <p class="card-text"><strong>Date :</strong> {{ $event->start_time }}</p>
                                <p class="card-text"><strong>Fin :</strong> {{ $event->end_time }}</p>
                                <p class="card-text"><strong>Lieu :</strong> {{ $event->location }}</p>
                                <a href="{{ route('public.events.show', $event->id) }}" class="btn btn-primary">Voir les détails</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
