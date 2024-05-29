<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaire;

class CommentaireController extends Controller
{
    // Liste des commentaires
    public function index()
    {
        $commentaires = Commentaire::all();
        return view('commentaires.index', compact('commentaires'));
    }

    // Afficher le formulaire pour ajouter un commentaire
    public function ajouter_commentaires()
    {
        return view('commentaires.create');
    }

    // Enregistrer un nouveau commentaire
    public function ajouter_commentaires_traitement(Request $request)
    {
        $request->validate([
            'contenu' => 'required',
            'nom_complet_auteur' => 'required',
            'article_id' => 'required|exists:articles,id',
        ]);

        Commentaire::create([
            'contenu' => $request->contenu,
            'nom_complet_auteur' => $request->nom_complet_auteur,
            'article_id' => $request->article_id,
        ]);

        return redirect()->route('commentaires.index')->with('status', 'Commentaire ajouté avec succès!');
    }

    // Afficher un commentaire spécifique
    public function show($id)
    {
        $commentaire = Commentaire::findOrFail($id);
        return view('commentaires.show', compact('commentaire'));
    }

    // Afficher le formulaire pour modifier un commentaire
    public function edit($id)
    {
        $commentaire = Commentaire::findOrFail($id);
        return view('commentaires.edit', compact('commentaire'));
    }

    // Mettre à jour un commentaire existant
    public function update(Request $request, $id)
    {
        $request->validate([
            'contenu' => 'required',
            'nom_complet_auteur' => 'required',
        ]);

        $commentaire = Commentaire::findOrFail($id);
        $commentaire->update([
            'contenu' => $request->contenu,
            'nom_complet_auteur' => $request->nom_complet_auteur,
        ]);

        return redirect()->route('commentaires.index')->with('status', 'Commentaire mis à jour avec succès!');
    }

    // Supprimer un commentaire
    public function destroy($id)
    {
        $commentaire = Commentaire::findOrFail($id);
        $commentaire->delete();

        return redirect()->route('commentaires.index')->with('status', 'Commentaire supprimé avec succès!');
    }
}

