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
        DB::statement("CREATE VIEW `vue_planetes_habitable` AS select `oc`.`nomObjet` AS `nomObjet`,`oc`.`distanceTerre` AS `distanceTerre`,`p`.`habitabilite` AS `habitabilite`,count(`v`.`idMission`) AS `nombreMissions` from ((`space_exploration`.`objetceleste` `oc` join `space_exploration`.`planete` `p` on(`oc`.`nomObjet` = `p`.`nomObjet`)) left join `space_exploration`.`vise` `v` on(`oc`.`nomObjet` = `v`.`nomObjet`)) where `p`.`habitabilite` >= 0.3 group by `oc`.`nomObjet`,`oc`.`distanceTerre`,`p`.`habitabilite` order by `p`.`habitabilite` desc,count(`v`.`idMission`) desc");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `vue_planetes_habitable`");
    }
};
