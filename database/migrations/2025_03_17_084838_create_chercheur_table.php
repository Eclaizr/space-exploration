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
        Schema::create('chercheur', function (Blueprint $table) {
            $table->integer('idChercheur', true);
            $table->string('nationalite', 50);
            $table->string('nomChercheur', 50);
            $table->string('prenomChercheur', 50);
            $table->date('dateNaissanceChercheur');
            $table->enum('statut', ['Actif', 'Retraité', 'Décédé'])->default('Actif');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chercheur');
    }
};
