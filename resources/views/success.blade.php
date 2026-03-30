@php
use App\Models\Commandenv;
@endphp
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande Validée - 2N SHOP</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo2n.png') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-color: #0a1c3a;
            --secondary-color: #1a2d4f;
            --accent-color: #25D366;
            --text-dark: #21293c;
            --text-gray: #86878b;
            --text-light: #ffffff;
            --border-color: #e5e5e5;
            --bg-light: #f8f9fa;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
            --info-color: #17a2b8;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            color: var(--text-dark);
            background: linear-gradient(135deg, #ffffff );
            line-height: 1.6;
            font-size: 15px;
            min-height: 100vh;
           
        }

        .success-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px 0 ;
            margin-top: 40px;
        }

        .success-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .success-header h1 {
            font-size: 32px;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .success-header p {
            color: var(--text-gray);
            font-size: 16px;
        }

        .success-card {
            background: white;
            border-radius: 12px;
            padding: 50px 40px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
            text-align: center;
            margin-bottom: 30px;
        }

        .success-icon {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: var(--success-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 60px;
            margin: 0 auto 30px;
            animation: scaleIn 0.5s ease;
        }

        @keyframes scaleIn {
            from {
                transform: scale(0);
            }
            to {
                transform: scale(1);
            }
        }

        .success-title {
            font-size: 32px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 20px;
        }

        .success-message {
            color: var(--text-gray);
            font-size: 16px;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .order-number {
            background: var(--bg-light);
            padding: 20px 30px;
            border-radius: 8px;
            display: inline-block;
            margin-bottom: 30px;
            border-left: 4px solid var(--success-color);
        }

        .order-number strong {
            color: var(--primary-color);
            font-size: 20px;
        }

        .success-details {
            background: var(--bg-light);
            border-radius: 8px;
            padding: 30px;
            margin-bottom: 30px;
            text-align: left;
        }

        .success-details h3 {
            font-size: 18px;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .success-details h3 i {
            color: var(--primary-color);
        }

        .detail-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid var(--border-color);
        }

        .detail-item:last-child {
            border-bottom: none;
        }

        .detail-label {
            font-weight: 600;
            color: var(--text-dark);
        }

        .detail-value {
            color: var(--text-gray);
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-action {
            padding: 14px 30px;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: var(--text-light);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(10, 28, 58, 0.3);
        }

        .btn-secondary {
            background: white;
            border: 2px solid var(--border-color);
            color: var(--text-dark);
        }

        .btn-secondary:hover {
            background: var(--bg-light);
            border-color: var(--text-dark);
        }

        .next-steps {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
        }

        .next-steps h3 {
            font-size: 20px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 20px;
            text-align: center;
        }

        .steps-list {
            list-style: none;
            padding: 0;
        }

        .steps-list li {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 15px;
            padding: 15px;
            background: var(--bg-light);
            border-radius: 8px;
        }

        .step-icon {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
        }

        .step-content h4 {
            font-size: 16px;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 5px;
        }

        .step-content p {
            color: var(--text-gray);
            font-size: 14px;
            margin: 0;
        }

        @media (max-width: 768px) {
            body {
                padding: 10px 0;
            }

            .success-container {
                padding: 0 15px;
            }

            .success-card {
                padding: 30px 20px;
            }

            .success-title {
                font-size: 24px;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn-action {
                width: 100%;
                justify-content: center;
            }

            .detail-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 5px;
            }
        }
    </style>
</head>

<body>
    @include('header')

    <div class="success-container">
        <!-- Header -->
        <div class="success-header">
            <h1><i class="fas fa-check-circle"></i> Commande Validée</h1>
            <p>Votre commande a été traitée avec succès</p>
        </div>

        <!-- Success Card -->
        <div class="success-card">
            <div class="success-icon">
                <i class="fas fa-check"></i>
            </div>

            <h2 class="success-title">Merci pour votre commande !</h2>

            <p class="success-message">
                Votre commande a été validée avec succès. Vous recevrez un email de confirmation
                contenant tous les détails de votre commande et la finalisation de votre paiement dans les prochaines minutes.
            </p>

            <div class="order-number">
                <strong>Numéro de commande : CMD-{{ str_pad($orderId ?? 1, 5, '0', STR_PAD_LEFT) }}</strong>
            </div>
        </div>

        <!-- Order Details -->
        <div class="success-details">
            <h3><i class="fas fa-info-circle"></i> Détails de votre commande</h3>

            @if($auteur)
            <div class="detail-item">
                <span class="detail-label">Nom du client</span>
                <span class="detail-value">{{ $auteur->nom }} {{ $auteur->prenom }}</span>
            </div>

            <div class="detail-item">
                <span class="detail-label">Téléphone</span>
                <span class="detail-value">{{ $auteur->numero }}</span>
            </div>

            <div class="detail-item">
                <span class="detail-label">Email</span>
                <span class="detail-value">{{ $auteur->email }}</span>
            </div>

            <div class="detail-item">
                <span class="detail-label">Adresse de livraison</span>
                <span class="detail-value">{{ $auteur->contact_what }}</span>
            </div>

            <div class="detail-item">
                <span class="detail-label">Statut de la commande</span>
                <span class="detail-value">
                    <span class="badge bg-success">Confirmée</span>
                </span>
            </div>

            <hr style="margin: 15px 0;">
            
            <h4 style="font-size: 16px; font-weight: 600; color: var(--text-dark); margin-bottom: 15px;">Produits commandés</h4>
            
            @if($commandes->count() > 0)
                @foreach($commandes as $commande)
                <div class="detail-item" style="border-bottom: 1px dashed var(--border-color);">
                    <div style="flex: 1;">
                        <span class="detail-label">{{ $commande->produit->libelle ?? 'Produit #' . $commande->produit_id }}</span>
                        <div style="font-size: 13px; color: var(--text-gray);">
                            Quantité: {{ $commande->qtte }} | Prix unitaire: {{ number_format($commande->prix, 0, ',', ' ') }} F CFA
                        </div>
                    </div>
                    <span class="detail-value" style="font-weight: 600;">
                        {{ number_format($commande->prix * $commande->qtte, 0, ',', ' ') }} F CFA
                    </span>
                </div>
                @endforeach

                <div class="detail-item" style="margin-top: 15px; padding-top: 15px; border-top: 2px solid var(--primary-color);">
                    <span class="detail-label" style="font-size: 16px;">Total</span>
                    <span class="detail-value" style="font-size: 18px; font-weight: 700; color: var(--primary-color);">
                        {{ number_format($total, 0, ',', ' ') }} F CFA
                    </span>
                </div>
            @else
                <div class="detail-item">
                    <span class="detail-value">Aucun produit trouvé</span>
                </div>
            @endif
            @else
            <div class="detail-item">
                <span class="detail-label">Statut de la commande</span>
                <span class="detail-value">
                    <span class="badge bg-success">Confirmée</span>
                </span>
            </div>

            <div class="detail-item">
                <span class="detail-label">Mode de paiement</span>
                <span class="detail-value">À confirmer lors de la livraison</span>
            </div>

            <div class="detail-item">
                <span class="detail-label">Délai de livraison</span>
                <span class="detail-value">2-3 jours ouvrés (sous réserve de disponibilité)</span>
            </div>
            @endif
        </div>


        <!-- Action Buttons -->
        <div class="action-buttons" style="margin-top: 30px;">
            <a href="{{ route('ListeP') }}" class="btn-action btn-primary">
                <i class="fas fa-shopping-bag"></i> Retour a la boutique
            </a>

            <a href="{{ route('facture.download', ['id' => \App\Models\Auteur::max('id') ?? 1]) }}" class="btn-action btn-secondary" target="_blank">
                <i class="fas fa-file-pdf"></i> Télécharger la facture
            </a>
        </div>
    </div>
    <br>

    @include('footer1')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
