<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locataire extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email'];

    // Relation : un Locataire peut avoir plusieurs Boxes
    public function boxes()
    {
        return $this->hasMany(Box::class);
    }
}
