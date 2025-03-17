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
        DB::statement("CREATE VIEW `vue_gestionnaire_missions` AS select `space_exploration`.`missionspatiale`.`idMission` AS `idMission`,`space_exploration`.`missionspatiale`.`nomMission` AS `nomMission`,`space_exploration`.`missionspatiale`.`dateDepart` AS `dateDepart`,`space_exploration`.`missionspatiale`.`dateRetour` AS `dateRetour`,`space_exploration`.`missionspatiale`.`statut` AS `statut`,`space_exploration`.`missionspatiale`.`objectif` AS `objectif`,`space_exploration`.`missionspatiale`.`estHabitee` AS `estHabitee` from `space_exploration`.`missionspatiale` where `space_exploration`.`missionspatiale`.`statut` = 'en cours' or `space_exploration`.`missionspatiale`.`statut` = 'en prévision'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `vue_gestionnaire_missions`");
    }
};
