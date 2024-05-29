<!-- resources/views/commentaires/modifier_commentaire.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier le Commentaire</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('commentaires.update', $commentaire->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="contenu" class="form-label">Contenu</label>
            <textarea class="form-control" id="contenu" name="contenu">{{ $commentaire->contenu }}</textarea>
        </div>
        <div class="mb-3">
            <label for="nom_complet_auteur" class="form-label">Nom Complet de l'Auteur</label>
            <input type="text" class="form-control" id="nom_complet_auteur" name="nom_complet_auteur" value="{{ $commentaire->nom_complet_auteur }}">
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
