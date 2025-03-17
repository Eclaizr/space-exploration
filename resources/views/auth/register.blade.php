@extends('layout.app') <!-- Lien vers le layout principal -->

@section('title', 'Inscription - Space Exploration') <!-- Définir le titre de la page -->
@section('stylesheet') <!-- Lien vers la feuille de style spécifique à la page -->
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')  <!-- Section du contenu spécifique à la page -->

    <div class="register-container">
        <h2>Inscription</h2>

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

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form name="registerForm" action="{{ route('register.submit') }}" method="POST">
            @csrf
            <label for="username">Identifiant : </label>
            <input type="text" id="username" name="username" placeholder="Choisissez un identifiant" value="{{ old('username') }}" required>

            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" placeholder="Choisissez un mot de passe" required>

            <label for="password_confirmation">Confirmer le mot de passe :</label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirmez votre mot de passe" required>

            <label for="role">Rôle :</label>
            <select id="role" name="role" required>
                <option value="gestionnaire">Gestionnaire</option>
                <option value="astronaute">Astronaute</option>
                <option value="chercheur">Chercheur</option>
            </select>

            <button type="submit">S'inscrire</button>
        </form>
    </div>

    <!--
    <script>
    function validateForm() {
      let x = document.forms["registerForm"]["password"].value;
      if (x.length() < 8) {
        alert("non");
        return false;
      }
    } 
    </script> -->
@endsection
