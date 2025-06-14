<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActeNaissance extends Model
{
    use HasFactory;

    protected $casts = [
        'date_naissance' => 'datetime',
        'date_declaration_naissance' => 'datetime',
    ];

    protected $fillable = [
        'numero_registre',
        'nom_enfant',
        'prenom_enfant',
        'sexe_enfant',
        'date_naissance',
        'lieu_naissance',
        'heure_de_naissance',
        'nom_et_prenom_pere',
        // 'pere_profession',
        // 'pere_domicile',
        'nom_et_prenom_mere',
        // 'mere_profession',
        // 'mere_domicile',
        'date_declaration_naissance'
    ];
}