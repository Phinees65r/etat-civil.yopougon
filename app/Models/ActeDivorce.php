<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActeDivorce extends Model
{
    use HasFactory;

    protected $casts = [
        'date_de_jugement' => 'datetime',
        'date_de_delivrance_divorce' => 'datetime',
        'date_naissance_ex_conjoint' => 'datetime',
        'date_naissance_ex_conjointe' => 'datetime',
    ];


    protected $fillable = [
        'numero_registre',
        'nom_ex_conjoint',
        'date_naissance_ex_conjoint',
        'lieu_naissance_ex_conjoint',
        'domicile_ex_conjoint',
        'nom_ex_conjointe',
        'date_naissance_ex_conjointe',
        'lieu_naissance_ex_conjointe',
        'domicile_ex_conjointe',
        'date_de_jugement',
        // 'lieu_de_jugement',
        'date_de_delivrance_divorce'
    ];

    protected $dates = ['date_divorce'];
}