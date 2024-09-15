<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DashboardController extends Controller
{
    // Méthode pour afficher le tableau de bord
    public function index()
    {
        // Vérifie si l'utilisateur est admin
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Accès interdit');
        }

        return view('dashboard'); // Vue du tableau de bord
    }
}
