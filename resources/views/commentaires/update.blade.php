<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifier Commentaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Modifier Commentaire</h1>
        <form action="/update/commentaire/{{ $commentaires->id }}" method="POST" class="form-group">
            @csrf
            @method("put")
            {{-- <input type="hidden" class="form-control" id="nom_complet_auteur" name="article_id" value="{{ $commentaires->article_id }}" required> --}}

            <div class="mb-3">
                <label for="nom_complet_auteur" class="form-label">Nom Complet de l'Auteur</label>
                <input type="text" class="form-control" id="nom_complet_auteur" name="nom_complet_auteur" value="{{ $commentaires->nom_complet_auteur }}" required>
            </div>
            <div class="mb-3">
                <label for="contenu" class="form-label">Contenu</label>
                {{-- <input type="text"  name="contenu"  value="{{ $commentaires->contenu }}"> --}}
                <textarea type="text" name="contenu" rows="6" required>{{ $commentaires->contenu }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>class="form-control" id="contenu"
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
