@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Create Entraineur</h1>
    <form action="{{ route('entraineurs.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="experience">Experience:</label>
            <input type="text" class="form-control" id="experience" name="experience">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
