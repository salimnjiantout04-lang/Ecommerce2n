<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conditions Générales - 2N SHOP</title>

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #0a1c3a;
            --secondary-color: #1a3b6e;
            --accent-color: #4dabf7;
            --light-color: #f8f9fa;
        }

        body {
            font-family: 'Figtree', sans-serif;
            background: linear-gradient(135deg, #0a1c3a 0%, #1a3b6e 100%);
            color: #333;
            min-height: 100vh;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .content-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            margin: 20px 0;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 10px;
        }

        .header p {
            color: #666;
        }

        .section {
            margin-bottom: 30px;
        }

        .section h2 {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 15px;
            font-size: 1.3rem;
        }

        .section p {
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .back-link {
            display: inline-block;
            margin-top: 30px;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
        }

        .back-link:hover {
            color: var(--accent-color);
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content-card">
            <div class="header">
                <h1>Conditions Générales d'Utilisation</h1>
                <p>Dernière mise à jour : {{ date('d/m/Y') }}</p>
            </div>

            <div class="section">
                <h2>1. Acceptation des Conditions</h2>
                <p>En accédant et en utilisant le site web de 2N SHOP, vous acceptez d'être lié par les présentes conditions générales d'utilisation. Si vous n'acceptez pas ces conditions, veuillez ne pas utiliser ce site.</p>
            </div>

            <div class="section">
                <h2>2. Description des Services</h2>
                <p>2N SHOP est une plateforme de commerce électronique spécialisée dans la vente d'équipements électroniques professionnels. Nous proposons une large gamme de produits pour les professionnels du secteur.</p>
            </div>

            <div class="section">
                <h2>3. Inscription et Compte Utilisateur</h2>
                <p>Pour effectuer des achats sur notre plateforme, vous devez créer un compte. Vous êtes responsable de la confidentialité de vos informations de connexion et de toutes les activités effectuées sous votre compte.</p>
            </div>

            <div class="section">
                <h2>4. Commandes et Paiement</h2>
                <p>Toutes les commandes sont soumises à acceptation et disponibilité des produits. Le paiement s'effectue en ligne via des méthodes sécurisées. Les prix sont indiqués en euros TTC.</p>
            </div>

            <div class="section">
                <h2>5. Livraison</h2>
                <p>Nous nous engageons à livrer les produits dans les délais indiqués lors de la commande. Les frais de livraison sont calculés selon le poids, le volume et la destination.</p>
            </div>

            <div class="section">
                <h2>6. Droit de Rétractation</h2>
                <p>Conformément à la législation en vigueur, vous disposez d'un délai de 14 jours pour exercer votre droit de rétractation sans avoir à justifier de motifs.</p>
            </div>

            <div class="section">
                <h2>7. Garantie et Service Après-Vente</h2>
                <p>Tous nos produits bénéficient de la garantie légale. En cas de défaut, nous nous engageons à remplacer ou rembourser le produit défectueux.</p>
            </div>

            <div class="section">
                <h2>8. Propriété Intellectuelle</h2>
                <p>Le contenu du site (textes, images, logos) est protégé par le droit d'auteur. Toute reproduction sans autorisation préalable est interdite.</p>
            </div>

            <div class="section">
                <h2>9. Protection des Données Personnelles</h2>
                <p>Vos données personnelles sont traitées conformément à notre politique de confidentialité et aux réglementations en vigueur (RGPD).</p>
            </div>

            <div class="section">
                <h2>10. Responsabilité</h2>
                <p>2N SHOP ne peut être tenu responsable des dommages indirects ou des pertes de données. Notre responsabilité est limitée au montant de la commande.</p>
            </div>

            <div class="section">
                <h2>11. Modification des Conditions</h2>
                <p>Nous nous réservons le droit de modifier ces conditions générales à tout moment. Les modifications prendront effet immédiatement après publication.</p>
            </div>

            <div class="section">
                <h2>12. Droit Applicable et Juridiction</h2>
                <p>Ces conditions sont régies par le droit français. Tout litige sera soumis aux tribunaux compétents.</p>
            </div>

            <a href="javascript:history.back()" class="back-link">
                <i class="fas fa-arrow-left me-2"></i>Retour
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
