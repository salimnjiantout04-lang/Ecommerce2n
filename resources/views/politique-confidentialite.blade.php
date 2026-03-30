<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Politique de Confidentialité - 2N SHOP</title>

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
                <h1>Politique de Confidentialité</h1>
                <p>Dernière mise à jour : {{ date('d/m/Y') }}</p>
            </div>

            <div class="section">
                <h2>1. Collecte des Données</h2>
                <p>Nous collectons les informations que vous nous fournissez directement lors de votre inscription, de vos achats ou de vos interactions avec notre site. Cela inclut votre nom, adresse email, adresse de livraison et informations de paiement.</p>
            </div>

            <div class="section">
                <h2>2. Utilisation des Données</h2>
                <p>Vos données personnelles sont utilisées pour :</p>
                <ul>
                    <li>Traiter vos commandes et gérer votre compte</li>
                    <li>Vous contacter concernant vos achats</li>
                    <li>Améliorer nos services et votre expérience utilisateur</li>
                    <li>Vous envoyer des informations marketing (avec votre consentement)</li>
                    <li>Se conformer aux obligations légales</li>
                </ul>
            </div>

            <div class="section">
                <h2>3. Partage des Données</h2>
                <p>Nous ne vendons pas vos données personnelles à des tiers. Nous pouvons partager vos informations uniquement dans les cas suivants :</p>
                <ul>
                    <li>Avec nos prestataires de services (paiement, livraison)</li>
                    <li>Lorsque la loi l'exige</li>
                    <li>Pour protéger nos droits et ceux de nos utilisateurs</li>
                </ul>
            </div>

            <div class="section">
                <h2>4. Sécurité des Données</h2>
                <p>Nous mettons en œuvre des mesures de sécurité techniques et organisationnelles appropriées pour protéger vos données personnelles contre tout accès non autorisé, altération, divulgation ou destruction.</p>
            </div>

            <div class="section">
                <h2>5. Cookies</h2>
                <p>Notre site utilise des cookies pour améliorer votre expérience de navigation. Vous pouvez contrôler l'utilisation des cookies via les paramètres de votre navigateur.</p>
            </div>

            <div class="section">
                <h2>6. Vos Droits</h2>
                <p>Conformément au RGPD, vous disposez des droits suivants :</p>
                <ul>
                    <li>Droit d'accès à vos données</li>
                    <li>Droit de rectification</li>
                    <li>Droit à l'effacement</li>
                    <li>Droit à la portabilité</li>
                    <li>Droit d'opposition au traitement</li>
                </ul>
            </div>

            <div class="section">
                <h2>7. Conservation des Données</h2>
                <p>Nous conservons vos données personnelles aussi longtemps que nécessaire pour les finalités pour lesquelles elles ont été collectées, et conformément aux exigences légales.</p>
            </div>

            <div class="section">
                <h2>8. Modifications de la Politique</h2>
                <p>Nous pouvons modifier cette politique de confidentialité à tout moment. Les modifications seront publiées sur cette page avec la date de mise à jour.</p>
            </div>

            <div class="section">
                <h2>9. Contact</h2>
                <p>Pour toute question concernant cette politique de confidentialité ou l'utilisation de vos données, contactez-nous à l'adresse suivante : contact@2nshop.com</p>
            </div>

            <a href="javascript:history.back()" class="back-link">
                <i class="fas fa-arrow-left me-2"></i>Retour
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
