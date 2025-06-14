<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActeMariage extends Model
{
    use HasFactory;

    protected $casts = [
        'date_mariage' => 'datetime',
        'date_naissance_epoux' => 'datetime',
        'date_naissance_epouse' => 'datetime',
        'date_declaration_mariage' => 'datetime',
    ];

    protected $fillable = [
        'numero_registre',
        'nom_epoux',
        'epoux_profession',
        'domicile_epoux',
        'date_naissance_epoux',
        'lieu_naissance_epoux',
        // 'epoux_nationalite',
        // 'nom_pere_epoux',
        // 'pere_profession',
        // 'domicile_pere',
        // 'nom_mere_epoux',
        // 'mere_profession',
        // 'domicile_mere',
        'nom_epouse',
        'epouse_profession',
        'domicile_epouse',
        'date_naissance_epouse',
        'lieu_naissance_epouse',
        // 'nom_pere_epouse',
        // 'nom_mere_epouse',
        'date_mariage',
        'heure_mariage',
        'lieu_mariage',
        'type_regime',
        // 'temoin_epoux_nom',
        // 'temoin_epoux_profession',
        // 'temoin_epoux_domicile',
        // 'temoin_epouse_nom',
        // 'temoin_epouse_profession',
        // 'temoin_epouse_domicile',
        'date_declaration_mariage',
    ];
}