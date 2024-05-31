<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    /**
     * Les attributs de l'article qui peuvent être mass-assignés.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'description',
        'date_creation',
        'a_la_une',
        'image',
    ];

    /**
     * Relation entre l'article et les commentaires.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class,'article_id');
    }

    /**
     * Définit la manière dont certains attributs sont convertis lorsqu'ils sont récupérés de la base de données.
     *
     * @var array
     */
    protected $casts = [
        'a_la_une' => 'boolean', // Convertit automatiquement la valeur en booléen
    ];

    /**
     * Attributs qui doivent être traités comme des objets Carbon (pour la gestion des dates).
     *
     * @var array
     */
    protected $dates = [
        'date_creation', // Convertit automatiquement la valeur en objet Carbon
    ];
}
