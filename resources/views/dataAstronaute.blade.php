<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Missions et des Astronautes</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('css/dataAstronaute.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>
<body>
<!-- MENU HEADER -->
<header class="menu-bar">
        <h1>Space Exploration</a></h1>
        <div class="burger-menu" onclick="toggleMenu()">☰</div>
        <nav class="nav-links">
            <form action="{{route('auth.logout')}}" method="POST">
                @method("delete")
                @csrf
                <button type="submit" class="nav-button active">Log out</button>
            </form>
        </nav>
</header>

@if (Auth::check())
    <p>Bienvenue, {{ Auth::user()->username }}!</p> <!-- Affiche le nom de l'utilisateur -->
    <p>Role : {{ Auth::user()->role }}</p> <!-- Affiche l'email de l'utilisateur -->
@else
    <p>Veuillez vous connecter</p>
    
@endif

<h1>Tableau de bord</h1>
<h2> Liste des astronautes </h2>
<br>

<div class="container">

    <div class="astronaute container-element">
    <table id="astronauteTable" class="display">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Nationalité</th>
            <th>Nombre de mission</th>
            <th>Poste</th>
            <th>Agence</th>
        </tr>
        </thead>
    </table>
    </div>
    <br>
    <h2> Liste des missions </h2>
    <br>
    <div class="missions container-element">
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
    </div>
</div>




<script>
    $(document).ready(function() {
        let tableAstronaute = $('#astronauteTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('liste') }}",
                type: "GET",
                data: function(d) {
                    d.filter = $('#filter').val(); // Ajout du filtre
                }
            },
            columns: [
                { data: 'nom_astronaute' },
                { data: 'prenom_astronaute' },
                { data: 'nationalite' },
                { data: 'nombreMissions' },
                { data: 'Poste' },
                { data: 'agence' }
            ]
        });
   
        
        let tableMissions = $('#missionsTable').DataTable({
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
                tableMissions.ajax.reload();
                tableAstronaute.ajax.reload();
            });
        });
</script>

</body>
</html>