<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $fillable = [
        'paiemant_montant', 'paymant_date', 'period_number', 'contract_id', 'created_at'
    ];

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}
