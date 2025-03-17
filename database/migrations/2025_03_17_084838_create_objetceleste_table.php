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
        Schema::create('objetceleste', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nomObjet', 50)->unique('unique_nomobjet');
            $table->decimal('distanceTerre', 15);
            $table->decimal('revolution', 10);
            $table->string('agenceDecouvreuse', 30)->index('agencedecouvreuse');
            $table->integer('anneeDecouverte');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('objetceleste');
    }
};
