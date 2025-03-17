<!-- Fichier: index.html -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Missions et des Astronautes</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('css/dataAstronaute.css') }}">
    <link rel="stylesheet" href="{{ asset('css/graph.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        function toggleMenu() {
            document.getElementById("mobile-menu").classList.toggle("show");
        }
    </script>
</head>

<body>

    <!-- MENU HEADER -->
    <header class="menu-bar">
        <h1>Space Exploration</h1>
        <div class="burger-menu" onclick="toggleMenu()">☰</div>


        <div id="mobile-menu" class="mobile-menu">
            @if (Auth::user()->role == 'gestionnaire')
                <form action="{{route('data_chercheur')}}" method="GET">
                    @csrf
                    <button type="submit" class="nav-button active" id="vueChercheur">Vue chercheur</button>
                </form>
            @endif

            <form action="{{route('auth.logout')}}" method="POST">
                @method("delete")
                @csrf
                <button type="submit" class="nav-button active" id="logout">Log out</button>
            </form>
        </div>
    </header>

    <!-- HEADER AVEC VIDÉO EN BACKGROUND -->
    <header class="header-banner">
        <video autoplay loop muted playsinline class="header-video">
            <source src="{{ asset('videos/tron_new.mp4') }}" type="video/mp4">
            Votre navigateur ne supporte pas les vidéos HTML5.
        </video>
        <div class="header-content">
            <h1>DASHBOARD</h1>
        </div>
        <!-- Bloc Informations de Connexion -->
        @if (Auth::check())
            <div class="user-info">
                <p><strong>Utilisateur :</strong> {{ Auth::user()->username }}</p>
                <p><strong>Rôle :</strong> {{ Auth::user()->role }}</p>
                <img src="{{ asset('images/astronaute') }}" alt="astronaute">
            </div>
        @endif
    </header>

    <div class="container">
        <div class="banniere">
            <h2> Liste des astronautes </h2>
            @if (Auth::user()->role == 'gestionnaire')
                <a href="{{ route('ajoutAstronaute') }}" class="nav-button">Ajouter un astronaute</a>
            @endif
        </div>

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

        <div class="banniere">
            <h2> Liste des Missions </h2>
            @if (Auth::user()->role == 'gestionnaire')
                <a href="{{ route('ajoutMission') }}" class="nav-button">Ajouter une mission</a>
            @endif
        </div>

        <div class="missions container-element">
            <label for="filter">Filtrer les missions :</label>
            <select id="filter">
                <option value="all">Toutes</option>
                <option value="past">Passées</option>
                <option value="future">Futures</option>
            </select>
            <table id="missionsTable" class="display">
                <thead>
                    <tr>
                        <!-- <th>ID Astro</th> -->
                        <th>Nom de la Mission</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Date de Départ</th>
                        <th>Date de Retour</th>
                        <th>Statut</th>
                    </tr>
                </thead>
            </table>
        </div>


        <div class="banniere">
            <h2>Liste des vaisseaux</h2>
            @if (Auth::user()->role == 'gestionnaire')
                <a href="{{ route('ajoutVaisseau') }}" class="nav-button">Ajouter un vaisseau</a>
            @endif
        </div>

        <div class="container-element vaisseaux">
            <table id="vaisseauTable" class="display">
                <thead>
                    <tr>
                        <th>Nom du vaisseau</th>
                        <th>État</th>
                        <th>Technologie</th>
                        <th>Fabricant</th>
                        <th>Date du premier vol</th>
                        <th>Date du dernier vol</th>
                    </tr>
                </thead>
            </table>
        </div>

        <div class="banniere">
            <h2>Liste des sites de lancement</h2>
        </div>
        <div class="container-element sites-lancement">
            <table id="siteLancementTable" class="display">
                <thead>
                    <tr>
                        <th>Adresse</th>
                        <th>Pays</th>
                    </tr>
                </thead>
            </table>
        </div>

        <div class="banniere" id="graph">
            <h2>Nombre de missions par agence</h2>
        </div>
        <div class="graph">
            <?php
            use App\Models\VueAgenceCompteMission;
            VueAgenceCompteMission::all()->each(function (VueAgenceCompteMission $mission) {
                echo "<div class='bar-container'>";
                echo "<div class='bar' style='width: " . $mission->nombreMissions * 10 . "%;'>" . $mission->nomAgence ."</div>";
                echo '<div class="bar-label">' . $mission->nombreMissions . '</div>';
                echo "</div>";
            });
            ?>
        </div>

    </div> <!-- Fin du container -->
    <script>
        $(document).ready(function () {
            let tableAstronaute = $('#astronauteTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('liste') }}",
                    type: "GET",
                    data: function (d) {
                        d.filter = $('#filter').val();
                    }
                },
                columns: [
                    { data: 'nomAstro' },
                    { data: 'prenomAstro' },
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
                    data: function (d) {
                        d.filter = $('#filter').val();
                    }
                },
                columns: [
                    //{ data: 'idAstro' },
                    { data: 'nomMission' },
                    { data: 'nomAstro' },
                    { data: 'prenomAstro' },
                    { data: 'dateDepart' },
                    { data: 'dateRetour' },
                    { data: 'statut' }
                ]
            });

            let tableVaisseau = $('#vaisseauTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('getVaisseaux') }}",
                    type: "GET"
                },
                columns: [
                    { data: 'nomVaisseau' },
                    { data: 'etat' },
                    { data: 'technologie' },
                    { data: 'fabricant' },
                    { data: 'premierVol' },
                    { data: 'dernierVol' }
                ]
            });

            let tableSiteLancement = $('#siteLancementTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('getSitesLancement') }}",
                    type: "GET"
                },
                columns: [
                    { data: 'adresse' },
                    { data: 'pays' }
                ]
            });


            $('#filter').change(function () {
                tableMissions.ajax.reload();
                tableAstronaute.ajax.reload();
                tableVaisseau.ajax.reload();
                tableSiteLancement.ajax.reload();
            });
        });
    </script>
</body>

</html>