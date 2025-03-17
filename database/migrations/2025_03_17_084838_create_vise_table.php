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
        Schema::create('vise', function (Blueprint $table) {
            $table->integer('idMission');
            $table->string('nomObjet', 50)->index('nomobjet');

            $table->primary(['idMission', 'nomObjet']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vise');
    }
};
