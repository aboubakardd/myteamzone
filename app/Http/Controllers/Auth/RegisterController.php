<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Joueur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showUserRegistrationForm()
    {
        return view('auth.register');
    }

    public function registerUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'dateDeNaissance' => ['required', 'date'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'dateDeNaissance' => $request->input('dateDeNaissance'),
            'typeUser' => 'user', // Type d'utilisateur standard
        ]);

        return redirect()->route('dashboard'); // Indiquer le tableau de bord après l'inscription
    }

    public function showParentRegistrationForm()
    {
        $joueurs = Joueur::all();
        return view('auth.register_parent', compact('joueurs'));
    }

    public function registerParent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'dateDeNaissance' => ['required', 'date'],
            'joueur_id' => ['required', 'exists:joueurs,id'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'dateDeNaissance' => $request->input('dateDeNaissance'),
            'typeUser' => 'parent', // Type d'utilisateur parent
        ]);

        // Créer une relation parent-joueur
        \App\Models\Parente::create([
            'user_id' => $user->id,
            'joueur_id' => $request->input('joueur_id'),
        ]);

        return redirect()->route('dashboard'); // Rediriger vers le tableau de bord après l'inscription
    }
}
