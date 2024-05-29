<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste des Articles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Liste des Articles</h1>
        <a href="/ajouter" class="btn btn-primary">ajouter un article</a>   

        <div class="row">
            @foreach($articles as $article)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ $article->image }}" class="card-img-top" alt="{{ $article->nom }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->nom }}</h5>
                            <p class="card-text">{{ Str::limit($article->description, 100) }}</p>
                            <p class="card-text"><small class="text-muted">Date de création: {{ $article->date_creation }}</small></p>
                            <p class="card-text"><small class="text-muted">À la une: {{ $article->a_la_une ? 'Oui' : 'Non' }}</small></p>
                            <a href="{{ route('voir_article', $article->id) }}" class="btn btn-primary">Voir plus</a>
                            <div>
                                <a href="{{ url('/update-article/'.$article->id) }}" class="btn btn-info">Modifier</a>
                                <a href="{{ url('/delete-article/'.$article->id) }}"class= "btn btn-danger">Supprimer</a>
                        
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
