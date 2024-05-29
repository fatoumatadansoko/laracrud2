<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\CommentaireController;


route::get('/article', [CrudController::class,'liste_article']);
route::get('/ajouter', [CrudController::class,'ajouter_article']);
route::post('/ajouter/traitement', [CrudController::class,'ajouter_article_traitement']);
Route::get('/article/{id}', [CrudController::class, 'voir_article'])->name('voir_article');
route::get('/update-article/{id}', [CrudController::class,'update_article']);
route::post('/update/traitement', [CrudController::class,'update_article_traitement']);
route::get('/delete-article/{id}', [CrudController::class,'delete_article']);

route::get('/ajouter', [CommentaireController::class,'ajouter_commentaire']);
route::post('/ajouter/traitement', [CommentaireController::class,'ajouter_commentaire_traitement']);
Route::get('/article/{id}', [CommentaireController::class, 'voir_article'])->name('voir_commentaire');
route::get('/update-article/{id}', [CommentaireController::class,'update_article']);
route::post('/update/traitement', [CommentaireController::class,'update_commentaire_traitement']);
route::get('/delete-article/{id}', [CommentaireController::class,'delete_commentaire']);

