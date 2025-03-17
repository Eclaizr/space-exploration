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
        Schema::table('satellite', function (Blueprint $table) {
            $table->foreign(['nomObjet'], 'satellite_ibfk_1')->references(['nomObjet'])->on('objetceleste')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['nomObjetPlanete'], 'satellite_ibfk_2')->references(['nomObjet'])->on('planete')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('satellite', function (Blueprint $table) {
            $table->dropForeign('satellite_ibfk_1');
            $table->dropForeign('satellite_ibfk_2');
        });
    }
};
