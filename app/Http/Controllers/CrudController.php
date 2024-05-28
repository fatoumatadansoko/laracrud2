<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class CrudControllerr extends Controller
{
    public function liste_article()
    {
        $articles = Article::all();
        return view('articles.liste', compact(('articles')));
    }
    public function ajouter_article()
    {
        return view('articles.ajouter');
    }
    public function ajouter_article_traitement(request $request)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'date_creation' => 'required',
            'a_la_une' => 'required',
            'image' => 'required',

        ]);
        $article = new Article();
        $article->nom = $request->nom;
        $article->description = $request->description;
        $article->date_creation = $request->date_creation;
        $article->a_la_une = $request->a_la_une;
        $article->image = $request->image;
        $article->save();

        return redirect('/ajouter')->with('status', 'L\'article a bien était ajouté avec succes.');
    }
    public function voir_article($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.voir', compact('article'));
    }
    public function update_article($id)
    {
        $articles = Article::find($id);
        return view('articles.update', compact('articles'));
    }
    public function update_article_traitement(Request $request)
    {

        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'date_creation' => 'required',
            'a_la_une' => 'required',
            'image' => 'required',

        ]);
        $article =  Article::find($request->id);
        $article->nom = $request->nom;
        $article->description = $request->description;
        $article->date_creation = $request->date_creation;
        $article->a_la_une = $request->a_la_une;
        $article->image = $request->image;
        $article->update();
        return redirect('/article')->with('status', 'L\'article a bien était modifié avec succes.');
    }
    public function delete_article($id){
        $article= Article::find($id);
        $article->delete();
        return redirect('/article')->with('status', 'L\'article a bien était supprimé avec succes.');
    
    }
}
