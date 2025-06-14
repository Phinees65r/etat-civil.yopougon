<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActeDeces extends Model
{
    use HasFactory;

    protected $casts = [
        'date_deces' => 'datetime',
        'date_de_delivrance_deces' => 'datetime',
        'date_de_naissance_du_defunt' => 'datetime',
    ];

    protected $fillable = [
        'numero_registre',
        'nom_defunt',
        'date_deces',
        'heure_deces',
        'lieu_deces',
        // 'cause_deces',
        'date_de_naissance_du_defunt',
        'lieu_de_naissance_du_defunt',
        'sexe_defunt',
        'nom_dernier_conjoint',
        'prenom_dernier_conjoint',
        'nom_pere_defunt',
        'nom_mere_defunt',
        // 'declarant_nom',
        // 'declarant_profession',
        'defunt_domicile',
        'date_de_delivrance_deces',
    ];

    protected $dates = ['date_deces'];
}