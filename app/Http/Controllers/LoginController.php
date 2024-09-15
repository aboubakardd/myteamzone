<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Générer un token Sanctum pour l'utilisateur
            $user = Auth::user();
            $token = $user->createToken('API Token')->plainTextToken;

            // Redirection vers l'index avec le token d'API
            return redirect()->intended('/index')->with('token', $token);
        }

        return back()->withErrors([
            'email' => 'Les informations de connexion ne sont pas correctes.',
        ])->onlyInput('email');
    }
}
