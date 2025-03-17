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
        Schema::table('affectation', function (Blueprint $table) {
            $table->foreign(['nomAgence'], 'affectation_ibfk_1')->references(['nomAgence'])->on('agencespatiale')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['idAstro'], 'affectation_ibfk_2')->references(['idAstro'])->on('astronaute')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('affectation', function (Blueprint $table) {
            $table->dropForeign('affectation_ibfk_1');
            $table->dropForeign('affectation_ibfk_2');
        });
    }
};
