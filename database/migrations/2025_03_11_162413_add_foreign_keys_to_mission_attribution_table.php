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
        Schema::table('mission_attribution', function (Blueprint $table) {
            $table->foreign(['idMission'], 'mission_attribution_ibfk_1')->references(['idMission'])->on('missionspatiale')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['idAstro'], 'mission_attribution_ibfk_2')->references(['idAstro'])->on('astronaute')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mission_attribution', function (Blueprint $table) {
            $table->dropForeign('mission_attribution_ibfk_1');
            $table->dropForeign('mission_attribution_ibfk_2');
        });
    }
};
