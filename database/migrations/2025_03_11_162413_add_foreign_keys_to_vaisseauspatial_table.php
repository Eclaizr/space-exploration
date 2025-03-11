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
        Schema::table('vaisseauspatial', function (Blueprint $table) {
            $table->foreign(['idLancement'], 'vaisseauspatial_ibfk_1')->references(['idLancement'])->on('sitelancement')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vaisseauspatial', function (Blueprint $table) {
            $table->dropForeign('vaisseauspatial_ibfk_1');
        });
    }
};
