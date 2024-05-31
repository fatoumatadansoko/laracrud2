<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste des Articles</title>
    <!-- Inclusion de Bootstrap CSS pour le style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* CSS personnalisé pour ajuster la taille des images dans les cartes */
        .card-img-top {
            object-fit: cover;
            height: 300px;
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Conteneur principal -->
    <div class="container mt-5">
        <!-- Titre de la page -->
        <h1 class="mb-4">Liste des Articles</h1>
        <!-- Bouton pour ajouter un nouvel article -->
        <a href="/ajouter/article" class="btn btn-primary">Ajouter un article</a>   

        <!-- Grille Bootstrap pour afficher les articles -->
        <div class="row">
            <!-- Boucle pour parcourir et afficher chaque article -->
            @foreach($articles as $article)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <!-- Affichage de l'image de l'article -->
                        <img src="{{ $article->image }}" class="card-img-top" alt="{{ $article->nom }}">
                        <div class="card-body">
                            <!-- Affichage du nom de l'article -->
                            <h5 class="card-title">{{ $article->nom }}</h5>
                            <!-- Affichage de la description avec une limite de 100 caractères -->
                            <p class="card-text">{{ Str::limit($article->description, 100) }}</p>
                            <!-- Affichage de la date de création de l'article -->
                            <p class="card-text"><small class="text-muted">Date de création: {{ $article->date_creation }}</small></p>
                            <!-- Affichage de l'état "À la une" -->
                            <p class="card-text"><small class="text-muted">À la une: {{ $article->a_la_une ? 'Oui' : 'Non' }}</small></p>
                            <!-- Bouton pour voir plus de détails sur l'article -->
                            <a href="{{ route('voir_article', $article->id) }}" class="btn btn-primary">Voir plus</a>
                            <!-- Boutons pour supprimer ou modifier l'article -->
                            <div>
                                <a href="{{ url('/delete-article/'.$article->id) }}" class="btn btn-danger">Supprimer</a>
                                <a href="/update-article/{{ $article->id }}" class="btn btn-primary">Modifier un article</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Inclusion de Bootstrap JS pour les fonctionnalités interactives -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
