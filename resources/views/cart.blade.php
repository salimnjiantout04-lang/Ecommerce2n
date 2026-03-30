<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - 2N SHOP</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo2n.png') }}">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #0a1c3a;
            --text-dark: #21293c;
            --text-gray: #86878b;
            --border-color: #e5e5e5;
            --bg-light: #f8f9fa;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            color: var(--text-dark);
            background: #fff;
            line-height: 1.6;
            font-size: 15px;
        }

        /* Container - MARGES RÉDUITES */
        .main-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 15px;
        }

        /* Page Header - MARGES RÉDUITES */
        .page-header {
            padding: 30px 0 20px;
            border-bottom: 1px solid var(--border-color);
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 32px;
            font-weight: 600;
            color: var(--text-dark);
            margin: 0;
        }

        /* Empty Cart */
        .empty-cart-wrapper {
            text-align: center;
            padding: 80px 20px;
        }

        .empty-cart-icon {
            width: 100px;
            height: 100px;
            margin: 0 auto 20px;
            background: var(--bg-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .empty-cart-icon i {
            font-size: 40px;
            color: #ccc;
        }

        .empty-cart-text {
            font-size: 18px;
            color: var(--text-gray);
            margin-bottom: 30px;
        }

        /* Cart Layout - ESPACE RÉDUIT */
        .cart-layout {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            gap: 20px;
            align-items: flex-start;
        }

        .cart-left {
            flex: 1;
            min-width: 0;
            max-height: 70vh;
            display: flex;
            flex-direction: column;
        }

        .cart-table-container {
            flex: 1;
            overflow-y: auto;
            overflow-x: auto;
            margin-bottom: 20px;
        }

        .cart-table-container::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        .cart-table-container::-webkit-scrollbar-track {
            background: var(--bg-light);
            border-radius: 4px;
        }

        .cart-table-container::-webkit-scrollbar-thumb {
            background: var(--border-color);
            border-radius: 4px;
        }

        .cart-table-container::-webkit-scrollbar-thumb:hover {
            background: var(--text-gray);
        }

        .cart-right {
            width: 400px;
            flex-shrink: 0;
            margin-left: auto;
        }

        /* Cart Table */
        .woocommerce-cart-form {
            margin-bottom: 0;
            width: 100%;
            overflow-x: auto; /* Important pour les petits écrans */
        }

        .shop-table {
            width: 100%;
            min-width: 600px; /* Largeur minimale pour les petits écrans */
            border-collapse: collapse;
            background: #fff;
            margin-bottom: 30px;
        }

        .shop-table thead {
            border-bottom: 2px solid var(--border-color);
            position: sticky;
            top: 0;
            background: #fff;
            z-index: 10;
        }

        .shop-table thead th {
            padding: 12px 8px;
            text-align: left;
            font-weight: 600;
            font-size: 13px;
            text-transform: uppercase;
            color: #001153;
            letter-spacing: 0.5px;
        }

        .shop-table tbody tr {
            border-bottom: 1px solid var(--border-color);
        }

        .shop-table tbody td {
            padding: 20px 8px;
            vertical-align: middle;
        }

        /* Product Remove */
        .product-remove {
            width: 40px;
        }

        .remove-product {
            width: 28px;
            height: 28px;
            border: none;
            background: transparent;
            color: #999;
            cursor: pointer;
            font-size: 20px;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
        }

        .remove-product:hover {
            color: #e74c3c;
        }

        /* Product Thumbnail - TAILLE RÉDUITE */
        .product-thumbnail {
            width: 80px;
        }

        .product-thumbnail img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            display: block;
        }

        /* Product Name - LARGEUR RÉDUITE */
        .product-name {
            min-width: 200px;
            max-width: 200px; /* Limite la largeur maximale */
        }

        .product-name a {
            color: var(--text-dark);
            text-decoration: none;
            font-weight: 500;
            font-size: 15px;
            transition: color 0.3s;
            display: -webkit-box;
            -webkit-line-clamp: 2; /* Limite à 2 lignes */
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product-name a:hover {
            color: var(--primary-color);
        }

        .product-state {
            font-size: 13px;
            color: var(--text-gray);
            margin-top: 5px;
        }

        /* Product Price - LARGEUR RÉDUITE */
        .product-price {
            width: 100px;
            font-weight: 500;
            color: var(--text-dark);
        }

        /* Product Quantity - LARGEUR ET TAILLE RÉDUITES */
        .product-quantity {
            width: 130px;
        }

        .quantity {
            display: inline-flex;
            border: 1px solid var(--border-color);
        }

        .quantity-btn {
            width: 32px;
            height: 32px;
            border: none;
            background: #fff;
            color: var(--text-gray);
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s;
        }

        .quantity-btn:hover {
            background: var(--bg-light);
            color: var(--text-dark);
        }

        .quantity-input {
            width: 40px;
            height: 32px;
            border: none;
            border-left: 1px solid var(--border-color);
            border-right: 1px solid var(--border-color);
            text-align: center;
            font-weight: 500;
            color: var(--text-dark);
        }

        .quantity-input:focus {
            outline: none;
        }

        /* Product Subtotal - LARGEUR RÉDUITE */
        .product-subtotal {
            width: 100px;
            font-weight: 600;
            color: var(--text-dark);
        }

        /* Cart Actions */
        .cart-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
            border-top: 1px solid var(--border-color);
            flex-wrap: wrap; /* Permet aux éléments de passer à la ligne */
            gap: 15px;
        }

        .coupon {
            display: flex;
            gap: 10px;
            flex-wrap: wrap; /* Responsive pour le coupon */
        }

        .coupon-input {
            min-width: 200px;
            width: auto;
            height: 44px;
            padding: 0 15px;
            border: 1px solid var(--border-color);
            font-size: 14px;
        }

        .coupon-input:focus {
            outline: none;
            border-color: var(--primary-color);
        }

        .btn-apply,
        .btn-update {
            height: 44px;
            padding: 0 24px;
            background: #fff;
            border: 1px solid var(--border-color);
            color: var(--text-dark);
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            cursor: pointer;
            transition: all 0.3s;
            white-space: nowrap; /* Empêche le texte de se casser */
        }

        .btn-apply:hover,
        .btn-update:hover {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: #fff;
        }

        /* Cart Totals */
        .cart-totals {
            width: 100%;
        }

        .cart-totals-title {
            font-size: 22px;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--border-color);
        }

        .totals-table {
            width: 100%;
            margin-bottom: 25px;
        }

        .totals-table tr {
            border-bottom: 1px solid var(--border-color);
        }

        .totals-table th,
        .totals-table td {
            padding: 15px 0;
            font-size: 15px;
        }

        .totals-table th {
            font-weight: 600;
            color: var(--text-dark);
            text-align: left;
        }

        .totals-table td {
            text-align: right;
            color: var(--text-gray);
        }

        .totals-table .order-total th,
        .totals-table .order-total td {
            font-size: 20px;
            font-weight: 700;
            color: var(--text-dark);
            padding-top: 25px;
        }

        .free-shipping {
            color: #27ae60 !important;
            font-weight: 500;
        }

        /* Checkout Button */
        .proceed-checkout {
            width: 100%;
            height: 50px;
            background: var(--primary-color);
            border: none;
            color: #fff;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s;
            margin-bottom: 12px;
        }

        .proceed-checkout:hover {
            background: #1a2d4f;
        }

        .whatsapp-checkout {
            width: 100%;
            height: 50px;
            background: #25D366;
            border: none;
            color: #fff;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .whatsapp-checkout:hover {
            background: #1fa855;
        }

        /* Return to Shop Button */
        .return-shop {
            display: inline-block;
            padding: 12px 28px;
            background: var(--primary-color);
            color: #fff;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s;
        }

        .return-shop:hover {
            background: #1a2d4f;
            color: #fff;
        }

        /* Alert */
        .woocommerce-message {
            padding: 15px 20px;
            background: #d4edda;
            border-left: 4px solid #28a745;
            color: #155724;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .woocommerce-message i {
            font-size: 18px;
        }

        .alert-close {
            margin-left: auto;
            background: transparent;
            border: none;
            font-size: 20px;
            color: #155724;
            cursor: pointer;
            padding: 0;
            width: 24px;
            height: 24px;
        }

        /* Responsive - CORRECTIONS IMPORTANTES */
        @media (max-width: 1200px) {
            .cart-layout {
                gap: 15px;
            }
            
            .cart-right {
                width: 350px;
            }
        }

        @media (max-width: 992px) {
            .cart-layout {
                flex-direction: column;
                gap: 30px;
            }

            .cart-left {
                width: 100%;
                max-height: none;
            }

            .cart-table-container {
                overflow-x: visible;
            }
            
            .cart-right {
                width: 100%;
                max-width: 100%;
            }
            
            .shop-table {
                min-width: 100%; /* Utilise toute la largeur disponible */
            }
            
            .woocommerce-cart-form {
                overflow-x: visible;
            }
        }

        @media (max-width: 768px) {
            .page-header {
                padding: 20px 0;
            }

            .page-title {
                font-size: 24px;
            }

            /* Style pour tableaux responsives - IMPORTANT */
            .shop-table {
                min-width: 100%;
            }
            
            .shop-table thead {
                display: none; /* Cache l'en-tête sur mobile */
            }

            .shop-table tbody tr {
                display: block;
                margin-bottom: 20px;
                border: 1px solid var(--border-color);
                padding: 15px;
                position: relative;
            }

            .shop-table tbody td {
                display: flex; /* Utilise flex pour mieux contrôler l'alignement */
                justify-content: space-between;
                align-items: center;
                text-align: left;
                padding: 10px 0;
                border: none;
            }

            .shop-table tbody td::before {
                content: attr(data-title);
                font-weight: 600;
                color: var(--text-gray);
                text-transform: uppercase;
                font-size: 12px;
                margin-right: 10px;
                min-width: 80px;
            }
            
            .product-thumbnail img {
                width: 60px;
                height: 60px;
            }
            
            /* Ajustements spécifiques pour mobile */
            .product-name {
                min-width: auto;
                max-width: none;
            }
            
            .product-name a {
                -webkit-line-clamp: 3; /* Plus de lignes sur mobile */
            }
            
            .cart-actions {
                flex-direction: column;
                align-items: stretch;
            }
            
            .coupon {
                flex-direction: column;
                width: 100%;
            }
            
            .coupon-input {
                min-width: 100%;
                width: 100%;
            }
            
            .btn-apply,
            .btn-update {
                width: 100%;
            }
            
            .remove-product {
                position: absolute;
                top: 10px;
                right: 10px;
                z-index: 1;
            }
            
            /* Ajuster la colonne quantité pour mobile */
            .product-quantity .quantity {
                margin-left: auto; /* Aligne à droite */
            }
        }

        @media (max-width: 576px) {
            .main-container {
                padding: 0 8px;
            }
            
            .shop-table tbody td {
                flex-direction: column;
                align-items: flex-start;
                padding: 8px 0;
            }
            
            .shop-table tbody td::before {
                margin-bottom: 5px;
                min-width: auto;
            }
            
            .product-quantity .quantity {
                margin-left: 0;
                width: 100%;
            }
            
            .cart-totals-title {
                font-size: 20px;
            }
        }
    </style>
