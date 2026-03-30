<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande de Devis - 2NCORPORATE</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo2n.png') }}">
    <meta name="description" content="Demandez un devis pour nos produits électroniques chez 2NCORPORATE" />

    <!-- Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('app.css') }}">
    <link rel="stylesheet" href="{{ asset('responsive.css') }}">

    <style>
        .devis-hero {
            background: linear-gradient(135deg, #0a1c3a 0%, #1a3b6e 100%);
            color: white;
            padding: 5rem 0;
            position: relative;
            overflow: hidden;
        }

        .devis-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80') center/cover;
            opacity: 0.1;
        }

        .devis-hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .devis-form-section {
            padding: 5rem 0;
            background-color: #f8f9fa;
        }

        .devis-form-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 3rem;
            margin-top: -3rem;
            position: relative;
            z-index: 3;
        }

        .form-step {
            display: none;
        }

        .form-step.active {
            display: block;
        }

        .step-indicator {
            display: flex;
            justify-content: center;
            margin-bottom: 2rem;
        }

        .step {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #e9ecef;
            color: #6c757d;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 0.5rem;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .step.active {
            background-color: #0a1c3a;
            color: white;
        }

        .step.completed {
            background-color: #28a745;
            color: white;
        }

        .product-selection {
            max-height: 400px;
            overflow-y: auto;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 1rem;
        }

        .product-item {
            display: flex;
            align-items: center;
            padding: 1rem;
            border-bottom: 1px solid #eee;
            transition: background-color 0.2s ease;
        }

        .product-item:hover {
            background-color: #f8f9fa;
        }

        .product-item img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 1rem;
        }

        .product-info {
            flex: 1;
        }

        .product-title {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .product-price {
            color: #28a745;
            font-weight: bold;
        }

        .quantity-input {
            width: 80px;
            text-align: center;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            padding: 0.5rem;
        }

        .contact-info-section {
            background: white;
            padding: 3rem 0;
        }

        .info-card {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 10px;
            padding: 2rem;
            text-align: center;
            height: 100%;
        }

        .info-icon {
            font-size: 3rem;
            color: #0a1c3a;
            margin-bottom: 1rem;
        }

        .btn-devis {
            background-color: #0a1c3a;
            border-color: #0a1c3a;
            padding: 0.75rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-devis:hover {
            background-color: #1a2c4a;
            transform: translateY(-2px);
        }

        .form-check-input:checked {
            background-color: #0a1c3a;
            border-color: #0a1c3a;
        }
    </style>
</head>

<body>
    @include('header', ['souscategories' => []])

    <!-- Hero Section -->
    <section class="devis-hero">
        <div class="container">
            <div class="devis-hero-content">
                <h1 class="display-4 fw-bold mb-4">
                    <i class="fas fa-file-alt me-3"></i>Demande de Devis
                </h1>
                <p class="lead mb-0">
                    Obtenez un devis personnalisé pour vos besoins en équipements électroniques.
                    Notre équipe vous répondra dans les plus brefs délais.
                </p>
            </div>
        </div>
    </section>

    <!-- Formulaire de Devis -->
    <section class="devis-form-section">
        <div class="container">
            <div class="devis-form-card">
                <form id="devisForm" method="POST" action="{{ route('devis.submit') }}">
                    @csrf

                    <!-- Indicateur d'étapes -->
                    <div class="step-indicator">
                        <div class="step active" data-step="1">1</div>
                        <div class="step" data-step="2">2</div>
                        <div class="step" data-step="3">3</div>
                    </div>

                    <!-- Étape 1: Sélection des produits -->
                    <div class="form-step active" id="step1">
                        <h3 class="text-center mb-4">
                            <i class="fas fa-shopping-cart me-2"></i>Étape 1: Sélection des Produits
                        </h3>
                        <p class="text-muted text-center mb-4">
                            Sélectionnez les produits qui vous intéressent pour votre devis
                        </p>

                        <div class="product-selection">
                            <!-- Les produits seront chargés dynamiquement via JavaScript -->
                            <div id="productsList">
                                <div class="text-center py-4">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="visually-hidden">Chargement...</span>
                                    </div>
                                    <p class="mt-2">Chargement des produits...</p>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="button" class="btn btn-devis" onclick="nextStep(2)">
                                Étape suivante <i class="fas fa-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Étape 2: Informations de contact -->
                    <div class="form-step" id="step2">
                        <h3 class="text-center mb-4">
                            <i class="fas fa-user me-2"></i>Étape 2: Vos Informations
                        </h3>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nom" class="form-label">Nom complet *</label>
                                <input type="text" class="form-control" id="nom" name="nom" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email *</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="telephone" class="form-label">Téléphone *</label>
                                <input type="tel" class="form-control" id="telephone" name="telephone" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="entreprise" class="form-label">Entreprise (optionnel)</label>
                                <input type="text" class="form-control" id="entreprise" name="entreprise">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">Message complémentaire</label>
                            <textarea class="form-control" id="message" name="message" rows="4" placeholder="Décrivez vos besoins spécifiques..."></textarea>
                        </div>

                        <div class="text-center mt-4">
                            <button type="button" class="btn btn-secondary me-2" onclick="prevStep(1)">
                                <i class="fas fa-arrow-left me-2"></i>Précédent
                            </button>
                            <button type="button" class="btn btn-devis" onclick="nextStep(3)">
                                Étape suivante <i class="fas fa-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Étape 3: Confirmation -->
                    <div class="form-step" id="step3">
                        <h3 class="text-center mb-4">
                            <i class="fas fa-check-circle me-2"></i>Étape 3: Confirmation
                        </h3>

                        <div class="alert alert-info">
                            <h5><i class="fas fa-info-circle me-2"></i>Récapitulatif de votre demande</h5>
                            <div id="summary">
                                <!-- Le résumé sera généré dynamiquement -->
                            </div>
                        </div>

                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="acceptTerms" required>
                            <label class="form-check-label" for="acceptTerms">
                                J'accepte les conditions générales et la politique de confidentialité *
                            </label>
                        </div>

                        <div class="text-center">
                            <button type="button" class="btn btn-secondary me-2" onclick="prevStep(2)">
                                <i class="fas fa-arrow-left me-2"></i>Modifier
                            </button>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-paper-plane me-2"></i>Envoyer la demande
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Section Informations -->
    <section class="contact-info-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h4>Délai de réponse</h4>
                        <p>Nous traitons votre demande dans les 24 heures ouvrées</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4>Devis gratuit</h4>
                        <p>Notre service de devis est entièrement gratuit et sans engagement</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h4>Support personnalisé</h4>
                        <p>Notre équipe vous accompagne pour trouver la solution idéale</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('footer1')

    <script src="{{ asset('main.js') }}"></script>
    <script>
        let currentStep = 1;
        let selectedProducts = [];

        // Navigation entre les étapes
        function nextStep(step) {
            if (validateStep(currentStep)) {
                document.getElementById('step' + currentStep).classList.remove('active');
                document.querySelector(`[data-step="${currentStep}"]`).classList.remove('active');
                document.querySelector(`[data-step="${currentStep}"]`).classList.add('completed');

                currentStep = step;
                document.getElementById('step' + currentStep).classList.add('active');
                document.querySelector(`[data-step="${currentStep}"]`).classList.add('active');

                if (step === 3) {
                    generateSummary();
                }
            }
        }

        function prevStep(step) {
            document.getElementById('step' + currentStep).classList.remove('active');
            document.querySelector(`[data-step="${currentStep}"]`).classList.remove('active');

            currentStep = step;
            document.getElementById('step' + currentStep).classList.add('active');
            document.querySelector(`[data-step="${currentStep}"]`).classList.add('active');
        }

        // Validation des étapes
        function validateStep(step) {
            if (step === 1) {
                return selectedProducts.length > 0;
            } else if (step === 2) {
                const nom = document.getElementById('nom').value.trim();
                const email = document.getElementById('email').value.trim();
                const telephone = document.getElementById('telephone').value.trim();

                if (!nom || !email || !telephone) {
                    alert('Veuillez remplir tous les champs obligatoires.');
                    return false;
                }

                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email)) {
                    alert('Veuillez entrer une adresse email valide.');
                    return false;
                }

                return true;
            }
            return true;
        }

        // Chargement des produits
        document.addEventListener('DOMContentLoaded', function() {
            loadProducts();
        });

        function loadProducts() {
            fetch('/api/products-for-devis')
                .then(response => response.json())
                .then(data => {
                    displayProducts(data);
                })
                .catch(error => {
                    console.error('Erreur lors du chargement des produits:', error);
                    document.getElementById('productsList').innerHTML = `
                        <div class="text-center py-4">
                            <p>Impossible de charger les produits. Veuillez réessayer plus tard.</p>
                        </div>
                    `;
                });
        }

        function displayProducts(products) {
            const productsList = document.getElementById('productsList');

            if (products.length === 0) {
                productsList.innerHTML = '<p class="text-center">Aucun produit disponible.</p>';
                return;
            }

            productsList.innerHTML = products.map(product => `
                <div class="product-item">
                    <img src="/photos/${product.images?.[0]?.nom || 'default.jpg'}" alt="${product.libelle}">
                    <div class="product-info">
                        <div class="product-title">${product.libelle}</div>
                        <div class="product-price">${product.prix?.toLocaleString()} FCFA</div>
                    </div>
                    <div class="d-flex align-items-center">
                        <label class="me-2">Quantité:</label>
                        <input type="number" class="quantity-input" min="1" value="1" data-product-id="${product.id}">
                        <input type="checkbox" class="form-check-input ms-3" data-product-id="${product.id}" onchange="toggleProduct(${product.id}, this)">
                    </div>
                </div>
            `).join('');
        }

        function toggleProduct(productId, checkbox) {
            const quantityInput = checkbox.closest('.product-item').querySelector('.quantity-input');
            const quantity = parseInt(quantityInput.value) || 1;

            if (checkbox.checked) {
                selectedProducts.push({ id: productId, quantity: quantity });
            } else {
                selectedProducts = selectedProducts.filter(p => p.id !== productId);
            }
        }

        function generateSummary() {
            const summary = document.getElementById('summary');
            const nom = document.getElementById('nom').value;
            const email = document.getElementById('email').value;
            const telephone = document.getElementById('telephone').value;
            const entreprise = document.getElementById('entreprise').value;
            const message = document.getElementById('message').value;

            let html = `
                <p><strong>Nom:</strong> ${nom}</p>
                <p><strong>Email:</strong> ${email}</p>
                <p><strong>Téléphone:</strong> ${telephone}</p>
            `;

            if (entreprise) {
                html += `<p><strong>Entreprise:</strong> ${entreprise}</p>`;
            }

            if (message) {
                html += `<p><strong>Message:</strong> ${message}</p>`;
            }

            html += `<p><strong>Produits sélectionnés:</strong> ${selectedProducts.length}</p>`;

            summary.innerHTML = html;
        }

        // Gestionnaire de soumission du formulaire
        document.getElementById('devisForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Ajouter les produits sélectionnés au formulaire
            selectedProducts.forEach(product => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'products[]';
                input.value = JSON.stringify(product);
                this.appendChild(input);
            });

            // Ici, vous pouvez ajouter la logique pour envoyer les données
            alert('Demande de devis envoyée avec succès ! Nous vous contacterons bientôt.');
            // this.submit(); // Décommentez pour soumettre réellement
        });
    </script>
</body>
</html>
