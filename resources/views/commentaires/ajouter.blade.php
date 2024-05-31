<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>App laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    

<div class="container">
  <div class="row">
    <div class="col s12">
<h1>Ajouter un commentaire</h1>
<hr>
@if (@session('status'))
<div class="alert alert-succes">
    {{session('status')}}
    </div>/.alert.alert-succes
    @endif
<ul>
    @foreach ($errors->all() as $error)
    <li class="alert alert_danger">{{$error}}</li>
@endforeach
</ul>
    

<form action="/ajouter/commentaire/traitement" method="POST" class="form-group">
    @csrf

    <div class="mb-3">
        <div class="mb-3">
            <label for="contenu" class="form-label">Contenu</label>
            <input type="text" class="form-control" id="contenu" name="contenu">
            </div>
      <label for="nom_complet_auteur" class="form-label">Nom</label>
      <input type="string" class="form-control" id="nom" name="nom_complet_auteur">
      <label for="date_heure_creation" class="form-label">date</label>
      <input type="date" class="form-control" id="date_heure_creation" name="date_heure_creation">
      <label for="article_id" class="form-label">Nom</label>
      <input type="int" class="form-control" id="article_id" name="article_id">
      </div>
      
        <br>
    <button type="submit" class="btn btn-primary">Ajouter un comentaire</button>
    <br>  </br>
    <a href="/article" class="btn btn-danger">Retourner</a>
  </form>
 </div>

    
 
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


  </body>
</html>