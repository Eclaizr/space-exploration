// filepath: c:\Users\clair\Desktop\space-exploration\resources\views\data_chercheur.blade.php
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Chercheur</title>
    <link rel="stylesheet" href="#">
</head>
<body>

    <h2>Objets célestes explorés</h2>
    <table>
        <thead>
            <tr>
                <th>Objet céleste</th>
                <th>Distance à la Terre</th>
                <th>Période de révolution</th>
                <th>Nombre de missions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($objetsCelestes as $objet)
                <tr>
                    <td>{{ $objet->nomObjet }}</td>
                    <td>{{ $objet->distanceTerre }}</td>
                    <td>{{ $objet->revolution }}</td>
                    <td>{{ $objet->nombre_missions }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Objets célestes habitables ou semi-habitables</h2>
    <table>
        <thead>
            <tr>
                <th>Objet céleste</th>
                <th>Distance à la Terre</th>
                <th>Nombre de missions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($objetsCelestes as $objet)
                @if ($objet->habitabilite >= 0.3)
                    <tr>
                        <td>{{ $objet->nomObjet }}</td>
                        <td>{{ $objet->distanceTerre }}</td>
                        <td>{{ $objet->nombre_missions }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</body>
</html>
