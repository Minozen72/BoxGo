<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address', 'price', 'owner_id'

    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
