<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class CrudController extends Controller
{
    // Méthode pour afficher la liste des articles
    public function liste_article()
    {
        // Récupérer tous les articles de la base de données
        $articles = Article::all();

        // Retourner la vue 'articles.liste' avec les articles récupérés
        return view('articles.liste', compact('articles'));
    }

    // Méthode pour afficher le formulaire d'ajout d'un nouvel article
    public function ajouter_article()
    {
        // Retourner la vue 'articles.ajouter'
        return view('articles.ajouter');
    }

    // Méthode pour traiter la soumission du formulaire d'ajout d'un nouvel article
    public function ajouter_article_traitement(Request $request)
    {
        // Créer une nouvelle instance de l'article
        $article = new Article();

        // Assigner les valeurs du formulaire aux attributs de l'article
        $article->nom = $request->nom;
        $article->description = $request->description;
        $article->date_creation = $request->date_creation;
        $article->a_la_une = $request->a_la_une;
        $article->image = $request->image;

        // Sauvegarder l'article dans la base de données
        $article->save();

        // Rediriger vers la liste des articles avec un message de succès
        return redirect()->route('liste_article')->with('status', 'L\'article a bien été ajouté avec succès.');
    }

    // Méthode pour afficher un article spécifique
    public function voir_article($id)
    {
        // Récupérer l'article par son identifiant, lever une exception si non trouvé
        $article = Article::findOrFail($id);

        // Retourner la vue 'articles.voir' avec l'article récupéré
        return view('articles.voir', compact('article'));
    }

    // Méthode pour afficher le formulaire de mise à jour d'un article
    public function update_article($id)
    {
        // Récupérer l'article par son identifiant
        $articles = Article::find($id);

        // Retourner la vue 'articles.update' avec l'article récupéré
        return view('articles.update', compact('articles'));
    }

    // Méthode pour traiter la soumission du formulaire de mise à jour d'un article
    public function update_article_traitement(Request $request)
    {
        // Récupérer l'article par l'identifiant dans la requête
        $article = Article::find($request->id);

        // Mettre à jour les attributs de l'article avec les valeurs du formulaire
        $article->nom = $request->nom;
        $article->description = $request->description;
        $article->date_creation = $request->date_creation;
        $article->a_la_une = $request->a_la_une;
        $article->image = $request->image;

        // Sauvegarder les modifications dans la base de données
        $article->update();

        // Rediriger vers la liste des articles avec un message de succès
        return redirect()->route('liste_article')->with('status', 'L\'article a bien été modifié avec succès.');
    }

    // Méthode pour supprimer un article
    public function delete_article($id)
    {
        // Récupérer l'article par son identifiant
        $article = Article::find($id);

        // Supprimer l'article de la base de données
        $article->delete();

        // Rediriger vers la liste des articles avec un message de succès
        return redirect()->route('liste_article')->with('status', 'L\'article a bien été supprimé avec succès.');
    }
}
