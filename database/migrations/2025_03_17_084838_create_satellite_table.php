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
        Schema::create('satellite', function (Blueprint $table) {
            $table->string('nomObjet', 50)->primary();
            $table->boolean('atmosphere');
            $table->string('nomObjetPlanete', 50)->index('nomobjetplanete');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('satellite');
    }
};
