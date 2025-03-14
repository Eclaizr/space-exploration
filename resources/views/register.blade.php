<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Space Exploration - Register</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}"> <!-- Si vous avez un fichier CSS -->
</head>
<body>
    <header class="menu-bar">
        <h1>Space Exploration</h1>

        <!-- Menu Burger pour mobile -->
        <div class="burger-menu" onclick="toggleMenu()">☰</div>

        <!-- Navigation -->
        <nav class="nav-links">
            <a href="{{ route('login') }}" class="nav-button">Sign In</a>
            <a href="{{ route('register') }}" class="nav-button active">Sign Up</a>
        </nav>
    </header>

    <!-- Formulaire d'enregistrement -->
    <div class="login-container">
        <h2>Créer un compte</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Username :</label>
                <input type="text" id="username" name="username" class="form-control" value="{{ old('username') }}" required>
                @error('username')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" class="form-control" required>
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmer le mot de passe :</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="role">Rôle :</label>
                <select id="role" name="role" class="form-control" required>
                    <option value="astronaute" {{ old('role') == 'astronaute' ? 'selected' : '' }}>Astronaute</option>
                    <option value="chercheur" {{ old('role') == 'chercheur' ? 'selected' : '' }}>Chercheur</option>
                </select>
                @error('role')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">S'enregistrer</button>
        </form>
    </div>

    <script>
        // Afficher ou masquer le champ spécialité en fonction du rôle sélectionné
        document.getElementById('role').addEventListener('change', function() {
            var role = this.value;
            if (role === 'chercheur') {
                document.getElementById('specialiteField').style.display = 'block';
            } else {
                document.getElementById('specialiteField').style.display = 'none';
            }
        });
    </script>
</body>
</html>
