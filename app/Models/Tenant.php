<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'address', 'data_owner_id'
    ];

    public function dataOwner()
    {
        return $this->belongsTo(User::class, 'data_owner_id');
    }
}
