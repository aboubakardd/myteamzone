@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Show Entraineur</h1>
    <div class="form-group">
        <strong>Name:</strong>
        {{ $entraineur->name }}
    </div>
    <div class="form-group">
        <strong>Experience:</strong>
        {{ $entraineur->experience }}
    </div>
    <a href="{{ route('entraineurs.index') }}" class="btn btn-primary">Back</a>
</div>
@endsection
