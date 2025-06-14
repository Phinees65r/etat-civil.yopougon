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
        Schema::create('acte_mariages', function (Blueprint $table) {
            $table->id();
            $table->string('numero_registre', 5)->unique();

            // Informations sur l'époux
            $table->string('nom_epoux');
            $table->string('epoux_profession');
            $table->string('domicile_epoux');
            $table->date('date_naissance_epoux');
            $table->string('lieu_naissance_epoux');
            

            // Informations sur l'épouse
            $table->string('nom_epouse');
            $table->string('epouse_profession');
            $table->string('domicile_epouse');
            $table->date('date_naissance_epouse');
            $table->string('lieu_naissance_epouse');
            // $table->string('nom_pere_epouse');
            // $table->string('nom_mere_epouse');

            // Informations sur le mariage
            $table->date('date_mariage');
            $table->time('heure_mariage')->nullable();
            $table->string('lieu_mariage');
            $table->string('type_regime');

            // Témoins
            // $table->string('temoin_epoux_nom');
            // $table->string('temoin_epoux_profession');
            // $table->string('temoin_epoux_domicile');

            // $table->string('temoin_epouse_nom');
            // $table->string('temoin_epouse_profession');
            // $table->string('temoin_epouse_domicile');

            $table->string('date_declaration_mariage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acte_mariages');
    }
};
