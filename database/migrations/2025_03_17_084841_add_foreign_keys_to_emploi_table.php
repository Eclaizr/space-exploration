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
        Schema::table('emploi', function (Blueprint $table) {
            $table->foreign(['nomAgence'], 'emploi_ibfk_1')->references(['nomAgence'])->on('agencespatiale')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['idChercheur'], 'emploi_ibfk_2')->references(['idChercheur'])->on('chercheur')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('emploi', function (Blueprint $table) {
            $table->dropForeign('emploi_ibfk_1');
            $table->dropForeign('emploi_ibfk_2');
        });
    }
};
