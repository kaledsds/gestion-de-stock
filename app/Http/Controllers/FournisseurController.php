<?php

namespace App\Http\Controllers;

use App\Models\Fourniseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fournisseurs = Fourniseur::all();
        return view('fournisseurs.index', compact('fournisseurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fournisseurs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required'
        ]);

        $fournisseur = new Fourniseur([
            'nom' => $request->get('nom'),
            'prenom' => $request->get('prenom'),
            'contact' => $request->get('contact'),
            'email' => $request->get('email'),

        ]);
        $fournisseur->save();
        return redirect('/fournisseurs')->with('success', 'Le fournisseur a été enregistré!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $fournisseur = Fourniseur::find($id);
        return view('fournisseurs.edit', compact('fournisseur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fournisseur = Fourniseur::find($id);
        $fournisseur->nom = $request->get('nom');
        $fournisseur->prenom = $request->get('prenom');
        $fournisseur->contact = $request->get('contact');
        $fournisseur->email = $request->get('email');
        $fournisseur->save();
        return redirect('/fournisseurs')->with('success', 'Le fournisseur a été modifié!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fournisseur = Fourniseur::find($id);
        $fournisseur->delete();
        return redirect('/fournisseurs')->with('success', 'Le fournisseur a été supprimé!');
    }
}
