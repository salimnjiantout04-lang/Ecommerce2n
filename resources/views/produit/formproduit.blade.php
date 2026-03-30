<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produit</title>
    <!-- Fonts -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

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
            <div class="col-md-3">

            </div>

            <div class="container mt-5 col-md-6">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

         @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
         @endif

         @if(session('fail'))
            <div class="alert alert-danger">
                {{ session('fail') }}
            </div>
         @endif

         @if(session('upload_warnings'))
            <div class="alert alert-warning">
                <strong>Attention - Problèmes d'upload d'images :</strong>
                <ul class="mb-0 mt-2">
                    @foreach(session('upload_warnings') as $warning)
                        <li>{{ $warning }}</li>
                    @endforeach
                </ul>
            </div>
         @endif

    <form action="{{route('AddProduit')}}" method="POST" enctype="multipart/form-data">
            @csrf



                        <div>
                            <label for="libelle" class="form-label">Libellé </label>
                            <input type="text" class="form-control" id="libelle" name="libelle" placeholder="Entrer le libelle du produit" required>
                        </div>
                        {{-- <div class="mb-3 col-md-6">
                            <label for="prix" class="form-label">Prix</label>
                            <input type="number" class="form-control" id="prix" name="prix" placeholder="Entrer le prix du produit" required>
                        </div> --}}
                        <br>
                        <div>
                            <label for="caracteristique" class="form-label">Caractéristiques</label>
                            <select class="form-control" id="caracteristique" name="caracteristique[]" multiple="multiple" required>
                                @foreach($caracteristique as $caract)
                                    <option value="{{ $caract->id }}">{{ $caract->nomCaract }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>

                        <div>
                            <label for="souscategorie" class="form-label">Sous Catégorie</label>
                            <select class="form-control" id="souscategorie" name="souscategorie" required>
                                @foreach($souscategories as $souscat)
                                    <option value="{{ $souscat->id }}">{{ $souscat->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                            <div class="row">

                                <div class="mb-3 col-md-3">
                                    <label for="" class="form-label" name="excellant">Quantité Neuve</label>
                                    <input type="number" class="form-control" id="qtte" name="excellantqtte" required placeholder="Entrer la quantite en stock">
                                    <input type="number" class="form-control" id="qtte" name="excellantprix" required placeholder="Entrer le prix">
                                </div>&nbsp;
                                <div class="mb-3 col-md-3">
                                    <label for="qtte" class="form-label" name="bon">Quantité  Occasion</label>
                                    <input type="number" class="form-control" id="qtte" name="bonqtte"  placeholder="Entrer la quantite en stock">
                                    <input type="number" class="form-control" id="qtte" name="bonprix" placeholder="Entrer le prix">
                                </div>&nbsp;
                                <div class="mb-3 col-md-3">
                                    <label for="qtte" class="form-label">Quantité État Correct</label>
                                    <input type="number" class="form-control" id="qtte" name="correctqtte" placeholder="Entrer la quantite en stock">
                                    <input type="number" class="form-control" id="qtte" name="correctprix" placeholder="Entrer le prix">
                                </div>&nbsp;

                                <div class="mb-3 col-md-3">
                                    <label for="qtte" class="form-label">Total :</label><div id="output"></div>

                                </div>
                            </div>

                        <div class="form-outline" data-mdb-input-init>
                            <label class="form-label" for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                        </div> <br>

                        <div>
                            <label for="etat" class="form-label">État du Produit</label>
                            <select class="form-control" id="etat" name="etat" required>
                                <option value="neuf">Neuf</option>
                                <option value="bon">Occasion</option>
                                <option value="correct">État correct</option>
                            </select>
                        </div>
                        <br>
           <div class="mb-3">
                    <label for="image" class="form-label">Image Principale</label><br>
                    <input type="file" name="image[]" id="image-upload-add" class="form-control" multiple accept="image/*">
                    <small class="text-muted">Sélectionnez une ou plusieurs images principales pour le produit</small>

                    <!-- Aperçu des images sélectionnées -->
                    <div id="images-preview-add" class="row mt-3" style="display: none;">
                        <h6>Aperçu des images sélectionnées :</h6>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="thumbnails" class="form-label">Miniatures du Produit</label><br>
                    <input type="file" name="thumbnails[]" id="thumbnail-upload-add" class="form-control" multiple accept="image/*">
                    <small class="text-muted">Sélectionnez une ou plusieurs miniatures pour le produit</small>

                    <!-- Aperçu des miniatures sélectionnées -->
                    <div id="thumbnails-preview-add" class="row mt-3" style="display: none;">
                        <h6>Aperçu des miniatures sélectionnées :</h6>
                    </div>
                </div>

                        <div class="row">
                            <div class="col-md-5"></div>
                            <div class="col-md-7">
                                <button type="submit" class="btn btn-lg rounded-pill me-3" style="background-color: rgb(12, 165, 91)">Soumettre</button>
                                <a href="{{ route('produits') }}" class="btn btn-danger btn-lg rounded-pill ms-3" style="color: rgb(10, 9, 9)">Annuler</a>
                            </div>

                        </div>
        </form></div>

        <div class="col-md-3">

</div></div>

     <script>
        $(document).ready(function() {
            $('#caracteristique').select2({
                placeholder: 'Rechercher une ou plusieurs caractéristiques',
                allowClear: true
            });

            $('#souscategorie').select2({
                placeholder: 'Rechercher une sous catégorie',
                allowClear: true
            });

            // Aperçu des images sélectionnées pour l'ajout
            $('#image-upload-add').change(function() {
                const files = this.files;
                const previewContainer = $('#images-preview-add');
                previewContainer.empty();

                if (files.length > 0) {
                    previewContainer.append('<h6>Aperçu des images sélectionnées :</h6>');
                    previewContainer.show();

                    for (let i = 0; i < files.length; i++) {
                        const file = files[i];
                        if (file.type.startsWith('image/')) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                const col = $('<div class="col-md-3 mb-3"></div>');
                                const card = $('<div class="card"></div>');
                                const img = $('<img class="card-img-top" style="height: 150px; object-fit: cover;">').attr('src', e.target.result);
                                const body = $('<div class="card-body p-2"></div>');
                                const removeBtn = $('<button type="button" class="btn btn-danger btn-sm remove-preview-add" data-index="' + i + '"><i class="fas fa-trash"></i> Supprimer</button>');

                                body.append(removeBtn);
                                card.append(img).append(body);
                                col.append(card);
                                previewContainer.append(col);
                            };
                            reader.readAsDataURL(file);
                        }
                    }
                } else {
                    previewContainer.hide();
                }
            });

            // Supprimer une image de l'aperçu d'ajout
            $(document).on('click', '.remove-preview-add', function() {
                const index = $(this).data('index');
                const input = $('#image-upload-add')[0];
                const dt = new DataTransfer();

                for (let i = 0; i < input.files.length; i++) {
                    if (i !== index) {
                        dt.items.add(input.files[i]);
                    }
                }

                input.files = dt.files;
                $('#image-upload-add').trigger('change');
            });

            // Aperçu des miniatures sélectionnées pour l'ajout
            $('#thumbnail-upload-add').change(function() {
                const files = this.files;
                const previewContainer = $('#thumbnails-preview-add');
                previewContainer.empty();

                if (files.length > 0) {
                    previewContainer.append('<h6>Aperçu des miniatures sélectionnées :</h6>');
                    previewContainer.show();

                    for (let i = 0; i < files.length; i++) {
                        const file = files[i];
                        if (file.type.startsWith('image/')) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                const col = $('<div class="col-md-3 mb-3"></div>');
                                const card = $('<div class="card"></div>');
                                const img = $('<img class="card-img-top" style="height: 100px; object-fit: cover;">').attr('src', e.target.result);
                                const body = $('<div class="card-body p-2"></div>');
                                const removeBtn = $('<button type="button" class="btn btn-danger btn-sm remove-thumbnail-preview-add" data-index="' + i + '"><i class="fas fa-trash"></i> Supprimer</button>');

                                body.append(removeBtn);
                                card.append(img).append(body);
                                col.append(card);
                                previewContainer.append(col);
                            };
                            reader.readAsDataURL(file);
                        }
                    }
                } else {
                    previewContainer.hide();
                }
            });

            // Supprimer une miniature de l'aperçu d'ajout
            $(document).on('click', '.remove-thumbnail-preview-add', function() {
                const index = $(this).data('index');
                const input = $('#thumbnail-upload-add')[0];
                const dt = new DataTransfer();

                for (let i = 0; i < input.files.length; i++) {
                    if (i !== index) {
                        dt.items.add(input.files[i]);
                    }
                }

                input.files = dt.files;
                $('#thumbnail-upload-add').trigger('change');
            });
        });
    </script>



</body>
</html>
