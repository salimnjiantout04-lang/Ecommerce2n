<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('bootstrap/assets/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('bootstrap/assets/DataTables/Buttons-1.5.6/css/buttons.bootstrap4.min.css') }}">
    <title>liste des produits</title>
</head>

<body>

    @include('admin')

    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col">
                        <button class="btn btn-primary btn-lg rounded-pill d-inline-block" type="button">
                            <a href="/formproduct" style="text-decoration: none; color:inherit;">Ajouter un Produit</a>
                        </button>
                    </div>
                </div>
                <br>


                <div id="julio">
                    <div class="card ">
                        <div class="card-body ">


                            <table id="table2" class="table table-striped table-bordered"
                                style=" border-style:none;">
                                <thead>
                                    <tr>
                                        <th>Reference du produit</th>
                                        <th>Image</th>
                                        <th>Libellé</th>
                                        <th>Catégorie</th>
                                        <th>État</th>
                                        <th>Nbre d'images</th>
                                        <th>Caractéristiques</th>
                                        <th>Prix</th>
                                        <th>Quantité</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produits as $produit)
                                        <tr style=' border:rgb(118, 118, 118) solid 1px; width:1000vh;'>
                                             <td>
                @if($produit->image)
                    <img src="{{ $produit->image }}" alt="{{ $produit->titre }}" width="100">
                @endif
            </td>
                                            <td style='font-size: 15px;'>{{ $produit->libelle }}</td>
                                            <td style='font-size: 15px;'>{{ $produit->categorie->nomCat }} </td>
                                            <td style='font-size: 15px;'>{{ ucfirst($produit->etat) }}</td>
                                            <td style='font-size: 15px;'>{{ $produit->images->count() }}</td>
                                            <td style='font-size: 15px; width: 25vh;'>
                                                @foreach ($produit->caracteristique as $caract)
                                                    <ul>{{ $caract->nomCaract }}</ul>
                                                @endforeach
                                            </td>


                                            <td style=' width: 25vh;'>
                                                @if($produit->etat == 'neuf')
                                                    <?php echo number_format($produit->prix, 0, ',', ','); ?> FCFA
                                                @elseif($produit->etat == 'bon')
                                                    <?php echo number_format($produit->prixbonetat, 0, ',', ','); ?> FCFA
                                                @elseif($produit->etat == 'correct')
                                                    <?php echo number_format($produit->prixetatcorrect, 0, ',', ','); ?> FCFA
                                                @endif
                                            </td>

                                            <td style='width: 25vh;'>
                                                @if($produit->etat == 'neuf')
                                                    {{ $produit->qttestock }}
                                                @elseif($produit->etat == 'bon')
                                                    {{ $produit->qttestockbonetat }}
                                                @elseif($produit->etat == 'correct')
                                                    {{ $produit->qttestocketatcorrect }}
                                                @endif
                                            </td>

                                            <td>
                                                <a href="/searchprodupd/{{ $produit->id }}"><i
                                                        class="fas fa-edit"></i></a> &nbsp;&nbsp;&nbsp;
                                                <a href="/SupprimerProduit/{{ $produit->id }}"><i
                                                        class="fas fa-trash"></i></a>
                                            </td>
                                    @endforeach

                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Optional JavaScript -->
                <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                <script src="{{ asset('bootstrap/assets/js/jquery.min.js') }}"></script>
                <script src="{{ asset('bootstrap/assets/js/bootstrap.bundle.min.js') }}"></script>

                <!-- Datatables -->
                <script src="{{ asset('bootstrap/assets/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
                <script src="{{ asset('bootstrap/assets/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js') }}"></script>

                <script src="{{ asset('bootstrap/assets/DataTables/Buttons-1.5.6/js/dataTables.buttons.min.js') }}"></script>
                <script src="{{ asset('bootstrap/assets/DataTables/Buttons-1.5.6/js/buttons.bootstrap4.min.js') }}"></script>
                <script src="{{ asset('bootstrap/assets/DataTables/JSZip-2.5.0/jszip.min.js') }}"></script>
                <script src="{{ asset('bootstrap/assets/DataTables/pdfmake-0.1.36/pdfmake.min.js') }}"></script>
                <script src="{{ asset('bootstrap/assets/DataTables/pdfmake-0.1.36/vfs_fonts.js') }}"></script>
                <script src="{{ asset('bootstrap/assets/DataTables/Buttons-1.5.6/js/buttons.html5.min.js') }}"></script>
                <script src="{{ asset('bootstrap/assets/DataTables/Buttons-1.5.6/js/buttons.print.min.js') }}"></script>
                <script src="{{ asset('bootstrap/assets/DataTables/Buttons-1.5.6/js/buttons.colVis.min.js') }}"></script>

                <script>
                    $(document).ready(function() {
                        var table = $('#table2').DataTable({

                            dom: "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                                "<'row'<'col-md-12'tr>>" +
                                "<'row'<'col-md-5'i><'col-md-7'p>>",
                            lengthMenu: [
                                [5, 10, 25, 50, 100, -1],
                                [5, 10, 25, 50, 100, "All"]
                            ]
                        });

                        table2.buttons().container()
                            .appendTo('#table_wrapper .col-md-5:eq(0)');
                    });
                </script>

            </div>
</body>
