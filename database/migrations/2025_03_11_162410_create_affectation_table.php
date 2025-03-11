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
        Schema::create('affectation', function (Blueprint $table) {
            $table->string('nomAgence', 50);
            $table->integer('idAstro')->index('idastro');
            $table->date('dateDebut');
            $table->date('dateFin')->nullable();

            $table->primary(['nomAgence', 'idAstro', 'dateDebut']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affectation');
    }
};
