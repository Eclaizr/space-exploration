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
        Schema::create('astronaute', function (Blueprint $table) {
            $table->integer('idAstro', true);
            $table->string('nomAstro', 50);
            $table->string('prenomAstro', 50);
            $table->date('dateNaissanceAstro');
            $table->string('nationalite', 50);
            $table->integer('nombreMissions');
            $table->string('Poste', 50);
            $table->enum('statut', ['Retraité', 'Actif', 'Junior']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('astronaute');
    }
};
