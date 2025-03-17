<!-- filepath: c:\Users\block\OneDrive - IMTBS-TSP\Bureau\xammp\htdocs\space-exploration\resources\views\formObjetDecouvert.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Objet Découvert</title>
</head>
<body>
<div class="container">
    <h1>Ajouter un Objet Découvert</h1>
    <form action="{{ route('storeObjetDecouvert') }}" method="POST">
        @csrf
        <label for="nomObjet">Nom de l'Objet:</label>
        <input type="text" id="nomObjet" name="nomObjet" required maxlength="255">
        
        <label for="distanceTerre">Distance de la Terre (UA):</label>
        <input type="number" step="0.01" id="distanceTerre" name="distanceTerre" required>
        
        <label for="revolution">Révolution (jours):</label>
        <input type="number" step="0.01" id="revolution" name="revolution" required>
        
        <label for="anneeDecouverte">Année de Découverte:</label>
        <input type="number" id="anneeDecouverte" name="anneeDecouverte" required>
        
        <label for="agenceDecouvreuse">Agence Découvreuse :</label>
            <select name="agenceDecouvreuse" id="agenceDecouvreuse" required>
                <option value="">-- Sélectionnez une agence --</option>
                <option value="CNSA">CNSA</option>
                <option value="ESA">ESA</option>
                <option value="ISRO">ISRO</option>
                <option value="JAXA">JAXA</option>
                <option value="NASA">NASA</option>
                <option value="Roscosmos">Roscosmos</option>
            </select>
        <button type="submit">Ajouter</button>
    </form>
</div>
</body>
</html>