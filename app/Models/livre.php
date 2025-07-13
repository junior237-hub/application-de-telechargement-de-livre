<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class livre extends Model
{
    use HasFactory;
    // protected $guad = []; 
    protected $fillable = [
        'titre', // Ajout de la propriété 'titre'
        'auteur',
        'desc',
        'image',
        'fichier',
        'domaine',
    ];
}
