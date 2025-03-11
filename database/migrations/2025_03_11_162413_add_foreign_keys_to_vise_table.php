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
        Schema::table('vise', function (Blueprint $table) {
            $table->foreign(['idMission'], 'vise_ibfk_1')->references(['idMission'])->on('missionspatiale')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['nomObjet'], 'vise_ibfk_2')->references(['nomObjet'])->on('objetceleste')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vise', function (Blueprint $table) {
            $table->dropForeign('vise_ibfk_1');
            $table->dropForeign('vise_ibfk_2');
        });
    }
};
