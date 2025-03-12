<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Space Exploration</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<!-- Conteneur de la vidéo -->
    <div class="video-container">
        <video autoplay muted loop id="background-video">
            <source src="{{ asset('videos/background.mp4') }}" type="video/mp4">
            Votre navigateur ne supporte pas la lecture de vidéos.
        </video>
        <div class="overlay"></div>
    </div>

<!-- CONTAINER INFOS LOGINS -->
    <div class="login-container">
        <h2>Veuillez vous connecter</h2>
        <form action="#" method="POST">
            <label for="identifiant">Identifiant</label>
            <input type="identifiant" id="identifiant" name="identifiant" placeholder="Votre identifiant" required>

            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" placeholder="Votre mot de passe" required>

            <button type="submit">Connexion</button>
            <a href="#" class="link">Mot de passe oublié ?</a>
        </form>
    </div>
</body>
</html>