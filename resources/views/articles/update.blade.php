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
<h1>Modifier un article</h1>
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
    

<form action="/update/traitement" method="POST" class="form-group">
    @csrf
<input type="text" name="id" style="display: none;" value="{{$articles->id}}">
    <div class="mb-3">
      <label for="nom" class="form-label">Nom</label>
      <input type="text" class="form-control" id="nom" name="nom" value="{{$articles->nom}}">
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control" id="description" name="description" value="{{$articles->description}}">
        </div>
        
<div class="mb-3">
    <label for="date_creation" class="form-label">Date de création</label>
    <input type="date" class="form-control" id="date_creation" name="date_creation" value="{{$articles->date_creation}}">
</div>
<div class="mb-3">
    <label for="a_la_une" class="form-label">A la une</label>
    <select class="form-control" id="a_la_une" name="a_la_une">
        <option value="1">Oui</option>
        <option value="0">Non</option>
    </select>
</div>


<div class="mb-3">
    <label for="image" class="form-label">Image (URL)</label>
    <input type="text" class="form-control" id="image" name="image" value="{{$articles->image}}">
</div>
@if (!empty($article->image))
    <img src="{{ $article->image }}" alt="Image">
@endif

            <br>
    <button type="submit" class="btn btn-primary">Modifier un article</button>
    <br>  </br>
    <a href="/article" class="btn btn-danger">Retourner</a>
  </form>
 </div>

    
 
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


  </body>
</html>