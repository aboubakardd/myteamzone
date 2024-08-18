@extends('adminlte::page')

@section('content')
    <div class="container">
        <h1>Éditer l'événement</h1>
        <form action="{{ route('events.update', $event) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Titre :</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $event->title }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description :</label>
                <textarea class="form-control" id="description" name="description">{{ $event->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="start_time">Heure de début :</label>
                <input type="datetime-local" class="form-control" id="start_time" name="start_time" value="{{ date('Y-m-d\TH:i', strtotime($event->start_time)) }}" required>
            </div>
            <div class="form-group">
                <label for="end_time">Heure de fin :</label>
                <input type="datetime-local" class="form-control" id="end_time" name="end_time" value="{{ date('Y-m-d\TH:i', strtotime($event->end_time)) }}">
            </div>
            <div class="form-group">
                <label for="location">Lieu :</label>
                <input type="text" class="form-control" id="location" name="location" value="{{ $event->location }}">
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
@endsection
