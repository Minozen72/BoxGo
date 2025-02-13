<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_recu', 'periode_debut', 'periode_fin', 'signature', 'date_creation', 'ville_creation', 'box_id'
    ];

    public function box()
    {
        return $this->belongsTo(Box::class);
    }
}