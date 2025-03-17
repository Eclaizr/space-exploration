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
        Schema::table('asteroide', function (Blueprint $table) {
            $table->foreign(['nomObjet'], 'asteroide_ibfk_1')->references(['nomObjet'])->on('objetceleste')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('asteroide', function (Blueprint $table) {
            $table->dropForeign('asteroide_ibfk_1');
        });
    }
};
