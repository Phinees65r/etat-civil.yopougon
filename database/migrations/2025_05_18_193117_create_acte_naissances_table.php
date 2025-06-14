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
        Schema::create('acte_naissances', function (Blueprint $table) {
            $table->id();
            $table->string('numero_registre', 5)->unique();
            $table->string('nom_enfant');
            $table->string('prenom_enfant');
            $table->enum('sexe_enfant', ['masculin', 'féminin']);
            $table->date('date_naissance');
            $table->string('lieu_naissance');
            $table->time('heure_de_naissance');
            $table->string('nom_et_prenom_pere');
            // $table->string('pere_profession');
            // $table->string('pere_domicile');
            $table->string('nom_et_prenom_mere');
            // $table->string('mere_profession');
            // $table->string('mere_domicile');
            $table->date('date_declaration_naissance');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acte_naissances');
    }
};