</head>

<body>
    @include('header', ['souscategories' => $souscategories])

    <div class="main-container">
        <!-- Success Message -->
        @if(session('success'))
            <div class="woocommerce-message">
                <i class="fas fa-check-circle"></i>
                <span>{{ session('success') }}</span>
                <button class="alert-close" onclick="this.parentElement.remove()">×</button>
            </div>
        @endif

        @if(empty($produits))
            <!-- Empty Cart -->
            <div class="empty-cart-wrapper">
                <div class="empty-cart-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <p class="empty-cart-text">Votre panier est actuellement vide.</p>
                <a href="{{ route('produits') }}" class="return-shop">Retour à la boutique</a>
                
            </div>
            <br><br>
            
        @else
            <!-- Cart Layout -->
            <div class="cart-layout">
                <!-- Left Column - Cart Items -->
                <div class="cart-left">
                    <form class="woocommerce-cart-form">
                        <div class="cart-table-container">
                            <table class="shop-table">
                            <thead>
                                <tr>
                                    <th class="product-remove"></th>
                                    <th class="product-thumbnail"></th>
                                    <th class="product-name">Produit</th>
                                    <th class="product-price">Prix</th>
                                    <th class="product-quantity">Quantité</th>
                                    <th class="product-subtotal">Sous-total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $totalle = 0; @endphp
                                @foreach ($produits as $id => $produit)
                                    @php
                                        $totalle += $produit['qttestock'] * $produit['prix'];
                                        $parts = explode('__', $id);
                                        $productId = $parts[0];
                                        $etat = $parts[1] ?? 'neuve';
                                        $itemTotal = $produit['qttestock'] * $produit['prix'];
                                    @endphp
                                    <tr>
                                        <td class="product-remove" data-title="">
                                            <button type="button" class="remove-product" onclick="removeItem('{{ $id }}', '{{ $etat }}')">
                                                ×
                                            </button>
                                        </td>
                                        <td class="product-thumbnail" data-title="Image">
                                            <img src="{{ asset('photos/' . $produit['images']) }}" alt="{{ $produit['libelle'] }}">
                                        </td>
                                        <td class="product-name" data-title="Product">
                                            <a href="#">{{ $produit['libelle'] }}</a>
                                            <div class="product-state">State: {{ ucfirst($produit['etat']) }}</div>
                                        </td>
                                        <td class="product-price" data-title="Price">
                                            <span>{{ number_format($produit['prix'], 0, ',', ' ') }} FCFA</span>
                                        </td>
                                        <td class="product-quantity" data-title="Quantity">
                                            <div class="quantity">
                                                <button type="button" class="quantity-btn decrease" 
                                                        data-id="{{ $productId }}" 
                                                        data-etat="{{ $etat }}">−</button>
                                                <input type="text" 
                                                       class="quantity-input" 
                                                       id="quantity{{ $productId }}{{ $etat }}"
                                                       value="{{ $produit['qttestock'] }}" 
                                                       readonly>
                                                <button type="button" class="quantity-btn increase" 
                                                        data-id="{{ $productId }}" 
                                                        data-etat="{{ $etat }}">+</button>
                                            </div>
                                        </td>
                                        <td class="product-subtotal" data-title="Subtotal">
                                            <span id="total-price{{ $id }}">{{ number_format($itemTotal, 0, ',', ' ') }}</span> FCFA
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Cart Actions -->
                        <div class="cart-actions">
                            <div class="coupon">
                                <input type="text" class="coupon-input" placeholder="Coupon code">
                                <button type="button" class="btn-apply">APPLIQUER LE COUPON </button>
                            </div>
                            <button type="button" class="btn-update">METTRE A JOUR LE PANIER</button>
                        </div>
                    </form>
                </div>
                

                <!-- Right Column - Cart Totals -->
                <div class="cart-right">
                    <div class="cart-totals">
                        <br><br>
                        <h2 class="cart-totals-title">Total du panier</h2>
                        
                        <table class="totals-table">
                            <tbody>
                                <tr class="cart-subtotal">
                                    <th>sous-total </th>
                                    <td>{{ number_format($totalle, 0, ',', ' ') }} FCFA</td>
                                </tr>
                            <!--     <tr class="shipping">
                                    <th>Livraison</th>
                                    <td class="free-shipping">livraison gratuite</td>
                                </tr>-->
                                <tr class="order-total">
                                    <th>Total</th>
                                    <td id="grand-total">{{ number_format($totalle, 0, ',', ' ') }} FCFA</td>
                                </tr>
                            </tbody>
                        </table>

                        @if(!empty($produits))
                        <button type="button" class="proceed-checkout" id="checkoutBtn">
                           COMMANDER 
                        </button>

                       <!-- <button type="button" class="whatsapp-checkout" onclick="commanderWhatsApp()">
                            <i class="fab fa-whatsapp"></i> COMMANDER VIA WHATSAPP
                        </button>-->
                        @endif
                    </div>
                    <br>
                </div>
            </div>
        @endif
    </div>
     <br><br><br>

    @include('footer1')

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Auto-hide success message after 2 seconds
        $(document).ready(function() {
            $('.woocommerce-message').delay(2000).fadeOut(500);
        });

        $(document).on('click', '.decrease', function(e) {
            e.preventDefault();
            updateQuantity($(this), -1);
        });

        $(document).on('click', '.increase', function(e) {
            e.preventDefault();
            updateQuantity($(this), 1);
        });

        function updateQuantity(btn, change) {
            const productId = btn.data('id');
            const etat = btn.data('etat');
            const input = $('#quantity' + productId + etat);
            const currentVal = parseInt(input.val());
            const newVal = Math.max(1, currentVal + change);

            input.val(newVal);

            const url = change > 0 ? '/addtocard1/' : '/minusfromcard/';
            $.ajax({
                url: url + productId + '/' + etat,
                type: 'GET',
                success: function(response) {
                    if (response.success) {
                        // Mettre à jour la quantité affichée
                        input.val(response.quantity);

                        // Mettre à jour le sous-total de l'article
                        const itemTotalElement = $('#total-price' + productId + '__' + etat);
                        itemTotalElement.text(response.itemTotal.toLocaleString('fr-FR') + ' FCFA');

                        // Mettre à jour le total général
                        $('#grand-total').text(response.grandTotal.toLocaleString('fr-FR') + ' FCFA');
                        $('.cart-subtotal td').text(response.grandTotal.toLocaleString('fr-FR') + ' FCFA');

                        // Mettre à jour le compteur du panier dans le header
                        updateCartCount(response.cartQuantity);
                    }
                },
                error: function(xhr) {
                    console.error('Erreur lors de la mise à jour:', xhr.responseText);
                    input.val(currentVal);
                    alert('Erreur lors de la mise à jour de la quantité');
                }
            });
        }

        function updateItemTotal(productId, etat, quantity) {
            const id = productId + '__' + etat;
            const row = $(`[data-id="${productId}"][data-etat="${etat}"]`).closest('tr');
            const priceText = row.find('.product-price span').text().replace(' FCFA', '').replace(/ /g, '');
            const price = parseInt(priceText);
            const itemTotal = quantity * price;
            
            $('#total-price' + id).text(itemTotal.toLocaleString('fr-FR'));
        }

        function updateGrandTotal() {
            let grandTotal = 0;
            $('.product-subtotal span').each(function() {
                const totalText = $(this).text().replace(' FCFA', '').replace(/ /g, '');
                grandTotal += parseInt(totalText);
            });
            
            $('#grand-total').text(grandTotal.toLocaleString('fr-FR') + ' FCFA');
            $('.cart-subtotal td').text(grandTotal.toLocaleString('fr-FR') + ' FCFA');
        }

        function removeItem(productKey, etat) {
            if (confirm('Remove this item from cart?')) {
                window.location.href = '/suprimerprodcard/' + productKey + '/' + etat;
            }
        }

        $('#checkoutBtn').on('click', function(e) {
            e.preventDefault();
            window.location.href = '/finaliser';
        });

        function commanderWhatsApp() {
            @php
                $cart = session()->get('cart', []);
                if (empty($cart)) {
                    echo 'alert("Votre panier est vide. Veuillez ajouter des produits avant de commander.");';
                    echo 'return;';
                }
                $message = "Hello, I would like to order the following products:\\n\\n";
                $total = 0;
                foreach ($cart as $id => $produit) {
                    $message .= "- " . $produit['libelle'] . " (Qty: " . $produit['qttestock'] . ", Price: " . number_format($produit['prix'], 0, ',', ' ') . " FCFA)\\n";
                    $total += $produit['prix'] * $produit['qttestock'];
                }
                $message .= "\\nTotal: " . number_format($total, 0, ',', ' ') . " FCFA\\n\\nThank you!";
            @endphp
            const whatsappUrl = "https://wa.me/237691102395?text=" + encodeURIComponent("{{ $message }}");
            window.open(whatsappUrl, '_blank');
        }
    </script>
</body>
</html>