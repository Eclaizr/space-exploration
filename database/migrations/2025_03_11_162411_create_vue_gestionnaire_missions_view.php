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
        DB::statement("CREATE VIEW `vue_gestionnaire_missions` AS select `exploration_spatiale`.`missionspatiale`.`idMission` AS `idMission`,`exploration_spatiale`.`missionspatiale`.`nomMission` AS `nomMission`,`exploration_spatiale`.`missionspatiale`.`dateDepart` AS `dateDepart`,`exploration_spatiale`.`missionspatiale`.`dateRetour` AS `dateRetour`,`exploration_spatiale`.`missionspatiale`.`statut` AS `statut`,`exploration_spatiale`.`missionspatiale`.`objectif` AS `objectif`,`exploration_spatiale`.`missionspatiale`.`estHabitee` AS `estHabitee` from `exploration_spatiale`.`missionspatiale` where `exploration_spatiale`.`missionspatiale`.`statut` = 'en cours' or `exploration_spatiale`.`missionspatiale`.`statut` = 'en prévision'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `vue_gestionnaire_missions`");
    }
};
