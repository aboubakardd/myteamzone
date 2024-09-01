@extends('layout')

@section('content')
<div class="container mt-4">
    <h4 class="mb-3">Messages de la conversation</h4>

    <div class="card">
        <div class="card-body">
            @if($messages->isEmpty())
                <div class="alert alert-info">Aucun message pour cette conversation.</div>
            @else
                <ul class="list-unstyled">
                    @foreach($messages as $message)
                        <li class="mb-3">
                            <div class="d-flex justify-content-between">
                                <strong>{{ $message->sender->name }}</strong>
                                <span class="text-muted small">{{ $message->created_at->format('d/m/Y H:i') }}</span>
                            </div>
                            <div class="alert alert-light border d-inline-block">
                                {{ $message->body }}
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    <!-- Formulaire pour répondre -->
    <form action="{{ route('conversations.store') }}" method="POST" class="mt-4">
        @csrf
        <input type="hidden" name="receiver_id" value="{{ $messages->first()->receiver_id }}">
        
        <div class="form-group mb-3">
            <label for="body">Votre réponse :</label>
            <textarea name="body" class="form-control" rows="3" required></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Répondre</button>
    </form>
</div>
@endsection
