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
        Schema::create('planete', function (Blueprint $table) {
            $table->string('nomObjet', 50)->primary();
            $table->string('typePlanete', 50);
            $table->string('environnement', 50)->nullable();
            $table->decimal('habitabilite', 2, 1)->nullable();
            $table->boolean('atmospherePlanete');
            $table->float('temperatureSurface')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planete');
    }
};
