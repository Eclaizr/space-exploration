<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Objet Découvert</title>
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Ajouter un Objet Découvert</h1>

    @if(session('error'))
        <p class="error">{{ session('error') }}</p>
    @endif

    <form action="{{ route('storeObjetDecouvert') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nomObjet">Nom de l'Objet (Laisser vide pour générer automatiquement)</label>
            <input type="text" id="nomObjet" name="nomObjet" placeholder="Ex: Mars_01">

            @error('nomObjet')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="distanceTerre">Distance de la Terre (UA):</label>
            <input type="number" step="0.01" id="distanceTerre" name="distanceTerre" required>
            @error('distanceTerre')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="revolution">Révolution (jours):</label>
            <input type="number" step="0.01" id="revolution" name="revolution" required>
            @error('revolution')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="anneeDecouverte">Année de Découverte:</label>
            <input type="number" id="anneeDecouverte" name="anneeDecouverte" required>
            @error('anneeDecouverte')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="agenceDecouvreuse">Agence Découvreuse:</label>
            <input type="text" id="agenceDecouvreuse" name="agenceDecouvreuse" required maxlength="255">
            @error('agenceDecouvreuse')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Ajouter</button>
    </form>
</div>
</body>
</html>
