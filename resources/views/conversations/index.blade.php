@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="row">
        <!-- Conversations List -->
        <div class="col-md-4">
            <h4 class="mb-3">Conversations</h4>
            <ul class="list-group">
                @foreach($conversations as $conversation)
                    <li class="list-group-item {{ request('conversation_id') == $conversation->id ? 'active' : '' }}">
                        <a href="{{ route('conversations.index', ['conversation_id' => $conversation->id]) }}" class="text-decoration-none text-dark">
                            Conversation #{{ $conversation->id }} avec {{ $conversation->userOne->id == Auth::id() ? $conversation->userTwo->name : $conversation->userOne->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Messages Area -->
        <div class="col-md-8">
            <h4 class="mb-3">Messages</h4>

            @if($messages->isEmpty())
                <div class="alert alert-info">Aucun message pour cette conversation.</div>
            @else
                <ul class="list-unstyled">
                    @foreach($messages as $message)
                        <li class="mb-2">
                            <strong>{{ $message->sender->name }}:</strong> 
                            <div class="alert alert-secondary d-inline-block">{{ $message->body }}</div>
                        </li>
                    @endforeach
                </ul>
            @endif

            <!-- Message Form -->
            <form action="{{ route('conversations.store') }}" method="POST">
                @csrf
                <input type="hidden" name="conversation_id" value="{{ request('conversation_id') }}">

                <div class="form-group mb-3">
                    <label for="receiver_id">Destinataire:</label>
                    <select name="receiver_id" class="form-control" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="body">Message:</label>
                    <textarea name="body" class="form-control" rows="4" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>
</div>
@endsection
