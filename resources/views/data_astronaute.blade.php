<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astronaute - {{ $user->nom }}</title>

    <!-- Importation de jQuery et DataTables -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

@include('affichage_astro')

<label for="filter">Filtrer par :</label>
<select id="filter">
    <option value="all">Tous</option>
    <option value="past">Archivée</option>
    <option value="future">Attribuées</option>
</select>

<table id="Missions" class="display">
    <thead>
    <tr>
        <th>ID Mission</th>
        <th>Nom Mission</th>
        <th>Date de Départ</th>
        <th>Date de Retour</th>
        <th>Objectif</th>
        <th>Habitée</th>
        <th>Statut</th>
        <th>ID Vaisseau</th>
    </tr>
    </thead>
</table>

<script>
    $(document).ready(function () {
        var table = $('#Missions').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('Missions.data') }}",
                data: function (d) {
                    d.filter = $('#filter').val(); // Envoi du filtre sélectionné
                }
            },
            columns: [
                { data: 'idMission', name: 'idMission' }, // 1. ID Mission
                { data: 'nomMission', name: 'nomMission' }, // 2. Nom Mission
                { data: 'dateDepart', name: 'dateDepart' }, // 3. Date Départ
                { data: 'dateRetour', name: 'dateRetour' }, // 4. Date Retour
                { data: 'objectif', name: 'objectif' }, // 5. Objectif
                { data: 'estHabitee', name: 'estHabitee' }, // 6. Habitée
                { data: 'statut', name: 'statut' }, // 7. Statut
                { data: 'idVaisseau', name: 'idVaisseau' } // 8. ID Vaisseau
            ]
        });

        // Mettre à jour le tableau lorsqu'on change le filtre
        $('#filter').change(function () {
            table.ajax.reload();
        });
    });
</script>

</body>
</html>
