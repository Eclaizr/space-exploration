<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Données de Recherche</title>

    <!-- Bootstrap & DataTables CSS -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- jQuery (nécessaire pour AJAX et DataTables) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables (JS et CSS) -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

</head>
<body>
@include("affichage_chercheur")
<div class="container mt-5">
    <h1 class="text-center mb-4">Tableau de Bord - Données Scientifiques</h1>

    <!-- Missions Non Habitées -->
    <h3 class="mt-4">Missions Non Habitées</h3>
    <table id="missionsNonHabiteesTable" class="table table-striped">
        <thead>
        <tr>
            <th>Nom de l'Objet</th>
            <th>Distance de la Terre (UA)</th>
            <th>Révolution (jours)</th>
            <th>Année de Découverte</th>
            <th>Agence Spatiale</th>
            <th>Nombre de Missions</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>

    <!-- Missions Habitées -->
    <h3 class="mt-4">Missions Habitées</h3>
    <table id="missionsHabiteesTable" class="table table-striped">
        <thead>
        <tr>
            <th>Nom de l'Objet</th>
            <th>Distance de la Terre (UA)</th>
            <th>Révolution (jours)</th>
            <th>Année de Découverte</th>
            <th>Agence Spatiale</th>
            <th>Nombre de Missions</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>

    <!-- Planètes Habitables -->
    <h3 class="mt-4">Planètes Habitables</h3>
    <table id="planetesTable" class="table table-striped">
        <thead>
        <tr>
            <th>Nom de la Planète</th>
            <th>Distance de la Terre (UA)</th>
            <th>Indice d'Habitabilité</th>
            <th>Nombre de Missions</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>

    <!-- Expériences Scientifiques -->
    <h3 class="mt-4">Expériences Scientifiques</h3>
    <table id="experiencesTable" class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nom de l'Expérience</th>
            <th>Type</th>
            <th>Résultats</th>
            <th>Mission</th>
            <th>Agence Spatiale</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

<!-- jQuery et DataTables -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        // === Tableau Missions Non Habitées ===
        $('#missionsNonHabiteesTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('missions.non_habitees.data') }}",
            columns: [
                { data: 'nomObjet', name: 'nomObjet' },
                { data: 'distanceTerre', name: 'distanceTerre' },
                { data: 'revolution', name: 'revolution' },
                { data: 'anneeDecouverte', name: 'anneeDecouverte' },
                { data: 'nomAgence', name: 'nomAgence' },
                { data: 'nombreMissions', name: 'nombreMissions' }
            ],
            order: [[5, 'desc']],      // Tri par défaut sur la colonne "nombreMissions"
            pageLength: 5,            // 5 lignes par page
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/French.json"
            }
        });

        // === Tableau Missions Habitées ===
        $('#missionsHabiteesTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('missions.habitees.data') }}",
            columns: [
                { data: 'nomObjet', name: 'nomObjet' },
                { data: 'distanceTerre', name: 'distanceTerre' },
                { data: 'revolution', name: 'revolution' },
                { data: 'anneeDecouverte', name: 'anneeDecouverte' },
                { data: 'nomAgence', name: 'nomAgence' },
                { data: 'nombreMissions', name: 'nombreMissions' }
            ],
            order: [[5, 'desc']],
            pageLength: 5,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/French.json"
            }
        });

        // === Tableau Planètes Habitables ===
        $('#planetesTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('planetes.habitables.data') }}",
            columns: [
                { data: 'nomObjet', name: 'nomObjet' },
                { data: 'distanceTerre', name: 'distanceTerre' },
                { data: 'habitabilite', name: 'habitabilite' },
                { data: 'nombreMissions', name: 'nombreMissions' }
            ],
            order: [[2, 'desc']],     // Tri par défaut sur "habitabilite"
            pageLength: 5,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/French.json"
            }
        });

        // === Tableau Expériences Scientifiques ===
        $('#experiencesTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('experiences.data') }}",
            columns: [
                { data: 'idExperience', name: 'idExperience' },
                { data: 'nomExperience', name: 'nomExperience' },
                { data: 'typeExperience', name: 'typeExperience' },
                { data: 'resultats', name: 'resultats' },
                { data: 'nomMission', name: 'nomMission' },
                { data: 'nomAgence', name: 'nomAgence' }
            ],
            order: [[1, 'asc']],      // Tri par défaut sur "nomExperience"
            pageLength: 5,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/French.json"
            }
        });
    });
</script>
</body>
</html>
