<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Joueur;
use App\Models\Statistique;

class ParenteController extends Controller
{
    public function showStats($joueur_id)
    {
        // Récupérer l'utilisateur connecté
        $user = auth()->user();

        // Récupérer le joueur spécifique par son ID et vérifier qu'il appartient bien au parent
        $joueur = $user->enfants()->findOrFail($joueur_id);

        // Récupérer les statistiques de ce joueur
        $statistiques = $joueur->statistiques;

        // Retourner la vue avec le joueur et ses statistiques
        return view('parentes.stats', compact('joueur', 'statistiques'));
    }
}
