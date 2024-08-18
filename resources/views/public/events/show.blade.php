@extends('layout')

@section('title', 'Détails de l\'événement')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-4">{{ $event->title }}</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $event->title }}</h5>
                <p class="card-text">{{ $event->description }}</p>
                <p class="card-text"><strong>Date de début :</strong> {{ $event->start_time }}</p>
                <p class="card-text"><strong>Date de fin :</strong> {{ $event->end_time }}</p>
                <p class="card-text"><strong>Lieu :</strong> {{ $event->location }}</p>
                <a href="{{ route('public.events.index') }}" class="btn btn-primary">Retour</a>
            </div>
        </div>
    </div>
@endsection
