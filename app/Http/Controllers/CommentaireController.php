<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaire;
use App\Models\Article;


class CommentaireController extends Controller
{
    public function voir_article($id)
    {
        $article = Article::findOrFail($id);
        $commentaires = Commentaire::where('article_id', $id)->paginate(5);
        return view('articles.voir', compact('article', 'commentaires'));
    }
    public function ajouter_commentaire()
    {
        return view('commentaires.ajouter');
    }
    public function ajouter_commentaire_traitement(request $request)
    {
        $commentaire = new Commentaire();
        $commentaire->contenu = $request->contenu;
        $commentaire->nom_complet_auteur = $request->nom_complet_auteur;
        $commentaire->date_heure_creation = $request->date_heure_creation;
        $commentaire->article_id = $request->article_id;

        $commentaire->save();

        return back()->with('status', 'Le commentaire  a bien était ajouté avec succes.');
    }
    public function voir_commentaire($id)
    {
        $article = Commentaire::findOrFail($id);
        return view('commentaires.voir', compact('commentaire'));
    }
    public function update_commentaire($commentaire_id)
    {
        $commentaires = Commentaire::find($commentaire_id);
        return view('commentaires.update', compact('commentaires'));
    }
    public function update_commentaire_traitement(Request $request,$id)
    {
         
        // $comme;
        $commentaire = Commentaire::find($id);
        $commentaire->contenu = $request->contenu;
        $commentaire->nom_complet_auteur = $request->nom_complet_auteur;
        $commentaire->save();
        return redirect('/article/'.$commentaire->article_id)->with('status', 'Le comentaire  a bien était modifié avec succes.');
    }
    // Supprimer un commentaire
    public function delete_commentaire($id)
    {
        $commentaire = Commentaire::find($id);
        $commentaire->delete();

        return back()->with('status', 'Commentaire supprimé avec succès!');
    }
}
