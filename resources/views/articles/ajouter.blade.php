<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>App Laravel</title>
    <!-- Chargement de Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <!-- Conteneur principal -->
    <div class="container">
        <div class="row">
            <div class="col s12">
                <!-- Titre de la page -->
                <h1>Ajouter un article</h1>
                <!-- Ligne de séparation -->
                <hr>
                <!-- Affichage des messages de statut -->
                @if (@session('status'))
                    <div class="alert alert-succes">
                        {{ session('status') }}
                    </div>
                @endif
                <!-- Affichage des erreurs de validation -->
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="alert alert-danger">{{ $error }}</li>
                    @endforeach
                </ul>

                <!-- Formulaire d'ajout d'article -->
                <form action="/ajouter/traitement" method="POST" class="form-group">
                    @csrf
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="string" class="form-control" id="nom" name="nom">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description">
                    </div>
                    <div class="mb-3">
                        <label for="date_creation" class="form-label">Date de création</label>
                        <input type="date" class="form-control" id="date_creation" name="date_creation">
                    </div>
                    <div class="mb-3">
                        <label for="a_la_une" class="form-label">À la une</label>
                        <select class="form-control" id="a_la_une" name="a_la_une">
                            <option value="1">Oui</option>
                            <option value="0">Non</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image (URL)</label>
                        <input type="text" class="form-control" id="image" name="image">
                    </div>
                    <!-- Affichage de l'image si elle est présente -->
                    @if (!empty($article->image))
                        <img src="{{ $article->image }}" alt="Image">
                    @endif
                    <!-- Boutons de soumission et de retour -->
                    <br>
                    <button type="submit" class="btn btn-primary">Ajouter un article</button>
                    <br>
                    <a href="/article" class="btn btn-danger">Retourner</a>
                </form>
            </div>
        </div>
    </div>

    <!-- Chargement de Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
