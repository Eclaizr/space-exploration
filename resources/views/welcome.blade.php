<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Space Exploration</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
</head>
<body>

<!-- MENU HEADER -->
<header class="menu-bar">
    <h1><a href="{{ route('login') }}">Space Exploration</a></h1>

    <!-- Menu Burger pour mobile -->
    <div class="burger-menu" onclick="toggleMenu()">☰</div>

    <!-- Navigation -->
    <nav class="nav-links">
        <a href="{{ route('login') }}" class="nav-button active">Sign In</a>
        <a href="{{ route('register') }}" class="nav-button">Sign Up</a>
    </nav>
</header>

<!-- Conteneur de la vidéo -->
<div class="video-container">
    <video autoplay muted loop id="background-video">
        <source src="{{ asset('videos/background.mp4') }}" type="video/mp4">
        Votre navigateur ne supporte pas la lecture de vidéos.
    </video>
    <div class="overlay"></div>

</div>

<!-- Titre -->
 <div class="title">
    <span>Welcome to space!!!</span>
 </div>


<script>
    function toggleMenu() {
        const nav = document.querySelector(".nav-links");
        nav.classList.toggle("show");
    }
</script>

</body>
</html>