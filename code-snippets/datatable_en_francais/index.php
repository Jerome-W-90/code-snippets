<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <title>Datatable en francais</title>
</head>
<body>
    <h1>Traduction de Datatable en <a target="_blank" href="https://datatables.net/plug-ins/i18n/French">Français</a></h1>
    <hr>
    <div class="table-responsive">
        <table id="myTable" class="table table-striped">
            <thead class="thead-dark">
                <th>Colonne 1</th>
                <th>Colonne 2</th>
                <th>Colonne 3</th>
                <th>Colonne 4</th>
                <th>Colonne 5</th>
            </thead>
            <tbody>
                <?php for($i=0; $i<5; $i++): ?>
                <tr>
                    <td>Résultat <?php echo $i; ?></td>
                    <td>Résultat <?php echo $i; ?></td>
                    <td>Résultat <?php echo $i; ?></td>
                    <td>Résultat <?php echo $i; ?></td>
                    <td>Résultat <?php echo $i; ?></td>
                </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    </div>
</body>
<script type="text/javascript">
    $(document).ready(function(){
        $('#myTable').DataTable({
            "pageLength": -1, // affiche tous les résultats
            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "tous les"]], // filtre sur la quantité
            "language": {
                "sEmptyTable":     "Aucune donnée disponible dans le tableau",
                "sInfo":           "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
                "sInfoEmpty":      "Affichage de l'élément 0 à 0 sur 0 élément",
                "sInfoFiltered":   "(filtré à partir de _MAX_ éléments au total)",
                "sInfoPostFix":    "",
                "sInfoThousands":  ",",
                "sLengthMenu":     "Afficher _MENU_ éléments",
                "sLoadingRecords": "Chargement...",
                "sProcessing":     "Traitement...",
                "sSearch":         "Rechercher :",
                "sZeroRecords":    "Aucun élément correspondant trouvé",
                "oPaginate": {
                    "sFirst":    "Premier",
                    "sLast":     "Dernier",
                    "sNext":     "Suivant",
                    "sPrevious": "Précédent"
                },
                "oAria": {
                    "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                    "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
                },
                "select": {
                    "rows": {
                        "_": "%d lignes sélectionnées",
                        "0": "Aucune ligne sélectionnée",
                        "1": "1 ligne sélectionnée"
                    }
                }
            }
        });
    });
</script>
</html>
