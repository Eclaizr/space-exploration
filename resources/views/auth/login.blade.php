@extends('layout.app') <!-- Lien vers le layout principal -->

@section('title', 'Connexion - Space Exploration') <!-- Définir le titre de la page -->

@section('content')  <!-- Section du contenu spécifique à la page -->

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

        <!-- Messages de succès ou d'erreur -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <label for="username">Identifiant : </label>
            <input type="text" id="username" name="username" placeholder="Votre identifiant" required>

            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" placeholder="Votre mot de passe" required>

            <button type="submit">Connexion</button>
        </form>
    </div>
@endsection  <!-- Fin de la section de contenu -->
