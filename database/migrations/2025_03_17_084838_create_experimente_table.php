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
        Schema::create('experimente', function (Blueprint $table) {
            $table->integer('idMission');
            $table->integer('idExperience')->index('idexperience');

            $table->primary(['idMission', 'idExperience']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experimente');
    }
};
