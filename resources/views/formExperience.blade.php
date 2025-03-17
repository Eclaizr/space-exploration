<!-- filepath: c:\Users\block\OneDrive - IMTBS-TSP\Bureau\xammp\htdocs\space-exploration\resources\views\formExperience.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une Expérience</title>
</head>
<body>
<div class="container">
    <h1>Ajouter une Expérience</h1>
    <form action="{{ route('storeExperience') }}" method="POST">
        @csrf
        <label for="nomExperience">Nom de l'Expérience:</label>
        <input type="text" id="nomExperience" name="nomExperience" required maxlength="50">
        
        <label for="typeExperience">Type d'Expérience:</label>
        <select id="typeExperience" name="typeExperience" required>
            <option value="">-- Sélectionnez un type --</option>
            <option value="Horticulture">Horticulture</option>
            <option value="Géologie">Géologie</option>
            <option value="Télécommunications">Télécommunications</option>
            <option value="Informatique">Informatique</option>
            <option value="Science">Science</option>
            <option value="Biologie">Biologie</option>
            <option value="Chimie">Chimie</option>
            <option value="Éducation">Éducation</option>
            <option value="Médecine">Médecine</option>
            <option value="Astrophysique">Astrophysique</option>
            <option value="Autre">Autre</option>
        </select>
        
        <label for="resultats">Résultats:</label>
        <textarea id="resultats" name="resultats" required></textarea>
        
        <button type="submit">Ajouter</button>
    </form>
</div>
</body>
</html>