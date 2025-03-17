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
        Schema::create('mission_attribution', function (Blueprint $table) {
            $table->integer('idMission');
            $table->integer('idAstro')->index('idastro');
            $table->string('role', 50);
            $table->date('dateParticipation');

            $table->primary(['idMission', 'idAstro']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mission_attribution');
    }
};
