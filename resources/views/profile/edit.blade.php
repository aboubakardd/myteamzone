@extends('layout')

@section('content')
<div class="container">
    <h1 class="mb-4">Mon Profil</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="profile-picture mb-4">
                <img src="{{ $user->profile_photo_path ? $user->profile_photo_path : 'https://via.placeholder.com/150' }}" alt="Photo de Profil" class="img-fluid rounded-circle">
                <form method="POST" action="{{ route('profile.updatePicture') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-2">
                        <label for="profile_picture">Changer la photo de profil</label>
                        <input id="profile_picture" type="file" class="form-control-file" name="profile_picture">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Mettre à jour la photo</button>
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="name">Nom</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="form-group">
                    <label for="bio">Biographie</label>
                    <textarea id="bio" class="form-control" name="bio" rows="3">{{ old('bio', $user->bio) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="phone">Numéro de téléphone</label>
                    <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone', $user->phone) }}">
                </div>

                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </form>

            <form method="POST" action="{{ route('profile.destroy') }}" class="mt-4">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Supprimer mon compte</button>
            </form>
        </div>
    </div>
</div>

@section('styles')
<style>
    .profile-picture img {
        max-width: 150px;
        border: 2px solid #ddd;
        padding: 5px;
    }
    .profile-picture {
        text-align: center;
    }
</style>
@endsection
@endsection
