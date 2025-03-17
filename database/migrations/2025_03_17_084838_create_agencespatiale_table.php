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
        Schema::create('agencespatiale', function (Blueprint $table) {
            $table->string('nomAgence', 50)->primary();
            $table->string('pays', 50);
            $table->date('dateCreation');
            $table->decimal('budgetAnnuel', 15);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agencespatiale');
    }
};
