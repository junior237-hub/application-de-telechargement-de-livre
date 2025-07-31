<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_categorie', // Ajout de la propriété 'titre'
        
    ];

    public function livres()
    {
        return $this->belongsTo('app\Models\categories');
    }
}
