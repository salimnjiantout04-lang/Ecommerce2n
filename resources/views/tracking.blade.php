<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suivi de Commande - 2NCORPORATE</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo2n.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('app.css') }}">
    <link rel="stylesheet" href="{{ asset('responsive.css') }}">
</head>
<body>
    @include('header')

    <div class="container-fluid py-5">
        <div class="row">
            <div class="col-12">
                <div class="text-center mb-5">
                    <h1 class="display-4 text-primary mb-3">
                        <i class="fas fa-truck me-3"></i>
                        Suivi de Commande
                    </h1>
                    <p class="lead text-muted">Suivez l'état de vos commandes en temps réel</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body p-4">
                        <form id="trackingForm">
                            <div class="mb-3">
                                <label for="trackingNumber" class="form-label">
                                    <i class="fas fa-hashtag me-2"></i>
                                    Numéro de suivi
                                </label>
                                <input type="text"
                                       class="form-control form-control-lg"
                                       id="trackingNumber"
                                       placeholder="Entrez votre numéro de suivi"
                                       required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg w-100">
                                <i class="fas fa-search me-2"></i>
                                Suivre ma commande
                            </button>
                        </form>

                        <div id="trackingResult" class="mt-4" style="display: none;">
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i>
                                Fonctionnalité en développement. Bientôt disponible !
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="fas fa-question-circle me-2"></i>
                            Comment obtenir un numéro de suivi ?
                        </h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <i class="fas fa-check text-success me-2"></i>
                                Après validation de votre commande, vous recevrez un email avec votre numéro de suivi
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check text-success me-2"></i>
                                Vous pouvez également retrouver ce numéro dans votre compte client
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check text-success me-2"></i>
                                Contactez notre service client si vous ne trouvez pas votre numéro
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('trackingForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const trackingNumber = document.getElementById('trackingNumber').value.trim();

            if (trackingNumber) {
                document.getElementById('trackingResult').style.display = 'block';
                // Here you would typically make an AJAX call to track the order
                // For now, we'll just show the development message
            }
        });
    </script>

    @include('footer1')
</body>
</html>
