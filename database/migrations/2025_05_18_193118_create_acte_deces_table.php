<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('acte_deces', function (Blueprint $table) {
            $table->id();
            $table->string('numero_registre', 5)->unique();
            $table->string('nom_defunt');
            $table->date('date_deces');
            $table->time('heure_deces');
            $table->string('lieu_deces');
            // $table->string('cause_deces');
            $table->date('date_de_naissance_du_defunt');
            $table->string('lieu_de_naissance_du_defunt');
            $table->enum('sexe_defunt', ['masculin', 'féminin']);
            $table->string('nom_dernier_conjoint');
            $table->string('prenom_dernier_conjoint');
            $table->string('nom_pere_defunt');
            $table->string('nom_mere_defunt');
            // $table->string('declarant_nom');
            // $table->string('declarant_profession');
            $table->string('defunt_domicile');
            $table->date('date_de_delivrance_deces');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acte_deces');
    }
};
