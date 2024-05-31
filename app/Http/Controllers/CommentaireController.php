<?php

        namespace App\Http\Controllers;
        
        use Illuminate\Http\Request;
        use App\Models\Commentaire;
        
        class CommentaireController extends Controller
        {
            public function voir_article()
            {
                $commentaires = Commentaire::all();
                return view('commentaires.voir', compact(('commentaires')));
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
        
                return redirect('/ajouter')->with('status', 'Le commentaire  a bien était ajouté avec succes.');
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
            public function update_commentaire_traitement(Request $request)
            {

                $commentaire = new Commentaire;
                // $commentaire = Commentaire::find($request->id);
                $commentaire->article_id = $request->article_id;
                $commentaire->contenu = $request->contenu;
                $commentaire->nom_complet_auteur = $request->nom_complet_auteur;
                $commentaire->save();
                return redirect('/article')->with('status', 'L\'article a bien était modifié avec succes.');
            }
            // Supprimer un commentaire
    public function destroy($id)
    {
        $commentaire = Commentaire::findOrFail($id);
        $commentaire->delete();

        return redirect()->route('commentaires.supprimer')->with('status', 'Commentaire supprimé avec succès!');
    }
        }
        
        