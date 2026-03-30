<!DOCTYPE html> 
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorie</title>
    
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .btn-custom {
            background-color: rgb(12, 165, 91);
            color: white;
        }
        label, input, select {
        font-size: 1.2rem; /* Taille augmentée */
    }
    </style>
</head>
<body>
    @include("admin")
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4">
                <h2 class="text-center mb-4">Nouvelle sous-catégorie</h2>
                <hr>
                
                <!-- Formulaire de sous-catégorie -->
                <form action="{{ route('AddSousCategorie') }}" method="POST">
                    @csrf
                    @if(session('failcat'))
                        <div class="alert alert-danger">
                            {{ session('failcat') }}
                        </div>
                    @endif  
                    @if(session('sucesscat'))
                        <div class="alert alert-success">
                            {{ session('sucesscat') }}
                        </div>
                    @endif   

                    <!-- Sélection de la catégorie -->
                    <div class="mb-3">
                        <label for="categorie" class="form-label">Catégorie</label>
                        <select id="categorie" class="form-select" name="categorie" style="width: 100%;">
                            <option value="" disabled selected></option>
                            @foreach($categories as $option)
                                <option value="{{ $option->id }}">{{ $option->nomCat }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    
                    <!-- Champ texte pour sous-catégorie -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Sous-catégorie</label>
                        <input type="text" class="form-control" id="name" name="souscategorie" placeholder="Entrez le nom de la sous-catégorie">
                    </div>

                    <!-- Boutons d'action -->
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-lg rounded-pill me-1" style="background-color: rgb(12, 165, 91)">Ajouter</button>
                        <button type="submit" class="btn btn-danger btn-lg rounded-pill ms-1" style="color: rgb(10, 9, 9)">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Initialisation de Select2 -->
<script>
    $(document).ready(function() {
        $('#categorie').select2({
            placeholder: 'Rechercher une catégorie',
            allowClear: true
        });
    });
</script>

</body>
</html>




