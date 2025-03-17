<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/ajout.css') }}">
    <title>Ajouter une mission</title>
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
            <h1>Ajouter une mission</h1>
            <div class="form-container">
                <form action="{{ route('createMission') }}" method="POST">
                    @csrf
                    <div>
                        <label for="nomMission">Nom :</label>
                        <input type="text" id="nomMission" name="nomMission" required>
                    </div>
                    <div>
                        <label for="dateDepart">Date de départ :</label>
                        <input type="date" id="dateDepart" name="dateDepart" required>
                    </div>
                    <div>
                        <label for="dateRetour">Date de retour :</label>
                        <input type="date" id="dateRetour" name="dateRetour" required>
                    </div>
                    <div>
                        <label for="objectif">Objectif :</label>
                        <input type="text" id="objectif" name="objectif" required>
                    </div>     
                    <div id="estHabitee">
                        <label for="estHabitee">Est habitée ? :</label>
                        <input type="checkbox" id="estHabitee" name="estHabitee">
                    </div>
                    <div id="statut">
                        <label for="statut">Statut :</label>
                        <select id="statut" name="statut" required>
                            <option value="reussite">Réussite</option>
                            <option value="echec">Echec</option>
                        </select>      
                    </div>
                    <div id="vaisseau">
                        <label for="vaisseau">Nom du vaisseau :</label>
                        <select id="vaisseau" name="vaisseau" required>
                            <?php
                            use App\Models\Vaisseauspatial;
                                Vaisseauspatial::where('etat', 'Opérationnel')->each(function($vaisseau){
                                    echo "<option value='".$vaisseau->idVaisseau."'>".$vaisseau->nomVaisseau."</option>";
                                });
                            ?>
                        </select>
                    </div>
                    <button type="submit">Ajouter</button>
                </form>
            </div>
        </div>

        <div class="container-element">
            <h1>Attribuer une mission à un astronaute</h1>
            <div class="form-container">
                <form action="{{ route('attribueMission') }}" method="POST">
                @csrf
                <div id="mission">
                    <label for="mission">Nom de la mission :</label>
                    <select id="mission" name="mission" required>
                        <?php
                            use App\Models\Missionspatiale;
                            Missionspatiale::all()->each(function($mission){
                                echo "<option value='".$mission->idMission."'>".$mission->nomMission."</option>";
                            });
                        ?>
                    </select>
                </div>
                <div id="astronaute">
                    <label for="astronaute">Nom de l'astronaute' :</label>
                    <select id="astronaute" name="astronaute" required>
                        <?php
                            use App\Models\Astronaute;
                            Astronaute::all()->each(function($astronaute){
                                echo "<option value='".$astronaute->idAstro."'>".$astronaute->prenomAstro. " " .$astronaute->nomAstro."</option>";
                            });
                        ?>
                    </select>
                </div>

                <div>
                    <label for="role">Role dans la mission :</label>
                    <input type="text" id="role" name="role" required>
                </div>

                <div>
                    <label for="date_participation">Date de Participation :</label>
                    <input type="date" id="date_participation" name="date_participation" required>
                </div>

                <button type="submit">Attribuer</button>
                </form>
            </div>
        </div>

    </div>
</body>
</html>