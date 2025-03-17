@extends('layout.app') <!-- Lien vers le layout principal -->

@section('title', 'Connexion - Space Exploration') <!-- Définir le titre de la page -->

@section('content')  <!-- Section du contenu spécifique à la page -->
<link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/loader.css') }}">

<!-- Inclure le fichier du loader -->
@include('layout.loader')

<!-- Conteneur de la vidéo -->
<div class="video-container">
    <video autoplay muted loop id="background-video">
        <source src="{{ asset('videos/background.mp4') }}" type="video/mp4">
        Votre navigateur ne supporte pas la lecture de vidéos.
    </video>
    <div class="overlay"></div>
</div>

<!-- Formulaire de Connexion -->
<div class="login-container">
    <h2>Veuillez vous connecter</h2>

    <!-- Ajout de onsubmit pour déclencher l'animation -->
    <form action="{{ route('auth.login') }}" method="POST" onsubmit="showUniverseLoader()">
        @csrf
        <label for="username">Identifiant :</label>
        <input type="text" id="username" name="username" placeholder="Votre identifiant" required>
        @error("username")
            <span class="error">{{ $message }}</span>
        @enderror

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" placeholder="Votre mot de passe" required>
        @error("password")
            <span class="error">{{ $message }}</span>
        @enderror

        <!-- Ajout de onclick pour l'animation -->
        <button type="submit" onclick="showUniverseLoader()">Connexion</button>
    </form>
</div>

<!-- Importation des scripts -->
<script src="{{ asset('js/loader.js') }}?v={{ time() }}"></script>
<script src="{{ asset('js/menu.js') }}?v={{ time() }}"></script>


@endsection  <!-- Fin de la section de contenu -->
