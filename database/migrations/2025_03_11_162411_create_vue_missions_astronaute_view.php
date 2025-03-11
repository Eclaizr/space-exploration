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
        DB::statement("CREATE VIEW `vue_missions_astronaute` AS select `a`.`idAstro` AS `idAstro`,`a`.`nomAstro` AS `nomAstro`,`a`.`prenomAstro` AS `prenomAstro`,`m`.`nomMission` AS `nomMission`,`m`.`dateDepart` AS `dateDepart`,`m`.`dateRetour` AS `dateRetour`,`m`.`statut` AS `statut` from ((`exploration_spatiale`.`mission_attribution` `ma` join `exploration_spatiale`.`astronaute` `a` on(`ma`.`idAstro` = `a`.`idAstro`)) join `exploration_spatiale`.`missionspatiale` `m` on(`ma`.`idMission` = `m`.`idMission`))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `vue_missions_astronaute`");
    }
};
