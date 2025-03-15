<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Missions des Astronautes</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>
<body>

<h1>Liste des Missions des Astronautes</h1>

@include('affichage_astro')

<!-- Filtre pour sélectionner le type de mission -->
<label for="filter">Filtrer les missions :</label>
<select id="filter">
    <option value="all">Toutes</option>
    <option value="past">Passées</option>
    <option value="future">Futures</option>
</select>

<!-- Tableau DataTables -->
<table id="missionsTable" class="display">
    <thead>
    <tr>
        <th>ID Astro</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Nom de la Mission</th>
        <th>Date de Départ</th>
        <th>Date de Retour</th>
        <th>Statut</th>
    </tr>
    </thead>
</table>

<script>
    $(document).ready(function() {
        let table = $('#missionsTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('data') }}",
                type: "GET",
                data: function(d) {
                    d.filter = $('#filter').val(); // Ajout du filtre
                }
            },
            columns: [
                { data: 'idAstro' },
                { data: 'nomAstro' },
                { data: 'prenomAstro' },
                { data: 'nomMission' },
                { data: 'dateDepart' },
                { data: 'dateRetour' },
                { data: 'statut' }
            ]
        });

        // Rafraîchir la table quand le filtre change
        $('#filter').change(function() {
            table.ajax.reload();
        });
    });
</script>

</body>
</html>
