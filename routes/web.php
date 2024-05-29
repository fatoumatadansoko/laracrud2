<?php

use App\Http\Controllers\CommentaireController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;

// Route pour la liste des articles
Route::get('/article', [CrudController::class, 'liste_article'])->name('liste_article');

// Route pour afficher le formulaire d'ajout d'un article
Route::get('/ajouter', [CrudController::class, 'ajouter_article'])->name('ajouter_article');

// Route pour traiter l'ajout d'un article
Route::post('/ajouter/traitement', [CrudController::class, 'ajouter_article_traitement'])->name('ajouter_article_traitement');

// Route pour afficher un article spécifique
Route::get('/article/{id}', [CrudController::class, 'voir_article'])->name('voir_article');

// Route pour afficher le formulaire de modification d'un article
Route::get('/update-article/{id}', [CrudController::class, 'update_article'])->name('update_article');

// Route pour traiter la modification d'un article
Route::post('/update/traitement', [CrudController::class, 'update_article_traitement'])->name('update_article_traitement');

// Route pour supprimer un article
Route::get('/delete-article/{id}', [CrudController::class, 'delete_article'])->name('delete_article');


route::get('/ajouter', [CommentaireController::class,'ajouter_commentaire'])->name('commentaire.ajouter');
route::post('/ajouter/traitement', [CommentaireController::class,'ajouter_commentaire_traitement'])->name('ajouter_traitement');
Route::get('/commentaire/{id}', [CommentaireController::class, 'voir_commentaire'])->name('voir_commentaire');
route::get('/update-commentaire/{id}', [CommentaireController::class,'update_article'])->name('update_commentaire');
route::post('/update/traitement', [CommentaireController::class,'update_commentaire_traitement'])->name('update_traitement');
route::get('/delete-commentaire/{id}', [CommentaireController::class,'delete_commentaire'])->name('delete_commentaire');

