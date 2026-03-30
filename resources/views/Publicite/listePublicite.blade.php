<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Publicité</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('bootstrap/assets/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('bootstrap/assets/DataTables/Buttons-1.5.6/css/buttons.bootstrap4.min.css') }}">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <style>
        .prix-container {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
        .prix-original {
            text-decoration: line-through;
            color: red;
            font-size: 0.9em;
        }
        .prix-reduit {
            color: blue;
            font-weight: bold;
            font-size: 1.1em;
        }
        .prix-normal {
            color: #333;
            font-weight: bold;
            font-size: 1.1em;
        }
        .badge-reduction {
            font-size: 0.85em;
            padding: 3px 8px;
        }
    </style>
</head>

<body>
    @include('admin')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col">
                        <button class="btn btn-primary btn-lg rounded-pill d-inline-block" type="button">
                            <a href="/formpublicite" style="text-decoration: none; color:inherit;">
                                <i class="fas fa-plus-circle"></i> Ajouter Publicité
                            </a>
                        </button>
                    </div>
                </div>
                <br>
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('statue'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('statue') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('successaddp'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('successaddp') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <br>
                <table id="table2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Prix</th>
                            <th>Réduction</th>
                            <th>Date début</th>
                            <th>Date fin</th>
                            <th>Actif</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($publicites as $pub)
                        <tr>
                            <td>{{ $pub->id }}</td>
                            <td>{{ $pub->titre }}</td>
                            <td>{{ Str::limit($pub->description, 50) }}</td>
                            <td>
                                @if($pub->image)
                                    <img src="{{ asset('photos/' . urlencode($pub->image)) }}" alt="{{ $pub->titre }}" width="80" class="img-thumbnail">
                                @endif
                            </td>
                            <td>
                                <div class="prix-container">
                                    @if($pub->reduction > 0)
                                        <!-- Prix avec réduction -->
                                        <span class="prix-original">
                                            {{ number_format($pub->prix_vente, 0, ',', ' ') }} FCFA
                                        </span>
                                        <span class="prix-reduit">
                                            {{ number_format($pub->prix_vente - ($pub->prix_vente * $pub->reduction / 100), 0, ',', ' ') }} FCFA
                                        </span>
                                    @else
                                        <!-- Prix normal sans réduction -->
                                        <span class="prix-normal">
                                            {{ number_format($pub->prix_vente, 0, ',', ' ') }} FCFA
                                        </span>
                                    @endif
                                </div>
                            </td>
                            <td>
                                @if($pub->reduction > 0)
                                    <span class="badge bg-success badge-reduction">-{{ $pub->reduction }}%</span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($pub->date_debut)->format('d/m/Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($pub->date_fin)->format('d/m/Y') }}</td>
                            <td>
                                @if($pub->actif)
                                    <span class="badge bg-success">Actif</span>
                                @else
                                    <span class="badge bg-danger">Inactif</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="/modpublicite/{{ $pub->id }}" class="btn btn-sm btn-warning" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="/Supprimerpublicite/{{ $pub->id }}"
                                       class="btn btn-sm btn-danger"
                                       title="Supprimer"
                                       onclick="return confirm('Voulez-vous vraiment supprimer cette publicité ?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
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
                ],
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/French.json'
                },
                order: [[0, 'desc']] // Trier par ID décroissant (plus récentes en premier)
            });

            table.buttons().container()
                 .appendTo('#table2_wrapper .col-md-5:eq(0)');
        });
    </script>
</body>

</html>
