<?php

namespace App\Http\Controllers;

use App\Models\Statistique;
use App\Models\Joueur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class StatistiqueController extends Controller
{
    public function index(Joueur $joueur)
    {
        $statistiques = $joueur->statistiques;
        return view('statistiques.index', compact('joueur', 'statistiques'));
    }

    public function create(Joueur $joueur)
    {
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Accès interdit');
        }
        return view('statistiques.create', compact('joueur'));
    }

    public function store(Request $request, Joueur $joueur)
    {
        $request->validate([
            'matchs_joues' => 'required|integer',
            'buts' => 'required|integer',
            'passes_decisives' => 'required|integer',
            'cartons_jaunes' => 'required|integer',
            'cartons_rouges' => 'required|integer',
        ]);

        $joueur->statistiques()->create($request->all());

        return redirect()->route('joueurs.statistiques.index', $joueur)->with('success', 'Statistiques ajoutées avec succès.');
    }

    public function edit(Joueur $joueur, Statistique $statistique)
    {
        return view('statistiques.edit', compact('joueur', 'statistique'));
    }

    public function update(Request $request, Joueur $joueur, Statistique $statistique)
    {
        $request->validate([
            'matchs_joues' => 'required|integer',
            'buts' => 'required|integer',
            'passes_decisives' => 'required|integer',
            'cartons_jaunes' => 'required|integer',
            'cartons_rouges' => 'required|integer',
        ]);

        $statistique->update($request->all());

        return redirect()->route('joueurs.statistiques.index', $joueur)->with('success', 'Statistiques mises à jour avec succès.');
    }

    public function destroy(Joueur $joueur, Statistique $statistique)
    {
        $statistique->delete();

        return redirect()->route('joueurs.statistiques.index', $joueur)->with('success', 'Statistiques supprimées avec succès.');
    }
}
