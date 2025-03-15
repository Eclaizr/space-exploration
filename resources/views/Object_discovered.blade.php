@section('content')
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
                    <option value="roscosmos">Roscosmos</option>
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

    <!-- jQuery et DataTables -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


    <script>
        $(document).ready(function () {
            function loadFilters() {
                $.ajax({
                    url: "{{ route('objets.filters') }}",
                    method: "GET",
                    success: function (data) {
                        let yearFilter = $('#filterYear');

                        if (data.annees && Array.isArray(data.annees)) {
                            yearFilter.empty().append('<option value="">Toutes les années</option>');
                            data.annees.forEach(year => {
                                yearFilter.append(`<option value="${year}">${year}</option>`);
                            });
                        }

                        initializeDataTable();
                    },
                    error: function () {
                        console.error('Erreur lors du chargement des filtres.');
                    }
                });
            }

            function initializeDataTable() {
                let dataTable = $('#objetsTable').DataTable({
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

                $('#filterYear, #filterAgency').change(function () {
                    dataTable.ajax.reload();
                });
            }

            loadFilters();
        });
    </script>
@endsection
