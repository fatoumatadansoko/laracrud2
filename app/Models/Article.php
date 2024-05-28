<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'date_creation',
        'a_la_une',
        'image',
    ];

    protected $casts = [
        'a_la_une' => 'boolean', // Convertit automatiquement la valeur en booléen
    ];

    protected $dates = [
        'date_creation', // Convertit automatiquement la valeur en objet Carbon (pour la gestion des dates)
    ];
}
