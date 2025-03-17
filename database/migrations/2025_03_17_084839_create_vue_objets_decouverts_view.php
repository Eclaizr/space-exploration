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
        DB::statement("CREATE VIEW `vue_objets_decouverts` AS select `o`.`nomObjet` AS `nomObjet`,`o`.`distanceTerre` AS `distanceTerre`,`o`.`anneeDecouverte` AS `anneeDecouverte`,`o`.`revolution` AS `revolution`,`o`.`agenceDecouvreuse` AS `agenceDecouvreuse` from `space_exploration`.`objetceleste` `o` where `o`.`agenceDecouvreuse` is not null");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `vue_objets_decouverts`");
    }
};
