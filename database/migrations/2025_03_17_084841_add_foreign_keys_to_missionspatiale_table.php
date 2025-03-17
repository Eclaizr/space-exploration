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
        Schema::table('missionspatiale', function (Blueprint $table) {
            $table->foreign(['idVaisseau'], 'missionspatiale_ibfk_1')->references(['idVaisseau'])->on('vaisseauspatial')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('missionspatiale', function (Blueprint $table) {
            $table->dropForeign('missionspatiale_ibfk_1');
        });
    }
};
