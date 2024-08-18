@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Entraineurs</h1>
    <a href="{{ route('entraineurs.create') }}" class="btn btn-primary">Add New Entraineur</a>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered mt-3">
        <tr>
            <th>Name</th>
            <th>Experience</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($entraineurs as $entraineur)
        <tr>
            <td>{{ $entraineur->name }}</td>
            <td>{{ $entraineur->experience }}</td>
            <td>
                <a href="{{ route('entraineurs.show', $entraineur->id) }}" class="btn btn-info">Show</a>
                <a href="{{ route('entraineurs.edit', $entraineur->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('entraineurs.destroy', $entraineur->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
