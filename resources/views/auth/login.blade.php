@extends('layout.app') <!-- Lien vers le layout principal -->

@section('title', 'Connexion - Space Exploration') <!-- Définir le titre de la page -->

@section('content')  <!-- Section du contenu spécifique à la page -->
<link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
<!-- Conteneur de la vidéo -->
<div class="video-container">
        <video autoplay muted loop id="background-video">
            <source src="{{ asset('videos/background.mp4') }}" type="video/mp4">
            Votre navigateur ne supporte pas la lecture de vidéos.
        </video>
        <div class="overlay"></div>
    </div>

    <div class="login-container">
        <h2>Veuillez vous connecter</h2>

        <form action="{{ route('auth.login') }}" method="POST">
            @csrf
            <label for="username">Identifiant : </label>
            <input type="text" id="username" name="username" placeholder="Votre identifiant" required>
            @error("username")
                <span class="error">{{ $message }}</span>
            @enderror

            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" placeholder="Votre mot de passe" required>
            @error("password")
                <span class="error">{{ $message }}</span>
            @enderror

            <button type="submit">Connexion</button>
        </form>
    </div>
@endsection  <!-- Fin de la section de contenu -->
