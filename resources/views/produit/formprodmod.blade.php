<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorie</title>
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
            @if(session('successaddp'))
    <div class="alert alert-success">
        {{ session('successaddp') }}
    </div>
         @endif

         @if(session('failaddp'))
    <div class="alert alert-danger">
        {{ session('failaddp') }}
    </div>
         @endif
    <form action="{{route('modproduit')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="libelle" class="form-label">Libellé  </label>
                            <input type="text" class="form-control" id="libelle" value="{{ old('libelle', $produits->libelle) }}" name="libelle" placeholder="Entrer le libelle du produit">
                            <input value="{{$produits->id}}" type="text" class="form-control" id="id" hidden name="id">

                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="prix" class="form-label">Prix Exellent</label>
                            <input type="number" class="form-control" value="{{ old('prix', $produits->prix) }}" id="prix" name="prix" placeholder="Entrer le prix du produit">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="prix" class="form-label">Prix Bon</label>
                            <input type="number" class="form-control" value="{{ old('prixbon', $produits->prixbonetat) }}" id="prix" name="prixbon" placeholder="Entrer le prix du produit">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="etat" class="form-label">État du Produit</label>
                            <select class="form-select" name="etat" id="etat">
                                <option value="neuf" {{ old('etat', $produits->etat) == 'neuf' ? 'selected' : '' }}>Neuf</option>
                                <option value="bon" {{ old('etat', $produits->etat) == 'bon' ? 'selected' : '' }}>Occasion</option>
                                <option value="correct" {{ old('etat', $produits->etat) == 'correct' ? 'selected' : '' }}>État correct</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="prix" class="form-label">Prix Correct</label>
                            <input type="number" class="form-control" value="{{ old('prixcorrect', $produits->prixetatcorrect) }}" id="prix" name="prixcorrect" placeholder="Entrer le prix du produit">
                        </div>
                        </div>
                        <div>
                            <label  for="caracteristique" class="form-label">Caractéristiques</label>

            <select id="caracteristique" class="form-select" name="caracteristique[]" multiple="multiple" style="width: 100%">
                @foreach($options as $option)
                    <option value="{{ $option->id }}" {{ $produits->caracteristique->contains('id', $option->id) ? 'selected' : '' }}>{{ $option->nomCaract }}</option>
                @endforeach
            </select>
            </div>
            <div class="row" class="mt-3">
                        <div class="mb-3 col-md-6">
                            <label for="souscategorie" class="form-label">Sous Catégorie</label>
                            <select class="form-select" name="souscategorie" id="souscategorie">

                                @foreach($souscategories as $optionas)
                                    <option value="{{ $optionas->id }}" {{ $optionas->id == $produits->souscategorie_id ? 'selected' : '' }}>{{ $optionas->categorie->nomCat ." " }}||{{" ".  $optionas->nomsubCat }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="qtte" class="form-label">Qtte Exellent en stock</label>
                            <input type="number" class="form-control" id="qtte" name="qtte" value="{{$produits->qttestock}}" placeholder="Entrer la quantite en stock">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="qtte" class="form-label">Qtte Bon en stock</label>
                            <input type="number" class="form-control" id="qtte" name="qttebon" value="{{$produits->qttestockbonetat}}" placeholder="Entrer la quantite en stock">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="qtte" class="form-label">Qtte Correct en stock</label>
                            <input type="number" class="form-control" id="qtte" name="qttecorrect" value="{{$produits->qttestocketatcorrect}}" placeholder="Entrer la quantite en stock">
                        </div>
                        </div>

                        <div class="form-outline" data-mdb-input-init>
                        <label class="form-label" for="description">Description</label>
    <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $produits->description) }}</textarea>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image Gallery</label><br>

        <!-- Galerie des images actuelles -->
        @if($produits->images && $produits->images->count() > 0)
            <div class="mb-3">
                <h6>Images actuelles du produit :</h6>
                <div class="row" id="current-images-gallery">
                    @foreach($produits->images as $image)
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <img src="{{ asset('photos/' . urlencode($image->nom)) }}" alt="Image actuelle" class="card-img-top" style="height: 150px; object-fit: cover;">
                                <div class="card-body p-2">
                                    <button type="button" class="btn btn-danger btn-sm remove-current-image" data-image-id="{{ $image->id }}">
                                        <i class="fas fa-trash"></i> Supprimer
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="form-check">
            <input class="form-check-input" type="radio" name="image_source" id="upload_new" value="upload" checked>
            <label class="form-check-label" for="upload_new">
                Télécharger de nouvelles images
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="image_source" id="select_existing" value="select">
            <label class="form-check-label" for="select_existing">
                Sélectionner des images existantes du dossier img
            </label>
        </div>

        <div id="upload_section" class="mt-3">
            <input type="file" name="image[]" id="image-upload" class="form-control" multiple accept="image/*">
            <small class="text-muted">Sélectionnez une ou plusieurs nouvelles images</small>

            <!-- Aperçu des nouvelles images -->
            <div id="new-images-preview" class="row mt-3" style="display: none;">
                <h6>Aperçu des nouvelles images :</h6>
            </div>
        </div>

        <div id="select_section" class="mt-3" style="display: none;">
            <select name="existing_images[]" id="existing-images-select" class="form-select" multiple style="width: 100%">
                @php
                    $imgFiles = glob(public_path('img') . '/*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);
                    $imgFiles = array_map('basename', $imgFiles);
                @endphp
                @foreach($imgFiles as $imgFile)
                    <option value="{{ $imgFile }}">{{ $imgFile }}</option>
                @endforeach
            </select>
            <small class="text-muted">Sélectionnez une ou plusieurs images existantes</small>

            <!-- Aperçu des images existantes sélectionnées -->
            <div id="existing-images-preview" class="row mt-3" style="display: none;">
                <h6>Aperçu des images existantes sélectionnées :</h6>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <label for="thumbnails" class="form-label">Miniatures du Produit</label><br>

        <!-- Galerie des miniatures actuelles -->
        @if($produits->images && $produits->images->where('type', 'thumbnail')->count() > 0)
            <div class="mb-3">
                <h6>Miniatures actuelles du produit :</h6>
                <div class="row" id="current-thumbnails-gallery">
                    @foreach($produits->images->where('type', 'thumbnail') as $thumbnail)
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <img src="{{ asset('photos/' . urlencode($thumbnail->nom)) }}" alt="Miniature actuelle" class="card-img-top" style="height: 100px; object-fit: cover;">
                                <div class="card-body p-2">
                                    <button type="button" class="btn btn-danger btn-sm remove-current-thumbnail" data-image-id="{{ $thumbnail->id }}">
                                        <i class="fas fa-trash"></i> Supprimer
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="form-check">
            <input class="form-check-input" type="radio" name="thumbnail_source" id="upload_new_thumbnails" value="upload" checked>
            <label class="form-check-label" for="upload_new_thumbnails">
                Télécharger de nouvelles miniatures
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="thumbnail_source" id="select_existing_thumbnails" value="select">
            <label class="form-check-label" for="select_existing_thumbnails">
                Sélectionner des miniatures existantes du dossier img
            </label>
        </div>

        <div id="thumbnail_upload_section" class="mt-3">
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" name="add_to_existing_thumbnails" id="add_to_existing_thumbnails" value="1">
                <label class="form-check-label" for="add_to_existing_thumbnails">
                    Ajouter aux miniatures existantes (sinon remplacer)
                </label>
            </div>
            <input type="file" name="thumbnails[]" id="thumbnail-upload" class="form-control" multiple accept="image/*">
            <small class="text-muted">Sélectionnez une ou plusieurs nouvelles miniatures</small>

            <!-- Aperçu des nouvelles miniatures -->
            <div id="new-thumbnails-preview" class="row mt-3" style="display: none;">
                <h6>Aperçu des nouvelles miniatures :</h6>
            </div>
        </div>

        <div id="thumbnail_select_section" class="mt-3" style="display: none;">
            <select name="existing_thumbnails[]" id="existing-thumbnails-select" class="form-select" multiple style="width: 100%">
                @php
                    $imgFiles = glob(public_path('img') . '/*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);
                    $imgFiles = array_map('basename', $imgFiles);
                @endphp
                @foreach($imgFiles as $imgFile)
                    <option value="{{ $imgFile }}">{{ $imgFile }}</option>
                @endforeach
            </select>
            <small class="text-muted">Sélectionnez une ou plusieurs miniatures existantes</small>

            <!-- Aperçu des miniatures existantes sélectionnées -->
            <div id="existing-thumbnails-preview" class="row mt-3" style="display: none;">
                <h6>Aperçu des miniatures existantes sélectionnées :</h6>
            </div>
        </div>
    </div>

                        <div class="row">
                            <div class="col-md-5"></div>
                            <div class="col-md-7">
                                <button type="submit" class="btn btn-lg rounded-pill me-3" style="background-color: rgb(12, 165, 91); border: none;">Modifier le produit</button>
                                <button type="reset" class="btn btn-danger btn-lg rounded-pill ms-3" style="border: none;">Réinitialiser</button>
                            </div>

                        </div>
        </form></div>

        <div class="col-md-3">

</div></div>

     <script>
        $(document).ready(function() {
            $('#caracteristique').select2({
                placeholder: 'Select options',
                allowClear: true
            });

            // Gestionnaire pour les boutons radio des images principales
            $('input[name="image_source"]').change(function() {
                if ($(this).val() === 'upload') {
                    $('#upload_section').show();
                    $('#select_section').hide();
                } else if ($(this).val() === 'select') {
                    $('#upload_section').hide();
                    $('#select_section').show();
                }
            });

            // Gestionnaire pour les boutons radio des miniatures
            $('input[name="thumbnail_source"]').change(function() {
                if ($(this).val() === 'upload') {
                    $('#thumbnail_upload_section').show();
                    $('#thumbnail_select_section').hide();
                    $('#existing-thumbnails-preview').hide();
                } else if ($(this).val() === 'select') {
                    $('#thumbnail_upload_section').hide();
                    $('#thumbnail_select_section').show();
                    $('#new-thumbnails-preview').hide();
                }
            });

            // Aperçu des nouvelles images téléchargées
            $('#image-upload').change(function() {
                const files = this.files;
                const previewContainer = $('#new-images-preview');
                previewContainer.empty();

                if (files.length > 0) {
                    previewContainer.append('<h6>Aperçu des nouvelles images :</h6>');
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
                                const removeBtn = $('<button type="button" class="btn btn-danger btn-sm remove-new-image" data-index="' + i + '"><i class="fas fa-trash"></i> Supprimer</button>');

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

            // Supprimer une nouvelle image de l'aperçu
            $(document).on('click', '.remove-new-image', function() {
                const index = $(this).data('index');
                const input = $('#image-upload')[0];
                const dt = new DataTransfer();

                for (let i = 0; i < input.files.length; i++) {
                    if (i !== index) {
                        dt.items.add(input.files[i]);
                    }
                }

                input.files = dt.files;
                $('#image-upload').trigger('change');
            });

            // Aperçu des images existantes sélectionnées
            $('#existing-images-select').change(function() {
                const selectedOptions = $(this).val();
                const previewContainer = $('#existing-images-preview');
                previewContainer.empty();

                if (selectedOptions && selectedOptions.length > 0) {
                    previewContainer.append('<h6>Aperçu des images existantes sélectionnées :</h6>');
                    previewContainer.show();

                    selectedOptions.forEach(function(imgName) {
                        const col = $('<div class="col-md-3 mb-3"></div>');
                        const card = $('<div class="card"></div>');
                        const img = $('<img class="card-img-top" style="height: 150px; object-fit: cover;">').attr('src', '{{ asset("img/") }}/' + imgName);
                        const body = $('<div class="card-body p-2"></div>');
                        const removeBtn = $('<button type="button" class="btn btn-danger btn-sm remove-existing-preview" data-img="' + imgName + '"><i class="fas fa-trash"></i> Supprimer</button>');

                        body.append(removeBtn);
                        card.append(img).append(body);
                        col.append(card);
                        previewContainer.append(col);
                    });
                } else {
                    previewContainer.hide();
                }
            });

            // Supprimer une image existante de l'aperçu
            $(document).on('click', '.remove-existing-preview', function() {
                const imgName = $(this).data('img');
                const select = $('#existing-images-select');
                const currentValues = select.val() || [];
                const newValues = currentValues.filter(value => value !== imgName);
                select.val(newValues).trigger('change');
            });

            // Aperçu des nouvelles miniatures téléchargées
            $('#thumbnail-upload').change(function() {
                const files = this.files;
                const previewContainer = $('#new-thumbnails-preview');
                previewContainer.empty();

                if (files.length > 0) {
                    previewContainer.append('<h6>Aperçu des nouvelles miniatures :</h6>');
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
                                const removeBtn = $('<button type="button" class="btn btn-danger btn-sm remove-new-thumbnail" data-index="' + i + '"><i class="fas fa-trash"></i> Supprimer</button>');

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

            // Supprimer une nouvelle miniature de l'aperçu
            $(document).on('click', '.remove-new-thumbnail', function() {
                const index = $(this).data('index');
                const input = $('#thumbnail-upload')[0];
                const dt = new DataTransfer();

                for (let i = 0; i < input.files.length; i++) {
                    if (i !== index) {
                        dt.items.add(input.files[i]);
                    }
                }

                input.files = dt.files;
                $('#thumbnail-upload').trigger('change');
            });

            // Aperçu des miniatures existantes sélectionnées
            $('#existing-thumbnails-select').change(function() {
                const selectedOptions = $(this).val();
                const previewContainer = $('#existing-thumbnails-preview');
                previewContainer.empty();

                if (selectedOptions && selectedOptions.length > 0) {
                    previewContainer.append('<h6>Aperçu des miniatures existantes sélectionnées :</h6>');
                    previewContainer.show();

                    selectedOptions.forEach(function(imgName) {
                        const col = $('<div class="col-md-3 mb-3"></div>');
                        const card = $('<div class="card"></div>');
                        const img = $('<img class="card-img-top" style="height: 100px; object-fit: cover;">').attr('src', '{{ asset("img/") }}/' + imgName);
                        const body = $('<div class="card-body p-2"></div>');
                        const removeBtn = $('<button type="button" class="btn btn-danger btn-sm remove-existing-thumbnail-preview" data-img="' + imgName + '"><i class="fas fa-trash"></i> Supprimer</button>');

                        body.append(removeBtn);
                        card.append(img).append(body);
                        col.append(card);
                        previewContainer.append(col);
                    });
                } else {
                    previewContainer.hide();
                }
            });

            // Supprimer une miniature existante de l'aperçu
            $(document).on('click', '.remove-existing-thumbnail-preview', function() {
                const imgName = $(this).data('img');
                const select = $('#existing-thumbnails-select');
                const currentValues = select.val() || [];
                const newValues = currentValues.filter(value => value !== imgName);
                select.val(newValues).trigger('change');
            });

            // Supprimer une image actuelle (AJAX)
            $(document).on('click', '.remove-current-image', function() {
                const imageId = $(this).data('image-id');
                const card = $(this).closest('.col-md-3');

                if (confirm('Êtes-vous sûr de vouloir supprimer cette image ?')) {
                    $.ajax({
                        url: '{{ route("delete_image", ":id") }}'.replace(':id', imageId),
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            card.remove();
                            alert('Image supprimée avec succès.');
                        },
                        error: function() {
                            alert('Erreur lors de la suppression de l\'image.');
                        }
                    });
                }
            });

            // Supprimer une miniature actuelle (AJAX)
            $(document).on('click', '.remove-current-thumbnail', function() {
                const imageId = $(this).data('image-id');
                const card = $(this).closest('.col-md-3');

                if (confirm('Êtes-vous sûr de vouloir supprimer cette miniature ?')) {
                    $.ajax({
                        url: '{{ route("delete_image", ":id") }}'.replace(':id', imageId),
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            card.remove();
                            alert('Miniature supprimée avec succès.');
                        },
                        error: function() {
                            alert('Erreur lors de la suppression de la miniature.');
                        }
                    });
                }
            });

            // Gestionnaire pour la case à cocher "Ajouter aux miniatures existantes"
            $('#add_to_existing_thumbnails').change(function() {
                if ($(this).is(':checked')) {
                    $('#thumbnail_upload_section .text-muted').text('Sélectionnez une ou plusieurs nouvelles miniatures à ajouter');
                } else {
                    $('#thumbnail_upload_section .text-muted').text('Sélectionnez une ou plusieurs nouvelles miniatures (remplacera les existantes)');
                }
            });
        });
    </script>



</body>
</html>