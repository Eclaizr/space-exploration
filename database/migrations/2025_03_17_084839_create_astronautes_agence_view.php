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
        DB::statement("CREATE VIEW `astronautes_agence` AS select `a`.`nomAstro` AS `nom_astronaute`,`a`.`prenomAstro` AS `prenom_astronaute`,`a`.`nationalite` AS `nationalite`,`a`.`nombreMissions` AS `nombreMissions`,`a`.`Poste` AS `Poste`,`ag`.`nomAgence` AS `agence` from ((`space_exploration`.`astronaute` `a` join `space_exploration`.`affectation` `af` on(`a`.`idAstro` = `af`.`idAstro`)) join `space_exploration`.`agencespatiale` `ag` on(`af`.`nomAgence` = `ag`.`nomAgence`))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `astronautes_agence`");
    }
};
