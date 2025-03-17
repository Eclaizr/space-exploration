<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/ajout.css') }}">
    <title>Ajouter un Vaisseau</title>
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
            <h1>Ajouter un Vaisseau</h1>
            <div class="form-container">
                <form action="{{ route('storeVaisseau') }}" method="POST">
                    @csrf
                    <div>
                        <label for="nomVaisseau">Nom :</label>
                        <input type="text" id="nomVaisseau" name="nomVaisseau" required>
                    </div>
                    <div>
                        <label for="premierVol">Date du premier vol :</label>
                        <input type="date" id="premierVol" name="premierVol" required>
                    </div>
                    <div>
                        <label for="dernierVol">Date du dernier vol :</label>
                        <input type="date" id="dernierVol" name="dernierVol">
                    </div>
                    <div>
                        <label for="fabricant">Fabricant :</label>
                        <input type="text" id="fabricant" name="fabricant" required>
                    </div>

                    <div>
                        <label for="technologie">Technologie :</label>
                        <input type="text" id="technologie" name="technologie" required>
                    </div>

                    <div>
                        <label for="etat">Opérationnel :</label>
                        <input type="checkbox" id="etat" name="etat">
                    </div>
                    <div id="site">
                        <label for="site">Site de lancement :</label>
                        <select id="site" name="site" required>
                            <?php
                            use App\Models\Sitelancement;
                                Sitelancement::all()->each(function($site){
                                    echo "<option value='".$site->idLancement."'>".$site->adresse."</option>";
                                });
                            ?>
                        </select>
                    </div>
                    <button type="submit">Ajouter</button>
                </form>
            </div>
        </div>

        <div class="container-element">
            <h1>Supprimer un vaisseau</h1>
            <div class="form-container">
                <form action="{{ route('deleteVaisseau') }}" method="DELETE">
                    @csrf
                    <div>
                        <label for="nomVaisseau">Nom du vaisseau:</label>
                        <input type="text" id="nomVaisseau" name="nomVaisseau" required>
                    </div>
                    <button type="submit">Supprimer</button>
                </form>
            </div>
        </div>

    </div>
</body>

</html>