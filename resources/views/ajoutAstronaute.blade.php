<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/ajout.css') }}">
    <title>Ajouter un Astronaute</title>
</head>
<body>

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

        <div class="alert alert-danger">
            {{ session('error') }}
        </div>

    <div class="container">
        <div class="container-element">
            <h1>Ajouter un Astronaute</h1>
            <div class="form-container">
                <form action="{{ route('storeAstronaute') }}" method="POST">
                    @csrf
                    <div>
                        <label for="nomAstro">Nom:</label>
                        <input type="text" id="nomAstro" name="nomAstro" required>
                    </div>
                    <div>
                        <label for="prenomAstro">Prénom:</label>
                        <input type="text" id="prenomAstro" name="prenomAstro" required>
                    </div>
                    <div>
                        <label for="dateNaissanceAstro">Date de Naissance:</label>
                        <input type="date" id="dateNaissanceAstro" name="dateNaissanceAstro" required>
                    </div>
                    <div>
                        <label for="nationalite">Nationalité:</label>
                        <input type="text" id="nationalite" name="nationalite" required>
                    </div>

                    <div>
                        <label for="Poste">Poste:</label>
                        <input type="text" id="Poste" name="Poste" required>
                    </div>

                    <div>
                        <label for="Agence">Agence:</label>
                        <input type="text" id="Agence" name="Agence" required>
                    </div>

                    <div>
                        <label for="date_debut_poste">Date de début:</label>
                        <input type="date" id="date_debut_poste" name="date_debut_poste" required>
                    </div>

                    <button type="submit">Ajouter</button>
                </form>
            </div>
        </div>
        <div class="container-element">
            <h1>Modifier un astronaute</br>(Le faire passer à la retraite)</h1>
            <div class="form-container">
                <form action="{{ route('modifyAstronaute') }}" method="PUT">
                    @csrf
                    <div>
                        <label for="nomAstro">Nom:</label>
                        <input type="text" id="nomAstro" name="nomAstro" required>
                    </div>
                    <div>
                        <label for="prenomAstro">Prénom:</label>
                        <input type="text" id="prenomAstro" name="prenomAstro" required>
                    </div>
                    <button type="submit">Modifier</button>
                </form>
            </div>
        </div>
        <div class="container-element">
            <h1>Supprimer un astronaute</h1>
            <div class="form-container">
                <form action="{{ route('deleteAstronaute') }}" method="DELETE">
                    @csrf
                    <div>
                        <label for="nomAstro">Nom:</label>
                        <input type="text" id="nomAstro" name="nomAstro" required>
                    </div>
                    <div>
                        <label for="prenomAstro">Prénom:</label>
                        <input type="text" id="prenomAstro" name="prenomAstro" required>
                    </div>
                    <button type="submit">Supprimer</button>
                </form>
            </div>
        </div>

    </div>

    
</body>
</html>