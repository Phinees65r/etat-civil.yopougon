<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citoyen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'telephone',
        'sexe',
        'pays',
        'ville',
        'type_acte'
    ];

    public function paiement()
    {
        return $this->hasOne(Paiement::class);
    }
}