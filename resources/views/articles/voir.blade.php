<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Voir Article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .card-img-top {
            object-fit: cover;
            height: 500px;
            width: 100%;
        }
    </style>
</head>
<body>
    
    <div class="container mt-5">
        <div class="row">
            <!-- Section de l'article -->
            <div class="col-md-8">
                <h1>{{ $article->nom }}</h1>
                <div class="card mb-4">
                    <img src="{{ $article->image }}" class="card-img-top" alt="{{ $article->nom }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->nom }}</h5>
                        <p class="card-text">{{ $article->description }}</p>
                        <p class="card-text"><small class="text-muted">Date de création: {{ $article->date_creation }}</small></p>
                        <p class="card-text"><small class="text-muted">À la une: {{ $article->a_la_une ? 'Oui' : 'Non' }}</small></p>
                    </div>
                </div>
            </div>

            <!-- Section des commentaires -->
            <div class="col-md-4">
                <h2>Commentaires</h2>
                @if ($article->commentaires)
                    @foreach ($article->commentaires as $commentaire)
                        <div class="comment mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <p>{{ $commentaire->contenu }}</p>
                                    <p><strong>{{ $commentaire->nom_complet_auteur }}</strong> - {{ $commentaire->created_at }}</p>
                                    <a href="/update-commentaire/{{ $commentaire->id }}" class="btn btn-primary btn-sm">Modifier</a>
                                    <a href="/delete-commentaire/{{ $commentaire->id }}" class="btn btn-danger btn-sm">Supprimer</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ajouterCommentaireModal">
                    Ajouter un Commentaire
                </button>
                <a href="/article" class="btn btn-primary">Retour</a>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="ajouterCommentaireModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un commentaire</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/ajouter/commentaire/traitement" method="POST" class="form-group">
                        @csrf
                        <div class="mb-3">
                            <label for="contenu" class="form-label">Contenu</label>
                            <input type="text" class="form-control" id="contenu" name="contenu">
                        </div>
                        <div class="mb-3">
                            <label for="nom_complet_auteur" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom_complet_auteur" name="nom_complet_auteur">
                        </div>
                        <div class="mb-3">
                            <label for="date_heure_creation" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date_heure_creation" name="date_heure_creation">
                        </div>
                        <div class="mb-3">
                            <label for="article_id" class="form-label">Article ID</label>
                            <input type="number" class="form-control" id="article_id" name="article_id" value="{{ $article->id }}" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter un commentaire</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
