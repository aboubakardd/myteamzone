<?php

namespace App\Http\Controllers;

use App\Models\Entraineur;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;

class EntraineurController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //  public function __construct()
    //  {
    //      $this->middleware('permission:manage coaches', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    //  }

    public function index()
    {
        //
        $entraineurs = Entraineur::all();
        return view('entraineurs.index', compact('entraineurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Accès interdit');
        }
        return view('entraineurs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'experience' => 'required',
        ]);

        Entraineur::create($request->all());

        return redirect()->route('entraineurs.index')->with('success', 'Entraineur created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Entraineur $entraineur)
    {
        //
        return view('entraineurs.show', compact('entraineur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entraineur $entraineur)
    {
        //
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Accès interdit');
        }
        return view('entraineurs.edit', compact('entraineur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entraineur $entraineur)
    {
        //
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Accès interdit');
        }

        $request->validate([
            'name' => 'required',
            'experience' => 'required',
        ]);

        $entraineur->update($request->all());

        return redirect()->route('entraineurs.index')->with('success', 'Entraineur updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entraineur $entraineur)
    {
        //
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Accès interdit');
        }
        
        $entraineur->delete();

        return redirect()->route('entraineurs.index')->with('success', 'Entraineur deleted successfully.');
    }
}
