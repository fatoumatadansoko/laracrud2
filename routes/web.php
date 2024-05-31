<?php

use App\Http\Controllers\CommentaireController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;

Route::get('/article', [CrudController::class, 'liste_article'])->name('liste_article');
Route::get('/ajouter/article', [CrudController::class, 'ajouter_article'])->name('ajouter_article');

// Route pour traiter l'ajout d'un article
Route::post('/ajouter/traitement', [CrudController::class, 'ajouter_article_traitement'])->name('ajouter_article_traitement');

// Route pour afficher un article spécifique
Route::get('/article/{id}', [CrudController::class, 'voir_article'])->name('voir_article');

// Route pour afficher le formulaire de modification d'un article
Route::get('/update-article/{id}', [CrudController::class, 'update_article'])->name('update_article');
Route::post('/update/article/traitement', [CrudController::class, 'update_article_traitement'])->name('update_article_traitement');
Route::get('/delete-article/{id}', [CrudController::class, 'delete_article'])->name('delete_article');





// La routes des commentaires

// route::(CommentaireController)
        route::get('/commentaire/{id}', [CommentaireController::class, 'voir_commentaire'])->name('voir_commentaire');
        route::get('/ajouter', [CommentaireController::class,'ajouter_commentaire'])->name('commentaire.ajouter');
        route::post('/ajouter/commentaire/traitement', [CommentaireController::class,'ajouter_commentaire_traitement'])->name('ajouter_traitement');
        route::get('/update-commentaire/{id}', [CommentaireController::class,'update_commentaire'])->name('update_commentaire');
        route::put('/update/commentaire/{id}', [CommentaireController::class,'update_commentaire_traitement'])->name('update_traitement');
        route::get('/delete-commentaire/{id}', [CommentaireController::class,'delete_commentaire'])->name('delete_commentaire');

