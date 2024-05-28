<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;

route::get('/article', [CrudController::class,'liste_article']);
route::get('/ajouter', [CrudController::class,'ajouter_article']);
route::post('/ajouter/traitement', [CrudController::class,'ajouter_article_traitement']);
Route::get('/article/{id}', [CrudController::class, 'voir_article'])->name('voir_article');
route::get('/update-article/{id}', [CrudController::class,'update_article']);
route::post('/update/traitement', [CrudController::class,'update_article_traitement']);
route::get('/delete-article/{id}', [CrudController::class,'delete_article']);
