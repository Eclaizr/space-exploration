<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Chercheur</title>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>
<body>
<div class="container">
    <h1>Tableau de Bord Chercheur</h1>

    <!-- 1) Missions Non Habitées -->
    <h2>Missions Non Habitées</h2>
    <table id="missionsNonHabiteesTable" class="display">
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
        <tbody>
        @foreach($missionsNonHabitees as $mnh)
            <tr>
                <td>{{ $mnh->nomObjet }}</td>
                <td>{{ $mnh->distanceTerre }}</td>
                <td>{{ $mnh->revolution }}</td>
                <td>{{ $mnh->anneeDecouverte }}</td>
                <td>{{ $mnh->nomAgence }}</td>
                <td>{{ $mnh->nombreMissions }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- 2) Missions Habitées -->
    <h2>Missions Habitées</h2>
    <table id="missionsHabiteesTable" class="display">
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
        <tbody>
        @foreach($missionsHabitees as $mh)
            <tr>
                <td>{{ $mh->nomObjet }}</td>
                <td>{{ $mh->distanceTerre }}</td>
                <td>{{ $mh->revolution }}</td>
                <td>{{ $mh->anneeDecouverte }}</td>
                <td>{{ $mh->nomAgence }}</td>
                <td>{{ $mh->nombreMissions }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- 3) Planètes Habitables -->
    <h2>Planètes Habitables</h2>
    <table id="planetesTable" class="display">
        <thead>
        <tr>
            <th>Nom de la Planète</th>
            <th>Distance de la Terre (UA)</th>
            <th>Indice d'Habitabilité</th>
            <th>Nombre de Missions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($planetesHabitables as $ph)
            <tr>
                <td>{{ $ph->nomObjet }}</td>
                <td>{{ $ph->distanceTerre }}</td>
                <td>{{ $ph->habitabilite }}</td>
                <td>{{ $ph->nombreMissions }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- 4) Expériences Scientifiques -->
    <h2>Expériences Scientifiques</h2>
    <table id="experiencesTable" class="display">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nom de l'Expérience</th>
            <th>Type</th>
            <th>Résultats</th>
            <th>Mission</th>
            <th>Agence</th>
        </tr>
        </thead>
        <tbody>
        @foreach($experiences as $exp)
            <tr>
                <td>{{ $exp->idExperience }}</td>
                <td>{{ $exp->nomExperience }}</td>
                <td>{{ $exp->typeExperience }}</td>
                <td>{{ $exp->resultats }}</td>
                <td>{{ $exp->nomMission }}</td>
                <td>{{ $exp->nomAgence }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- 5) Objets Découverts -->
    <h2>Objets Découverts</h2>
    <table id="objetsDecouvertsTable" class="display">
        <thead>
        <tr>
            <th>Nom de l'Objet</th>
            <th>Distance (UA)</th>
            <th>Révolution</th>
            <th>Année</th>
            <th>Agence Découvreuse</th>
        </tr>
        </thead>
        <tbody>
        @foreach($objetsDecouverts as $obj)
            <tr>
                <td>{{ $obj->nomObjet }}</td>
                <td>{{ $obj->distanceTerre }}</td>
                <td>{{ $obj->revolution }}</td>
                <td>{{ $obj->anneeDecouverte }}</td>
                <td>{{ $obj->agenceDecouvreuse }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<!-- jQuery & DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function(){
        // On applique DataTables en mode "client" sur chacun des tableaux
        $('#missionsNonHabiteesTable').DataTable({
            pageLength: 5,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/French.json"
            }
        });
        $('#missionsHabiteesTable').DataTable({
            pageLength: 5,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/French.json"
            }
        });
        $('#planetesTable').DataTable({
            pageLength: 5,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/French.json"
            }
        });
        $('#experiencesTable').DataTable({
            pageLength: 5,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/French.json"
            }
        });
        $('#objetsDecouvertsTable').DataTable({
            pageLength: 5,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/French.json"
            }
        });
    });
</script>
</body>
</html>