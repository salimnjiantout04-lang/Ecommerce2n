<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableaux De Commandes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <style>
        .details-row {
            display: none;
        }
        .dataTables_length {
            margin-bottom: 20px;
        }

    .highlight-red {
        background-color: black;
        color: red;
        animation: flash 1s infinite;
    }

    @keyframes flash {
        0%, 50%, 100% {
            opacity: 1;
        }
        25%, 75% {
            opacity: 0.5;
        }
    }


    </style>
</head>
<body>
    @include("admin")

    <div class="container">
        <table id="commandes" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Numero</th>
                    <th>Email</th>
                    <th>Date Commande</th>
                    <th>Visibilite</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produits as $item)
                <tr>
                    <td>{{ $item['id'] }}</td>
                    <td>{{ $item['nom'] }}</td>
                    <td>{{ $item['prenom'] }}</td>
                    <td>{{ $item['numero'] }}</td>
                    <td>{{ $item['email'] }}</td>
                    @if($item['etat'] == 'nonlu')
                    <td class="{{ $item->isExpired ? 'highlight-red' : '' }}">{{ $item['created_at'] }}</td>
                    @else
                    <td >{{ $item['created_at'] }}</td>
                    @endif
                    <td><button type="button" class="btn btn-toggle-products" data-id="{{ $item['id'] }}" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item['id'] }}">voir<i class="fas fa-eye ms-2" style="color:green"></i></button>
                        <!-- Button trigger modal -->
                        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item['id'] }}">
                        Launch demo modal
                        </button> -->
                    </td>
                </tr>
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{ $item['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $item['id'] }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel{{ $item['id'] }}">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                        <div>
                                
                                    <h6><strong>Name:</strong> {{$item['nom']}}</h6>
                                    <h6><strong>Phone:</strong> {{$item['numero']}}</h6>
                                    <h6><strong>Email:</strong> {{$item['email']}}</h6>
                                    <hr>
                                    
                                    <h5>Commandes</h5>
                                    <ul>
                                    @php $val = 0; @endphp
                                    @foreach($item->commandenvs as $com)
                                            <li>
                                                <strong>Produit :</strong> {{$com->produit->libelle}} &nbsp;&nbsp;&nbsp;Etat {{$com->etat}}|
                                                <strong>Quantity:</strong> {{$com->qtte}} |
                                                <strong>Prix:</strong> {{$com->prix}}FCFA |
                                            </li><br>
                                        @php $val += $com->prix * $com->qtte; @endphp
                                        @endforeach
                                    <h6><strong>Total:</strong>{{ $val }}FCFA</h6>

                                        <br>
                                    </ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary btn-toggle-products5" data-id="{{ $item['id'] }}">Traiter</button>
                    </div>
                    </div>
                </div>
                </div>
                <!-- <tr class="product-row" data-id="{{ $item['id'] }}">
                        <td colspan="4">
                          <table class="table table-sm">
                            <thead>
                              <tr>
                                <th>Produit</th>
                                <th>Prix</th>
                                <th>Quantité</th>
                                <th>État</th>
                                <th>Total</th>
                              </tr>
                            </thead>
                            <tbody>
                               @php $val = 0; @endphp
                                @foreach($item->commandenvs as $com)
                              <tr>
                                <td>{{$com->produit->libelle}}</td>
                                <td>{{$com->prix}}</td>
                                <td>{{$com->qtte}}</td>
                                <td>{{$com->etat}}</td>
                                <td>{{$com->prix * $com->qtte}}</td>
                              </tr>
                              @php $val += $com->prix * $com->qtte; @endphp
                                @endforeach
                              <tr>
                                <td colspan="3" class="text-end">Total</td>
                                <td>{{ $val }}</td>
                                <td><button class="btn btn-toggle-products5" data-id="{{ $item['id'] }}">Traiter<i class="fas fa-check ms-1" style="color:green"></i></button></td>

                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr> -->
                
                @endforeach
            </tbody>
        </table>
    </div>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset ('bootstrap/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset ('bootstrap/assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset ('bootstrap/assets/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset ('bootstrap/assets/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset ('bootstrap/assets/DataTables/Buttons-1.5.6/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset ('bootstrap/assets/DataTables/Buttons-1.5.6/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset ('bootstrap/assets/DataTables/JSZip-2.5.0/jszip.min.js') }}"></script>
    <script src="{{ asset ('bootstrap/assets/DataTables/pdfmake-0.1.36/pdfmake.min.js') }}"></script>
    <script src="{{ asset ('bootstrap/assets/DataTables/pdfmake-0.1.36/vfs_fonts.js') }}"></script>
    <script src="{{ asset ('bootstrap/assets/DataTables/Buttons-1.5.6/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset ('bootstrap/assets/DataTables/Buttons-1.5.6/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset ('bootstrap/assets/DataTables/Buttons-1.5.6/js/buttons.colVis.min.js') }}"></script>


        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    // DataTable initialization
    var table = $('#commandes').DataTable({
        dom: 
            "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
            "<'row'<'col-md-12'tr>>" +
            "<'row'<'col-md-5'i><'col-md-7'p>>",
        lengthMenu: [
            [5, 10, 25, 50, 100, -1],
            [5, 10, 25, 50, 100, "All"]
        ]
    });

    // Button click event to view details
    $('.view-details').on('click', function() {
        var $row = $(this).closest('tr');
        var rowData = table.row($row).data();
        var orderId = rowData[0]; // Adjust index if necessary to get the correct order ID

        // Toggle visibility if details row already exists
        if ($row.next('.details-row').length) {
            $row.next('.details-row').toggle();
            return;
        }

        // Create a loading spinner or indicator
        var detailsRow = $('<tr class="details-row"><td colspan="7" class="loading">Loading...</td></tr>');
        $row.after(detailsRow);

        // Fetch details from the backend using AJAX
        $.ajax({
            url: '/listecom', // Replace with your actual endpoint
            method: 'GET',
            data: { order_id: orderId },
            success: function(response) {
                // Clear the loading state
                detailsRow.html('<td colspan="7"><table class="table table-sm"><thead><tr><th>Produit</th><th>Prix</th><th>Quantité</th><th>État</th><th>Total</th></tr></thead><tbody></tbody></table></td>');

                // Populate the table with response data
                var total = 0;
                response.data.forEach(function(com) {
                    total += com.prix * com.qtte;
                    detailsRow.find('tbody').append(
                        '<tr>' +
                            '<td>' +ss+ '</td>' +
                            '<td>' + com.prix + '</td>' +
                            '<td>' + com.qtte + '</td>' +
                            '<td>' + com.etat + '</td>' +
                            '<td>' + (com.prix * com.qtte) + '</td>' +
                        '</tr>'
                    );
                });

                // Append total row at the end
                detailsRow.find('tbody').append(
                    '<tr>' +
                        '<td colspan="3" class="text-end">Total</td>' +
                        '<td colspan="2">' + total + ' €</td>' +
                    '</tr>'
                );
            },
            error: function() {
                detailsRow.html('<td colspan="7" class="text-danger">Failed to load data. Please try again.</td>');
            }
        });
    });
});
</script>

    <script>
        $(document).ready(function() {
            $('.btn-toggle-products').on('click', function() {
                console.log('kk');
                var id = $(this).data('id');
                var productRow = $('.product-row[data-id="' + id + '"]');
                productRow.toggle(); // Affiche ou cache la ligne de produits
                
                $.ajax({
                    url: 'http://localhost:8000/lirenotif', // Assurez-vous que cette route est correcte
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}', // Inclure le token CSRF
                        id: id
                    },
                    success: function(response) {
                        // Vous pouvez personnaliser la mise à jour de l'interface utilisateur ici
                        console.log('response');
                       
                    },
                    error: function(xhr) {
                        // Affiche l'erreur si la requête échoue
                       
                    }
                });
            });
        });



        $(document).ready(function() {
            $('.btn-toggle-products5').on('click', function() {
                console.log('kk5');

                var id = $(this).data('id');
                
                $.ajax({
                    url: 'traiternotif', // Assurez-vous que cette route est correcte
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}', // Inclure le token CSRF
                        id: id
                    },
                    success: function(response) {
                        // Vous pouvez personnaliser la mise à jour de l'interface utilisateur ici
                       
                    },
                    error: function(xhr) {
                        // Affiche l'erreur si la requête échoue
                       
                    }
                });
            });
        });

    </script>

</body>
</html>