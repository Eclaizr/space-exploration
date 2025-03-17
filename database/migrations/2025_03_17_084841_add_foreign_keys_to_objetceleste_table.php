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
        Schema::table('objetceleste', function (Blueprint $table) {
            $table->foreign(['agenceDecouvreuse'], 'objetceleste_ibfk_1')->references(['nomAgence'])->on('agencespatiale')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('objetceleste', function (Blueprint $table) {
            $table->dropForeign('objetceleste_ibfk_1');
        });
    }
};
