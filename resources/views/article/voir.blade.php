<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Voir Article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>{{ $article->nom }}</h1>
        <div class="card mb-4">
            <img src="{{ $article->image }}" class="card-img-top" alt="{{ $article->nom }}">
            <div class="card-body">
                <h5 class="card-title">{{ $article->nom }}</h5>
                <p class="card-text">{{ $article->description }}</p>
                <p class="card-text"><small class="text-muted">Date de création: {{ $article->date_creation }}</small></p>
                <p class="card-text"><small class="text-muted">À la une: {{ $article->a_la_une ? 'Oui' : 'Non' }}</small></p>
                <a href="/article" class="btn btn-primary">Retour</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<!-- resources/views/articles/voir.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $article->nom }}</h1>
    <p>{{ $article->description }}</p>
    <p>Publié le : {{ $article->date_creation }}</p>
    <p>A la une : {{ $article->a_la_une ? 'Oui' : 'Non' }}</p>
    <img src="{{ $article->image }}" alt="Image de l'article">

    <hr>
    <h2>Commentaires</h2>

    @foreach ($article->commentaires as $commentaire)
        <div class="comment">
            <p>{{ $commentaire->contenu }}</p>
            <p><strong>{{ $commentaire->nom_complet_auteur }}</strong> - {{ $commentaire->created_at }}</p>
        </div>
    @endforeach

    <hr>
    <a href="{{ route('commentaires.create', ['article_id' => $article->id]) }}" class="btn btn-primary">Ajouter un Commentaire</a>
</div>
@endsection

