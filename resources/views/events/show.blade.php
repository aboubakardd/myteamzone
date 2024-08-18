@extends('adminlte::page')

@section('content')
    <div class="container">
        <h1>Détails de l'événement</h1>
        <p><strong>Titre :</strong> {{ $event->title }}</p>
        <p><strong>Description :</strong> {{ $event->description }}</p>
        <p><strong>Heure de début :</strong> {{ $event->start_time }}</p>
        <p><strong>Heure de fin :</strong> {{ $event->end_time }}</p>
        <p><strong>Lieu :</strong> {{ $event->location }}</p>
        <a href="{{ route('events.index') }}" class="btn btn-primary">Retour</a>
    </div>
@endsection
