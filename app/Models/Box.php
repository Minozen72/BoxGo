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
        'prix',
        'date_debut',
        'date_fin',
        'adresse',
        'locataire_id',
        'proprietaire_id'
    ];

    // Relation : une Box appartient à un Locataire
    public function locataire()
    {
        return $this->belongsTo(Locataire::class,'locataire_id');
    }

    // Relation : une Box appartient à un Propriétaire
    public function proprietaire()
    {
        return $this->belongsTo(User::class, 'proprietaire_id');
    }

    public function factures()
    {
        return $this->hasMany(Facture::class);
    }
}
