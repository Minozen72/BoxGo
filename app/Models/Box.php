<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'rented',
        'locataire_id', // Colonne qui stocke l'ID du locataire
    ];

    // Relation : une Box appartient à un Locataire
    public function locataire()
    {
        return $this->belongsTo(Locataire::class);
    }
}
