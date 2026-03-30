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
            <div class="col-md-4">

            </div>
    
            <div class="container mt-5 col-md-4">
                <div class="card p-4">
                    <h2 class="text-center mb-4">Nouvel Achat</h2>
                    <hr>

                    <form action="/formachat2" method="POST">
                @csrf
                <div class="form-group">
                    <label for="produit">Produit</label>
                   

                    <select id="produit" class="form-select" name="libelle"  style="width: 100%" required>
                        @foreach ($produits as $prod)
                        <option value="{{$prod->id}}">{{$prod->libelle}}</option>
                        @endforeach
                       
                    </select>
                </div>
                <div class="row">

                <div class="form-group col-md-6">
                    <label for="prix">Prix Achat</label>
                    <input type="number" class="form-control" id="prix" name="prix" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="prix">Prix Vente</label>
                    <input type="number" class="form-control" id="prixv" name="prixv" required>
                </div>
            </div>
                <div class="form-group">
                    <label for="quantitestock">Quantité en Stock</label>
                    <input type="number" class="form-control" id="qtte" name="qtte" required>
                </div>

                <div class="form-group">
                    <label for="etat">État</label>
                    <select class="form-control" id="etat" name="etat" required>
                        <option  disabled selected>Choisir l'état</option>
                        <option value="Occasion">Occasion</option>
                        <option value="Neuve"> Etat Neuve </option>
                        <!--option value="Correct">État correct</!--option-->
                    </select>
                </div>
                

                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-lg rounded-pill me-1" style="background-color: rgb(12, 165, 91)">Ajouter</button>
                        <button type="reset" class="btn btn-danger btn-lg rounded-pill ms-1" style="color: rgb(10, 9, 9)">Annuler</button>
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
      





@php
     $produitt=session()->get('cartachat', []);
@endphp

<div class="container">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
         @endif 
    <table class="table ms-5 mb-5 mt-5">
      <thead>
        <tr>
          <th>Produit</th>
          <th>Quantité</th>
          <th>Prix</th>
          <th>Prix Vente</th>

          <th>État</th>

          <th>Total</th>

        </tr>
      </thead>
      <tbody>
        @foreach ($produitt as $item)

        <tr>
            <td>{{ $item['libelle'] }}</td>
            <td>{{ $item['qtte'] }}</td>
            <td>{{ $item['prix'] }}</td>
            <td>{{ $item['prixv'] }}</td>
            <td>{{ $item['etat'] }}</td>
            <td>{{ $item['prix'] * $item['qtte'] }}</td>
        </tr>
        @endforeach
<tr>
    <td></td><td></td><td></td><td></td><td></td>
    <td>          <a href="/ajoutlivraison" class="btn btn-success btn-lg rounded-pill me-3" style=" text-decoration: none; color:white"> Valider </a>
    </td>
</tr>
       
      </tbody>
    </table>

  </div>
  




      
      
    </div>
    </body> 
</html>
