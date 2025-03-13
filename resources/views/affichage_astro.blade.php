<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mon Site')</title>
    <link rel="stylesheet" href="{{ asset('css/astronaute.css') }}">
</head>
<body>
<header>
    <h1>Missions des Astronautes</h1>
    <nav>
        <ul>
            <li>Missions Attribuées</li>
            <li>Missions Archivées</li>
        </ul>
    </nav>
</header>
<main>
    <div class="id">
        <h1>Fichier d'identité</h1>
        <p>Numéro d'identification: {{$Astronaute->idAstro}}</p>
        <p>Prenom: {{$Astronaute->idAstro}}</p>
        <p>Nom: {{ $Astronaute->name }}</p>
        <p>Nombre de Missions: {{ $Astronaute->nombreMissions }}</p>
        <p>Statut : {{$Astronaute->statut}}</p>
    </div>
    <div class="Missions">
        

    </div>

</main>

<footer>
</footer>
</body>
</html>
