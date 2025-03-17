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
        Schema::table('experimente', function (Blueprint $table) {
            $table->foreign(['idMission'], 'experimente_ibfk_1')->references(['idMission'])->on('missionspatiale')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['idExperience'], 'experimente_ibfk_2')->references(['idExperience'])->on('experiencescientifique')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('experimente', function (Blueprint $table) {
            $table->dropForeign('experimente_ibfk_1');
            $table->dropForeign('experimente_ibfk_2');
        });
    }
};
