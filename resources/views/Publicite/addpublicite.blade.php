<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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

    <div class="container my-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Ajouter une publicité</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('addpublicite') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="titre" class="form-label">Titre <span class="text-danger">*</span></label>
                        <input type="text" name="titre" id="titre" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="prix_vente" class="form-label">Prix de vente (FCFA) <span class="text-danger">*</span></label>
                            <input type="number" name="prix_vente" id="prix_vente" class="form-control" min="0" step="0.01" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="reduction" class="form-label">Réduction (%)</label>
                            <input type="number" name="reduction" id="reduction" class="form-control" min="0" max="100" value="0">
                        </div>
                    </div>

                    <!-- Aperçu du prix -->
                    <div class="mb-3" id="prix-apercu" style="display: none;">
                        <div class="alert alert-info">
                            <h5>Aperçu des prix :</h5>
                            <div class="d-flex align-items-center gap-3">
                                <span style="text-decoration: line-through; color: red; font-size: 1.2em;" id="ancien-prix"></span>
                                <span style="color: blue; font-weight: bold; font-size: 1.5em;" id="nouveau-prix"></span>
                                <span class="badge bg-success" id="badge-reduction" style="font-size: 1em;"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="date_debut" class="form-label">Date de début <span class="text-danger">*</span></label>
                            <input type="date" name="date_debut" id="date_debut" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="date_fin" class="form-label">Date de fin <span class="text-danger">*</span></label>
                            <input type="date" name="date_fin" id="date_fin" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="actif" class="form-label">Statut</label>
                        <select name="actif" id="actif" class="form-select">
                            <option value="1">Actif</option>
                            <option value="0">Inactif</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image <span class="text-danger">*</span></label>
                        <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
                        <small class="text-muted">Formats acceptés: JPG, PNG, GIF</small>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-plus-circle"></i> Ajouter la publicité
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#produit').select2({
                placeholder: 'Choisir image',
                allowClear: true
            });

            // Fonction pour formater les prix
            function formatPrix(prix) {
                return new Intl.NumberFormat('fr-FR').format(prix) + ' FCFA';
            }

            // Calculer et afficher l'aperçu des prix
            function calculerApercu() {
                var prix = parseFloat($('#prix_vente').val()) || 0;
                var reduction = parseFloat($('#reduction').val()) || 0;

                if (prix > 0) {
                    if (reduction > 0) {
                        // Afficher l'aperçu avec réduction
                        var prixFinal = prix - (prix * reduction / 100);

                        $('#ancien-prix').text(formatPrix(prix));
                        $('#nouveau-prix').text(formatPrix(prixFinal));
                        $('#badge-reduction').text('-' + reduction + '%');
                        $('#prix-apercu').slideDown();
                    } else {
                        // Pas de réduction, masquer l'aperçu
                        $('#prix-apercu').slideUp();
                    }
                } else {
                    $('#prix-apercu').slideUp();
                }
            }

            // Écouter les changements sur les champs prix et réduction
            $('#prix_vente, #reduction').on('input', calculerApercu);
        });
    </script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
</body>
</html>
