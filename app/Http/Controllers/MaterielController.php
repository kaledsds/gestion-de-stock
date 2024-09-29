<?php

namespace App\Http\Controllers;

use App\Models\Fourniseur;
use Illuminate\Http\Request;
use App\Models\Materiel;

class MaterielController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materiels = Materiel::join('fourniseurs', 'fourniseurs.id', '=', 'materiels.fourniseur_id')
            ->get([
                'materiels.id',
                'materiels.nom',
                'materiels.qte',
                'materiels.discription',
                'fourniseurs.nom AS fourniseur_nom',
                'fourniseurs.prenom AS fourniseur_prenom',

            ]);
        return view('materiels.index', compact('materiels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fournisseurs = Fourniseur::all();
        return view('materiels.create', compact('fournisseurs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'qte' => 'required'
        ]);

        $materiel = new Materiel([
            'nom' => $request->get('nom'),
            'qte' => $request->get('qte'),
            'discription' => $request->get('discription'),
            'fourniseur_id' => $request->get('fourniseur_id')

        ]);
        $materiel->save();
        return redirect('/materiels')->with('success', 'Le materiel a été enregistré!');
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
        $materiel = Materiel::find($id);
        $oldfournisseur = Fourniseur::find($materiel->fourniseur_id);
        $fournisseurs = Fourniseur::all();
        return view('materiels.edit', compact('materiel', 'oldfournisseur', 'fournisseurs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $materiel = Materiel::find($id);
        $materiel->nom = $request->get('nom');
        $materiel->qte = $request->get('qte');
        $materiel->discription = $request->get('discription');
        $materiel->fourniseur_id = $request->get('fourniseur_id');
        $materiel->save();
        return redirect('/materiels')->with('success', 'Le materiel a été modifié!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $materiel = Materiel::find($id);
        $materiel->delete();
        return redirect('/materiels')->with('success', 'Le materiel a été supprimé!');
    }
}
