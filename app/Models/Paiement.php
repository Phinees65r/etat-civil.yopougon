<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'reference_paiement',
        'montant',
        'moyen_paiement',
        'citoyen_id',
        // 'utilise'
    ];

    public function citoyen()
    {
        return $this->belongsTo(Citoyen::class);
    }
}