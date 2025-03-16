<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Space exploration')</title> <!-- Utilisation de yield pour le titre -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    @yield('stylesheet') <!-- Utilisation de yield pour les feuilles de style -->
</head>
<body>
    <!-- MENU HEADER -->
    <header class="menu-bar">
        <h1><a href="{{ route('login') }}">Space Exploration</a></h1>
        <div class="burger-menu" onclick="toggleMenu()">☰</div>
        <nav class="nav-links">
            <a href="{{ route('login') }}" class="nav-button active">Sign In</a>
            <a href="{{ route('register') }}" class="nav-button">Sign Up</a>
        </nav>
    </header>

    <!-- Contenu de la page -->
    <div class="container">
        @yield('content') <!-- C'est ici que le contenu de la page sera injecté -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
