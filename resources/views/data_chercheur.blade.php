<!DOCTYPE html>
<html lang="fr">
<head>


    <title>Objets Découverts</title>

    <!-- Bootstrap & DataTables CSS -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>
<body>
@include("affichage_chercheur")
<div class="container mt-5">
    <h2 class="text-center">Liste des Objets Découverts</h2>

    <!-- Filtres -->
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="filterYear" class="form-label">Année de Découverte</label>
            <select id="filterYear" class="form-control">
                <option value="">Toutes les années</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="filterAgency" class="form-label">Agence Découvreuse</label>
            <select id="filterAgency" class="form-control">
                <option value="">Toutes les agences</option>
                <option value="csna">CSNA</option>
                <option value="esa">ESA</option>
                <option value="isro">ISRO</option>
                <option value="jaxa">JAXA</option>
                <option value="nasa">NASA</option>
                <option value="rocosmos">Rocosmos</option>
            </select>
        </div>
    </div>

    <!-- Tableau -->
    <table id="objetsTable" class="table table-striped">
        <thead>
        <tr>
            <th>Nom de l'Objet</th>
            <th>Distance de la Terre (UA)</th>
            <th>Révolution (jours)</th>
            <th>Année de Découverte</th>
            <th>Agence</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

<script>
    $(document).ready(function () {
        let table = $('#objetsTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('objets.data') }}",
                data: function (d) {
                    d.annee = $('#filterYear').val();
                    d.agence = $('#filterAgency').val();
                }
            },
            columns: [
                { data: 'nomObjet', name: 'nomObjet' },
                { data: 'distanceTerre', name: 'distanceTerre' },
                { data: 'revolution', name: 'revolution' },
                { data: 'anneeDecouverte', name: 'anneeDecouverte' },
                { data: 'agenceDecouvreuse', name: 'agenceDecouvreuse' }
            ],
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/French.json"
            }
        });

        // Chargement des options des filtres
        function loadFilters() {
            $.ajax({
                url: "{{ route('objets.filters') }}",
                method: "GET",
                success: function (data) {
                    let yearFilter = $('#filterYear');
                    let agencyFilter = $('#filterAgency');

                    yearFilter.empty().append('<option value="">Toutes les années</option>');
                    agencyFilter.empty().append('<option value="">Toutes les agences</option>');

                    data.annees.forEach(year => {
                        yearFilter.append(`<option value="${year}">${year}</option>`);
                    });

                    data.agences.forEach(agency => {
                        agencyFilter.append(`<option value="${agency}">${agency}</option>`);
                    });
                }
            });
        }

        loadFilters();

        // Rafraîchir le tableau lorsque les filtres changent
        $('#filterYear, #filterAgency').change(function () {
            table.ajax.reload();
        });
    });
</script>
</body>
</html>
