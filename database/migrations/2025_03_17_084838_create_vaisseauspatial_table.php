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
        Schema::create('vaisseauspatial', function (Blueprint $table) {
            $table->integer('idVaisseau', true);
            $table->string('nomVaisseau', 50);
            $table->date('premierVol');
            $table->date('dernierVol')->nullable();
            $table->string('etat', 50);
            $table->string('technologie', 50);
            $table->string('fabricant', 50);
            $table->integer('idLancement')->index('idlancement');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vaisseauspatial');
    }
};
