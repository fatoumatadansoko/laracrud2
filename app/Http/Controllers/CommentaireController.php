<?php

        namespace App\Http\Controllers;
        
        use Illuminate\Http\Request;
        use App\Models\Commentaire;
        
        class CommentaireController extends Controller
        {
            public function voir_article()
            {
                $commentaires = Commentaire::all();
                return view('commentaire.voir', compact(('commentaires')));
            }
            public function ajouter_commentaire()
            {
                return view('commentaire.ajouter');
            }
            public function ajouter_commentaire_traitement(request $request)
            {
                $request->validate([
                    'contenu' => 'required',
                    'nom_complet_auteur' => 'required',
                ]);
                $commentaire = new Commentaire();
                $commentaire->contenu = $request->contenu;
                $commentaire->nom_complet_auteur = $request->nom_complet_auteur;
                $commentaire->save();
        
                return redirect('/ajouter')->with('status', 'L\'article a bien était ajouté avec succes.');
            }
            public function voir_commentaire($id)
            {
                $article = Commentaire::findOrFail($id);
                return view('commentaire.voir', compact('commentaire'));
            }
            public function update_commentaire($id)
            {
                $commentaires = Commentaire::find($id);
                return view('update.update', compact('commentaires'));
            }
            public function update_commentaire_traitement(Request $request)
            {

                $commentaire = Commentaire::find($request->id);
                $commentaire->contenu = $request->contenu;
                $commentaire->nom_complet_auteur = $request->nom_complet_auteur;
                $commentaire->update();
                return redirect('/article')->with('status', 'L\'article a bien était modifié avec succes.');
            }
            // Supprimer un commentaire
    public function destroy($id)
    {
        $commentaire = Commentaire::findOrFail($id);
        $commentaire->delete();

        return redirect()->route('commentaires.index')->with('status', 'Commentaire supprimé avec succès!');
    }
        }
        
        