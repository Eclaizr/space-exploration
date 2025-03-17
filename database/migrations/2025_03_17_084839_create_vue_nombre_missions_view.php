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
        DB::statement("CREATE VIEW `vue_nombre_missions` AS select `a`.`nomAstro` AS `nomAstro`,`a`.`prenomAstro` AS `prenomAstro`,`a`.`nationalite` AS `nationalite`,count(`ma`.`idMission`) AS `nombreMissions`,`a`.`Poste` AS `Poste`,`ag`.`nomAgence` AS `agence` from (((`space_exploration`.`astronaute` `a` left join `space_exploration`.`mission_attribution` `ma` on(`a`.`idAstro` = `ma`.`idAstro`)) join `space_exploration`.`affectation` `af` on(`a`.`idAstro` = `af`.`idAstro`)) join `space_exploration`.`agencespatiale` `ag` on(`af`.`nomAgence` = `ag`.`nomAgence`)) group by `a`.`idAstro`,`a`.`nomAstro`,`a`.`prenomAstro`,`a`.`nationalite`,`a`.`Poste`,`ag`.`nomAgence`");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `vue_nombre_missions`");
    }
};
