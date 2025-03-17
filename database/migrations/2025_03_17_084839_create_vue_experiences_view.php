<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("CREATE VIEW `vue_experiences` AS select `e`.`nomExperience` AS `nomExperience`,`e`.`typeExperience` AS `typeExperience`,`e`.`resultats` AS `resultats` from `space_exploration`.`experiencescientifique` `e`");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `vue_experiences`");
    }
};
