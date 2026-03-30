<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achat</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
          <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    @include("admin")
    <div class="row">
        <div class="col-md-2">

        </div>

        <div class="container mt-5 col-md-8">
            <div class="card p-4">
                <h2 class="text-center mb-4">Nouvelle Vente</h2>
                <hr>

                <form action="{{ route('Formventesecre') }}" method="POST">
                    @csrf
                    @if(session('fail'))
    <div class="alert alert-danger">
        {{ session('fail') }}
    </div>
                 @endif
                 @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
                 @endif
                    <div class="row">

                        <div class="form-group col-md-3">
                            <label for="produit">Produit</label>


                            <select id="produit" class="form-select" name="libelle"  style="width: 100%">
                                @foreach ($produits as $prod)
                                <option value="{{$prod->id}}">{{$prod->libelle}}</option>
                                
                                @endforeach

                            </select>
                        </div>

                        <div class="mb-3 col-md-3">
                            <label for="qtte" class="form-label"> Quantite</label>
                            <input type="text" class="form-control" id="qtte" name="qtte" placeholder="Entrer la quantite">
                        </div>
                        <div class="mb-3 col-md-3">
                            <label for="prix" class="form-label"> Prix vente</label>
                            <input type="number" class="form-control" id="prixv" name="prixv" placeholder="Entrer le prix de vente">
                        </div>


                        <div class="form-group col-md-3">
                            <label for="etat">État</label>
                            <select class="form-control" id="etat" name="etat" required>
                                <option  disabled selected>Choisir l'état</option>
                                <option value="occasion">produit d'Occasion</option>
                                <option value="neuve">Produit Neuve </option>

                            </select>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-12 col-md-4">
                            <button type="submit" class="btn btn-lg rounded-pill me-1" style="background-color: rgb(12, 165, 91)">Ajouter</button>
                            <button type="submit" class="btn btn-danger btn-lg rounded-pill ms-1" style="color: rgb(10, 9, 9)">Annuler</button>
                        </div>

                    </div>

                </form>
            </div>
        </div>
        <div class="col-md-4">

        </div>

    </div>
    <script>
        $(document).ready(function() {
            $('#produit').select2({
                placeholder: 'Select options',
                allowClear: true
            });
        });
    </script>

</body>
</html>
