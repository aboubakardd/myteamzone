<x-guest-layout>
    <form method="POST" action="{{ route('register.parent') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Date de naissance -->
        <div class="mt-4">
            <x-input-label for="dateDeNaissance" :value="__('Date de naissance')" />
            <x-text-input id="dateDeNaissance" class="block mt-1 w-full" type="date" name="dateDeNaissance" :value="old('dateDeNaissance')" required />
            <x-input-error :messages="$errors->get('dateDeNaissance')" class="mt-2" />
        </div>

        <!-- Sélection du joueur -->
        <div class="mt-4">
            <x-input-label for="joueur_id" :value="__('Choisissez votre enfant')" />
            <select id="joueur_id" name="joueur_id" class="block mt-1 w-full" required>
                <option value="">-- Sélectionner un enfant --</option>
                @foreach($joueurs as $joueur)
                    <option value="{{ $joueur->id }}">{{ $joueur->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('joueur_id')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
