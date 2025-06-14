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
        Schema::create('acte_divorces', function (Blueprint $table) {
            $table->id();
            $table->string('numero_registre', 5)->unique();

            $table->string('nom_ex_conjoint');
            $table->date('date_naissance_ex_conjoint');
            $table->string('lieu_naissance_ex_conjoint');
            $table->string('domicile_ex_conjoint');

            $table->string('nom_ex_conjointe');
            $table->date('date_naissance_ex_conjointe');
            $table->string('lieu_naissance_ex_conjointe');
            $table->string('domicile_ex_conjointe');

            $table->date('date_de_jugement');
            // $table->string('lieu_de_jugement');
            $table->date('date_de_delivrance_divorce');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acte_divorces');
    }
};
