<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset ('bootstrap/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('bootstrap/assets/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('bootstrap/assets/DataTables/Buttons-1.5.6/css/buttons.bootstrap4.min.css') }}">
    <title>liste de achats</title>
</head>

<body>

    @include("admin")
    <div class="row ms-5 ps-5">
        <div class="col ms-5 ps-5">
            <button class="btn btn-primary btn-lg rounded-pill d-inline-block ms-5"  type="button">
                <a href="/formachat" style="text-decoration: none; color:inherit;">Nouvel Achat</a>
            </button>
        </div>
    </div>
<div class="d-flex ms-5 ps-5" >

    
    <div class="col-sm-9 ms-5 ps-5" id="julio">
        <div class="card ms-5 ps-5" style=" border-style: none;">
            <div class="card-body ms-5 ps-5" >

                
            <table id="table2" class="table table-striped table-bordered">
        <thead>
            <tr>
                    <th>Code</th>
                    <th>Achat</th>
                    <th>Produit</th>
                    <th>Prix Vente</th>
                    <th>Prix Achat</th>
                    <th>Quantité</th>
                    <th>Date</th>





                
                
            </tr>
        </thead>
        <tbody>
            @php
                $i=0;
            @endphp
        @foreach($produits as $produit)
           @php
              $i++;
          @endphp
        <tr style=' border:black solid 2px; width:1000px;'>
            <td style='font-size: 15px;'>{{$i}}</td>

        <td style='font-size: 15px;'>P00{{$produit->achat_id}}</td>
        <td style='font-size: 15px;'>{{$produit->produit_name}}</td>
        <td style='font-size: 15px;'>{{$produit->prixv}} FCFA</td>
        <td style='font-size: 15px;'>{{$produit->prixa}} FCFA</td>

        <td style='font-size: 15px;'>{{$produit->qtte}}</td>
        <td style='font-size: 15px;'>{{$produit->created_at}}</td>

                
        @endforeach

       
    
        
        
        </tr>
  
        </tbody>
    </table>
            </div>
        </div>
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

    <script>
        $(document).ready(function() {
            var table = $('#table2').DataTable( {
               
                dom: 
                "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu:[
                    [5,10,25,50,100,-1],
                    [5,10,25,50,100,"All"]
                ]
            } );
        
            table2.buttons().container()
                .appendTo( '#table_wrapper .col-md-5:eq(0)' );
        } );
    </script>

    </div>
</body>
