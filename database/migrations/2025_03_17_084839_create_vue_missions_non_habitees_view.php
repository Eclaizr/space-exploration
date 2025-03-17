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
        DB::statement("CREATE VIEW `vue_missions_non_habitees` AS select `oc`.`nomObjet` AS `nomObjet`,`oc`.`distanceTerre` AS `distanceTerre`,`oc`.`anneeDecouverte` AS `anneeDecouverte`,`oc`.`revolution` AS `revolution`,`a`.`nomAgence` AS `nomAgence`,count(`m`.`idMission`) AS `nombreMissions` from ((((`space_exploration`.`objetceleste` `oc` join `space_exploration`.`vise` `mo` on(`oc`.`nomObjet` = `mo`.`nomObjet`)) join `space_exploration`.`missionspatiale` `m` on(`mo`.`idMission` = `m`.`idMission`)) join `space_exploration`.`vaisseauspatial` `v` on(`m`.`idVaisseau` = `v`.`idVaisseau`)) join `space_exploration`.`agencespatiale` `a` on(`v`.`fabricant` = `a`.`nomAgence`)) where `m`.`estHabitee` = 0 group by `oc`.`nomObjet`,`oc`.`distanceTerre`,`oc`.`anneeDecouverte`,`oc`.`revolution`,`a`.`nomAgence` having count(`m`.`idMission`) > 0 order by count(`m`.`idMission`) desc");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `vue_missions_non_habitees`");
    }
};
