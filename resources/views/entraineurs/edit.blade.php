@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Edit Entraineur</h1>
    <form action="{{ route('entraineurs.update', $entraineur->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $entraineur->name }}">
        </div>
        <div class="form-group">
            <label for="experience">Experience:</label>
            <input type="text" class="form-control" id="experience" name="experience" value="{{ $entraineur->experience }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
