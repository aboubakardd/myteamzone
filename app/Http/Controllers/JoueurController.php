<?php
namespace App\Http\Controllers;

use App\Models\Joueur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Parente;


class JoueurController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:manage players', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    // }

    public function index()
    {
        $joueurs = Joueur::all();
        return view('joueurs.index', compact('joueurs'));
    }

    public function create()
    {
        $parentes = Parente::all();
        return view('joueurs.create', compact('parentes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'birthdate' => 'required|date',
            'parente_id' => 'nullable|exists:parentes,id',
        ]);

        Joueur::create($request->all());

        return redirect()->route('joueurs.index')->with('success', 'Joueur created successfully.');
    }

    public function show(Joueur $joueur)
    {
        return view('joueurs.show', compact('joueur'));
    }

    public function edit(Joueur $joueur)
    {
        $parentes = Parente::all();
        return view('joueurs.edit', compact('joueur', 'parentes'));
    }

    public function update(Request $request, Joueur $joueur)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'birthdate' => 'required|date',
            'parente_id' => 'nullable|exists:parentes,id',
        ]);

        $joueur->update($request->all());

        return redirect()->route('joueurs.index')->with('success', 'Joueur updated successfully.');
    }

    public function destroy(Joueur $joueur)
    {
        $joueur->delete();

        return redirect()->route('joueurs.index')->with('success', 'Joueur deleted successfully.');
    }
}
