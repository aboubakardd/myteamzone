<?php
namespace App\Http\Controllers;

use App\Models\Joueur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Parente;
use Illuminate\Support\Facades\Auth;


class JoueurController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:manage players', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    //     $this->middleware(['role:admin'])->only(['create', 'store', 'edit', 'update', 'destroy']);
    // }


    public function index()
    {
        $joueurs = Joueur::all();
        return view('joueurs.index', compact('joueurs'));
    }

    public function create()
    {
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Accès interdit');
        }
    
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
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Accès interdit');
        }
        $parentes = Parente::all();
        return view('joueurs.edit', compact('joueur', 'parentes'));
    }

    public function update(Request $request, Joueur $joueur)
    {
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Accès interdit');
        }

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
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Accès interdit');
        }
        
        $joueur->delete();

        return redirect()->route('joueurs.index')->with('success', 'Joueur deleted successfully.');
    }


    public function indexPublic()
{
    $joueurs = Joueur::with('statistiques')->get(); // Récupérer les joueurs avec leurs statistiques
    return view('joueurs.public', compact('joueurs'));
}

}
