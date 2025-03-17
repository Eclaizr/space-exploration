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
        Schema::create('missionspatiale', function (Blueprint $table) {
            $table->integer('idMission', true);
            $table->string('nomMission', 50);
            $table->date('dateDepart')->nullable();
            $table->date('dateRetour')->nullable();
            $table->string('objectif');
            $table->boolean('estHabitee');
            $table->enum('statut', ['Réussite', 'Échec', 'En cours', 'En prévision']);
            $table->integer('idVaisseau')->index('idvaisseau');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('missionspatiale');
    }
};
