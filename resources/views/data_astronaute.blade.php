<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Astronaute</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
</head>
<body>

@include("affichage_astro")

<div class="container">
    <h2>Liste des Missions</h2>
    <label for="filter">Filtrer par:</label>
    <select id="filter">
        <option value="">Toutes</option>
        <option value="past">Passées</option>
        <option value="future">Futures</option>
    </select>
    <table id="missions-table" class="display">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Date de Départ</th>
            <th>Date de Retour</th>
            <th>Objectif</th>
            <th>Habitée</th>
            <th>Statut</th>
            <th>ID Vaisseau</th>
        </tr>
        </thead>
    </table>
</div>

<script>
    $(document).ready(function() {
        var table = $('#missions-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('getMissions') }}',
                data: function (d) {
                    d.filter = $('#filter').val();
                }
            },
            columns: [
                { data: 'idMission' },
                { data: 'nomMission' },
                { data: 'dateDepart' },
                { data: 'dateRetour' },
                { data: 'objectif' },
                { data: 'estHabitee' },
                { data: 'statut' },
                { data: 'idVaisseau' }
            ]
        });

        $('#filter').change(function() {
            table.ajax.reload();
        });
    });
</script>
</body>
</html>
