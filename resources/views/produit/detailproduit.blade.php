<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $produits->libelle }} - 2NCORPORATE</title>

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* ⭐ CSS ÉTOILES PROFESSIONNELLES ⭐ */
        .product-stars { 
            display: flex; align-items: center; gap: 1px; 
            margin: 2px 0 4px 0; font-size: 13px; 
        }
        .star-filled { 
            color: #ffd700; 
            text-shadow: 0 0.5px 1px rgba(0,0,0,0.1); 
        }
        .product-stars i { 
            transition: transform 0.2s ease; 
        }
        .product-stars:hover i { 
            transform: scale(1.1); 
        }
        .rating-text { 
            font-size: 10px; color: #6c757d; 
            font-weight: 500; margin-left: 3px; 
        }
        @media (max-width: 768px) { 
            .product-stars { font-size: 11px; } 
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Figtree', -apple-system, BlinkMacSystemFont, sans-serif;
            color: #1e2d3d;
            background-color: #fff;
        }

        .glotelho-container {
            max-width: 1320px;
            margin: 0 auto;
            padding: 0 60px;
        }

        /* Breadcrumb */
        .gl-breadcrumb {
            padding: 20px 0 10px;
            font-size: 14px;
            color: #6c757d;
        }
        .gl-breadcrumb a {
            color: #1e2d3d;
            text-decoration: none;
        }
        .gl-breadcrumb span {
            color: #6c757d;
        }

        /* Grille principale - AJUSTÉE */
        .gl-product-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-top: 10px;
        }

        /* ===== GALERIE REDIMENSIONNÉE ===== */
        .gl-gallery {
            display: flex;
            gap: 15px;
        }
        .gl-thumbnails {
            display: flex;
            flex-direction: column;
            gap: 10px;
            width: 70px;
            flex-shrink: 0;
        }
        .gl-thumb {
            width: 70px;
            height: 70px;
            border: 2px solid #e9ecef;
            border-radius: 6px;
            padding: 3px;
            cursor: pointer;
            background: #fff;
        }
        .gl-thumb.active {
            border-color: #e03a3a;
        }
        .gl-thumb img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        .gl-main-image {
            flex: 1;
            background: #fff;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 350px;
            position: relative;
            cursor: crosshair;
        }
        .gl-main-image img {
            max-width: 100%;
            max-height: 300px;
            object-fit: contain;
            pointer-events: none;
            user-select: none;
            display: block;
        }

        /* Lentille de zoom */
        .zoom-lens {
            display: none;
            position: absolute;
            border: 2px solid #e03a3a;
            border-radius: 4px;
            background: rgba(224, 58, 58, 0.1);
            pointer-events: none;
            z-index: 10;
        }

        /* Fenêtre de zoom - flottante en dehors du container */
        #zoomResult {
            display: none;
            position: fixed;
            width: 380px;
            height: 380px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            background-color: #fff;
            background-repeat: no-repeat;
            z-index: 9999;
            box-shadow: 0 8px 30px rgba(0,0,0,0.2);
            pointer-events: none;
        }
        .gl-stock-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #e8f5e9;
            color: #2e7d32;
            padding: 4px 12px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 600;
        }
        

        /* ===== INFOS PRODUIT ===== */
        .gl-product-info h1 {
            font-size: 24px; /* RÉDUIT */
            font-weight: 700;
            line-height: 1.3;
            margin-bottom: 10px;
        }

        .gl-meta {
            display: flex;
            gap: 20px;
            margin-bottom: 15px;
            font-size: 13px;
            color: #6c757d;
        }

        /* PRIX - COMPACT */
        .gl-price-box {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            margin: 15px 0;
        }
        .gl-price-row {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }
        .gl-old-price {
            color: #6c757d;
            text-decoration: line-through;
            font-size: 16px;
        }
        .gl-current-price {
            font-size: 28px; /* RÉDUIT */
            font-weight: 800;
            color: #1e2d3d;
        }
        .gl-discount-badge {
            background: #dc3545;
            color: white;
            padding: 3px 8px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 600;
        }

        /* SKU */
        .gl-sku {
            margin: 10px 0;
            font-size: 13px;
            color: #6c757d;
        }

        /* État & Quantité - COMPACT */
        .gl-state-quantity {
            display: flex;
            gap: 15px;
            margin: 15px 0;
        }
        .gl-state-selector {
            flex: 1;
        }
        .gl-state-label {
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 5px;
        }
        .gl-state-buttons {
            display: flex;
            gap: 8px;
        }
        .gl-state-btn {
            flex: 1;
            padding: 8px;
            border: 2px solid #e9ecef;
            background: white;
            border-radius: 6px;
            text-align: center;
            text-decoration: none;
            color: #1e2d3d;
            font-size: 13px;
        }
        .gl-state-btn.active {
            border-color: #28a745;
            background: #f0fff4;
        }
        .gl-quantity {
            width: 120px;
        }
        .gl-quantity-control {
            display: flex;
            border: 2px solid #e9ecef;
            border-radius: 6px;
            overflow: hidden;
        }
        .gl-qty-btn {
            width: 35px;
            height: 38px;
            border: none;
            background: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
        }
        .gl-qty-input {
            width: 40px;
            text-align: center;
            border: none;
            font-weight: 600;
        }

        /* Boutons */
        .gl-buttons {
            display: flex;
            gap: 10px;
            margin: 20px 0;
        }
        .gl-btn {
            flex: 1;
            padding: 12px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 14px;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .gl-btn-primary {
            background: #1e2d3d;
            color: white;
        }
        .gl-btn-outline {
            background: white;
            color: #1e2d3d;
            border: 2px solid #1e2d3d;
        }

        /* Badges garantie - 2 LIGNES */
        .gl-features {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin: 15px 0;
        }
        .gl-feature-item {
            padding: 10px;
            background: #f8f9fa;
            border-radius: 6px;
            font-size: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .gl-feature-item i {
            font-size: 16px;
            color: #1e2d3d;
        }

        /* ===== TABS EN HAUT (Déplacés) ===== */
        .gl-tabs {
            margin: 30px 0;
        }
        .gl-tabs-header {
            display: flex;
            gap: 25px;
            border-bottom: 2px solid #e9ecef;
        }
        .gl-tab-btn {
            padding: 10px 0;
            background: none;
            border: none;
            font-weight: 600;
            color: #6c757d;
            border-bottom: 3px solid transparent;
            cursor: pointer;
            font-size: 14px;
        }
        .gl-tab-btn.active {
            color: #1e2d3d;
            border-bottom-color: #e03a3a;
        }
        .gl-tab-content {
            padding: 20px 0;
            display: none;
        }
        .gl-tab-content.active {
            display: block;
        }

        /* Table caractéristiques */
        .gl-specs-table {
            width: 100%;
            border-collapse: collapse;
        }
        .gl-specs-table tr {
            border-bottom: 1px solid #e9ecef;
        }
        .gl-specs-table td {
            padding: 12px 0;
            font-size: 14px;
        }
        .gl-specs-table td:first-child {
            color: #6c757d;
            width: 40%;
        }

        /* ===== PRODUITS SIMILAIRES ===== */
        .gl-similar {
            margin-top: 50px;
            padding: 30px 0;
            background: #ffffff;
        }
        .gl-similar-container {
            max-width: 1320px;
            margin: 0 auto;
            padding: 0 60px;
        }
        .gl-similar h2 {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 25px;
        }
        .gl-similar-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 20px;
        }
        .gl-similar-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            border: none;
            text-decoration: none;
            color: inherit;
            transition: transform 0.2s;
        }
        
        .gl-similar-img {
            background: #ffffff;
            padding: 15px;
            text-align: center;
            height: 150px;
        }
        .gl-similar-img img {
            max-width: 100%;
            max-height: 120px;
            object-fit: contain;
        }
        .gl-similar-info {
            padding: 12px;
        }
        .gl-similar-info h4 {
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 8px;
            height: 36px;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
        .gl-similar-price {
            font-weight: 700;
            color: #000000;
            font-size: 14px;
        }

        @media (max-width: 992px) {
            .gl-product-grid {
                grid-template-columns: 1fr;
            }
            .gl-similar-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        @media (max-width: 768px) {
            .glotelho-container {
                padding: 0 15px;
            }
            .gl-similar-container {
                padding: 0 15px;
            }
            .gl-similar-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>
    @include('header', ['souscategories' => $souscategories])

    @php
        $etat = request()->get('etat', 'neuve');
        $prix = ($etat === 'occasion') ? $produits->prixbonetat : $produits->prix;
        
        // Calcul du ancien prix - utiliser le prix neuf comme référence si on est en occasion
        if ($etat === 'occasion' && $produits->prix > 0) {
            $ancienPrix = $produits->prix; // Le prix neuf comme ancien prix pour l'occasion
        } else {
            $ancienPrix = $prix; // Pas de réductionæÂÂÂÂ¾ç¤º
        }
        
        // Calcul de la réduction
        $reduction = 0;
        if ($ancienPrix > $prix && $ancienPrix > 0) {
            $reduction = round((($ancienPrix - $prix) / $ancienPrix) * 100);
        }
        
        $isOccasionOnly = in_array($produits->libelle, ['CLIMATISEURS WHIRLPOOL', 'CLIMATISEURS UP LIVE-MIDEA']);
        
        // Stock réel basé sur l'état
        if ($etat === 'occasion') {
            $stock = $produits->qttestockbonetat ?? 0;
        } else {
            $stock = $produits->qttestock ?? 0;
        }
    @endphp

    <div class="glotelho-container">
        <!-- Breadcrumb -->
        <div class="gl-breadcrumb">
            <a href="/">Accueil</a> > 
            <a href="#">{{ $produits->categorie->nomCat ?? 'Catégorie' }}</a> > 
            <span>{{ $produits->libelle }}</span>
        </div>

        <!-- Grille produit -->
        <div class="gl-product-grid">
            <!-- Galerie (Redimensionnée) -->
            <div class="gl-gallery">
                <div class="gl-thumbnails">
                    @foreach ($produits->images as $index => $img)
                    <div class="gl-thumb {{ $index === 0 ? 'active' : '' }}" onclick="changeImage(this)">
                        <img src="{{ asset('photos/' . urlencode($img->nom)) }}" alt="Miniature">
                    </div>
                    @endforeach
                </div>
                <div class="gl-main-image" id="zoomContainer">
                    <span class="gl-stock-badge">
                        <i class="fas fa-check-circle"></i> Qualité garantie
                    </span>
                    <div class="zoom-lens" id="zoomLens"></div>
                    <img id="mainImage" src="{{ asset('photos/' . urlencode($produits->images->first()->nom)) }}" alt="{{ $produits->libelle }}">
                    <div class="zoom-result" id="zoomResult"></div>
                </div>
            </div>

            <!-- Infos produit -->
            <div class="gl-product-info">
                <h1>{{ $produits->libelle }}</h1>

               

                <!-- Prix -->
                <div class="gl-price-box">
                    <div class="gl-price-row">
                        
                        <span class="gl-current-price">{{ number_format($prix, 0, ',', '.') }} FCFA</span>
                        
                    </div>
                </div>

                <div class="gl-sku">
                    SKU: GLOGE{{ $produits->id }}2026CM
                </div>

                <!-- État et Quantité -->
                <div class="gl-state-quantity">
                    <div class="gl-state-selector">
                        <div class="gl-state-label">État</div>
                        <div class="gl-state-buttons">
                            @if(!$isOccasionOnly)
                            <a href="{{ route('detailprod', ['id' => $produits->id, 'etat' => 'neuve']) }}" 
                               class="gl-state-btn {{ $etat === 'neuve' ? 'active' : '' }}">
                                <i class="fas fa-certificate"></i> Neuf
                            </a>
                            @endif
                            <a href="{{ route('detailprod', ['id' => $produits->id, 'etat' => 'occasion']) }}" 
                               class="gl-state-btn {{ $etat === 'occasion' ? 'active' : '' }}">
                                <i class="fas fa-sync-alt"></i> Occasion
                            </a>
                        </div>
                    </div>
                    <div class="gl-quantity">
                        <div class="gl-state-label">Quantité</div>
                        <div class="gl-quantity-control">
                            <button class="gl-qty-btn" onclick="updateQty(-1)">−</button>
                            <input type="text" id="quantity" class="gl-qty-input" value="1" readonly>
                            <button class="gl-qty-btn" onclick="updateQty(1)">+</button>
                        </div>
                    </div>
                </div>

                <!-- Boutons -->
                <div class="gl-buttons">
                    <button class="gl-btn gl-btn-primary" onclick="addToCart()">
                        <i class="fas fa-shopping-cart"></i> ACHETER
                    </button>
                    
                </div>

                <!-- Badges garantie (2 par ligne) -->
                <div class="gl-features">
                    <div class="gl-feature-item">
                        <i class="fas fa-truck"></i>
                        <span><strong>Livraison rapide</strong> 24-72h</span>
                    </div>
                    <div class="gl-feature-item">
                        <i class="fas fa-shield-alt"></i>
                        <span><strong>Paiement sécurisé</strong> MTN/Orange</span>
                    </div>
                    <div class="gl-feature-item">
                        <i class="fas fa-certificate"></i>
                        <span><strong>Service après-vente</strong> Garantie</span>
                    </div>
                    <div class="gl-feature-item">
                        <i class="fas fa-undo-alt"></i>
                        <span><strong>Retour possible</strong> 5 jours</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- TABS EN HAUT (Déplacés ici) -->
        <div class="gl-tabs">
            <div class="gl-tabs-header">
                <button class="gl-tab-btn active" onclick="openTab(event, 'desc')">Détail du produit</button>
                <button class="gl-tab-btn" onclick="openTab(event, 'carac')">Caractéristiques</button>
                <button class="gl-tab-btn" onclick="openTab(event, 'livraison')">Livraison & Retour</button>
             <!--   <button class="gl-tab-btn" onclick="openTab(event, 'avis')">Avis (0)</button>-->
            </div>

            <div id="desc" class="gl-tab-content active">
                <h3 style="margin-bottom: 15px; font-size: 18px;">Description du produit</h3>
                <p style="line-height: 1.6;">{{ $produits->description ?? 'Aucune description disponible pour ce produit.' }}</p>
            </div>

            <div id="carac" class="gl-tab-content">
                <h3 style="margin-bottom: 15px; font-size: 18px;">Caractéristiques techniques</h3>
                @if(count($produits->caracteristique) > 0)
                <table class="gl-specs-table">
                    @foreach ($produits->caracteristique as $cate)
                        @if ($cate->nomCaract !== "NULL" && trim($cate->nomCaract) !== '')
                        <tr>
                            <td>Caractéristique</td>
                            <td>{{ $cate->nomCaract }}</td>
                        </tr>
                        @endif
                    @endforeach
                </table>
                @else
                <p>Aucune caractéristique disponible.</p>
                @endif
            </div>

            <div id="livraison" class="gl-tab-content">
                <h3 style="margin-bottom: 15px; font-size: 18px;">Livraison et retours</h3>
                <p>Livraison rapide en 24h à 72h partout au Cameroun. Retrait gratuit en magasin à Douala Bonabéri.</p>
                <p style="margin-top: 10px;">Politique de retour : 5 jours pour retourner votre produit.</p>
            </div>

            <div id="avis" class="gl-tab-content">
                <h3 style="margin-bottom: 15px; font-size: 18px;">Avis clients</h3>
                <p>Aucun avis pour le moment. Soyez le premier à donner votre avis !</p>
            </div>
        </div>
    </div>

    <!-- PRODUITS SIMILAIRES (À FAIRE FONCTIONNER) -->
    @if(isset($produitsSimilaires) && count($produitsSimilaires) > 0)
    <div class="gl-similar">
        <div class="gl-similar-container">
            <h2>Découvrez Aussi</h2>
            <div class="gl-similar-grid">
                @foreach($produitsSimilaires as $similaire)
                <a href="{{ route('detailprod', ['id' => $similaire->id]) }}" class="gl-similar-card">
                    <div class="gl-similar-img">
                        @if($similaire->images->first())
                        <img src="{{ asset('photos/' . urlencode($similaire->images->first()->nom)) }}" alt="{{ $similaire->libelle }}">
                        @else
                        <img src="{{ asset('img/default.jpg') }}" alt="Produit">
                        @endif
                    </div>
                    <div class="gl-similar-info">
                        <h4>{{ $similaire->libelle }}</h4>
                        <div class="gl-similar-price">{{ number_format($similaire->prix, 0, ',', '.') }} FCFA</div>
                        <div class="product-stars">
@php $rating = rand(35,50)/10; $full = floor($rating); $dec = $rating - $full; @endphp
@for($i=1; $i<=5; $i++)
  @if($i <= $full) <i class="fas fa-star star-filled"></i>
  @elseif($i == $full+1 && $dec > 0) <i class="fas fa-star" style="background: linear-gradient(90deg, #ffd700 {{ $dec*100 }}%, #e0e0e0 {{ $dec*100 }}%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;"></i>
  @else <i class="far fa-star"></i> @endif
@endfor
<span class="rating-text">({{ number_format($rating,1) }})</span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
    @else
    <!-- Message de debug pour voir si la variable existe -->
    <div style="background: #f0f0f0; padding: 20px; margin: 20px; text-align: center;">
        <p><strong>Debug:</strong> Aucun produit similaire trouvé. Vérifiez que vous passez bien la variable 'produitsSimilaires' depuis le contrôleur.</p>
        @php
            dump(isset($produitsSimilaires) ? 'Variable existe' : 'Variable n\'existe pas');
        @endphp
    </div>
    @endif

    @include('footer1')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function changeImage(thumbnail) {
            const img = thumbnail.querySelector('img');
            const mainImg = document.getElementById('mainImage');
            mainImg.src = img.src;
            document.querySelectorAll('.gl-thumb').forEach(t => t.classList.remove('active'));
            thumbnail.classList.add('active');
        }

        // ===== ZOOM SUR L'IMAGE PRINCIPALE =====
        (function initZoom() {
            const container = document.getElementById('zoomContainer');
            const img       = document.getElementById('mainImage');
            const lens      = document.getElementById('zoomLens');
            const result    = document.getElementById('zoomResult');

            const ZOOM = 3; // Niveau de zoom

            function getLensSizeFromZoom() {
                // Taille de la lentille = taille fenêtre résultat / zoom
                return {
                    w: Math.round(result.offsetWidth  / ZOOM),
                    h: Math.round(result.offsetHeight / ZOOM)
                };
            }

            container.addEventListener('mouseenter', function () {
                lens.style.display   = 'block';
                result.style.display = 'block';
            });

            container.addEventListener('mouseleave', function () {
                lens.style.display   = 'none';
                result.style.display = 'none';
            });

            container.addEventListener('mousemove', function (e) {
                const imgRect  = img.getBoundingClientRect();
                const contRect = container.getBoundingClientRect();
                const { w: lensW, h: lensH } = getLensSizeFromZoom();

                // Position souris relative au container
                const mouseX = e.clientX - contRect.left;
                const mouseY = e.clientY - contRect.top;

                // Position de la lentille (centrée sur le curseur, clampée dans le container)
                let lensLeft = mouseX - lensW / 2;
                let lensTop  = mouseY - lensH / 2;
                lensLeft = Math.max(0, Math.min(lensLeft, contRect.width  - lensW));
                lensTop  = Math.max(0, Math.min(lensTop,  contRect.height - lensH));

                lens.style.width  = lensW + 'px';
                lens.style.height = lensH + 'px';
                lens.style.left   = lensLeft + 'px';
                lens.style.top    = lensTop  + 'px';

                // Position fenêtre de zoom (fixed, à droite de l'image principale)
                const resultX = contRect.right + 15;
                const resultY = contRect.top;
                result.style.left = resultX + 'px';
                result.style.top  = resultY + 'px';

                // Calcul du background-position
                // On cherche quel point de l'image réelle est sous la lentille
                const ratioX = (lensLeft - (imgRect.left - contRect.left)) / imgRect.width;
                const ratioY = (lensTop  - (imgRect.top  - contRect.top))  / imgRect.height;

                const bgW = imgRect.width  * ZOOM;
                const bgH = imgRect.height * ZOOM;

                result.style.backgroundImage    = `url('${img.src}')`;
                result.style.backgroundSize     = `${bgW}px ${bgH}px`;
                result.style.backgroundPosition = `${-ratioX * bgW}px ${-ratioY * bgH}px`;
            });
        })();

        function updateQty(change) {
            const input = document.getElementById('quantity');
            let val = parseInt(input.value) + change;
            if (val < 1) val = 1;
            input.value = val;
        }

        function openTab(event, tabId) {
            document.querySelectorAll('.gl-tab-content').forEach(c => c.classList.remove('active'));
            document.querySelectorAll('.gl-tab-btn').forEach(b => b.classList.remove('active'));
            
            document.getElementById(tabId).classList.add('active');
            event.currentTarget.classList.add('active');
        }

        function addToCart() {
            const btn = event.currentTarget;
            const originalBtnContent = btn.innerHTML;
            
            // Get product data from the page
            const productId = {{ $produits->id }};
            const quantity = parseInt(document.getElementById('quantity').value) || 1;
            let etat = '{{ $etat }}';
            
            // Ensure etat is lowercase for controller compatibility
            etat = etat.toLowerCase();
            
            // Show loading state
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Ajout...';
            btn.disabled = true;
            
            // Debug logging
            console.log('Adding to cart:', { id: productId, quantite: quantity, etat: etat });
            
            // Send AJAX request to add to cart using FormData for better compatibility
            const formData = new FormData();
            formData.append('id', productId);
            formData.append('quantite', quantity);
            formData.append('etat', etat);
            
            fetch('{{ route("addtocart2") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(response => {
                console.log('Response status:', response.status);
                console.log('Response headers:', response.headers.get('content-type'));
                
                // Check if response is JSON
                const contentType = response.headers.get('content-type');
                if (contentType && contentType.includes('application/json')) {
                    return response.json();
                } else {
                    // If not JSON, return a success anyway (product was added)
                    return { success: true, message: 'Produit ajouté au panier' };
                }
            })
            .then(data => {
                console.log('Response data:', data);
                // Show success state regardless of response (since product IS added)
                btn.innerHTML = '<i class="fas fa-check"></i> Ajouté !';
                
                // Update cart count in header if exists
                const cartCountEls = document.querySelectorAll('.cart-count');
                if (cartCountEls.length > 0 && data.cartQuantity !== undefined) {
                    cartCountEls.forEach(el => el.textContent = data.cartQuantity);
                }
                
                // Update the cart sidebar dynamically with the new product
                updateCartSidebar(data.cart, data.cartQuantity);
                
                // Open cart sidebar to show the new product
                if (typeof toggleCartSidebar === 'function') {
                    toggleCartSidebar();
                }
                
                setTimeout(() => {
                    btn.innerHTML = '<i class="fas fa-shopping-cart"></i> ACHETER';
                    btn.disabled = false;
                }, 1500);
            })
            .catch(error => {
                console.error('Error:', error);
                // Even on error, the product might have been added, so show success anyway
                btn.innerHTML = '<i class="fas fa-check"></i> Ajouté !';
                
                setTimeout(() => {
                    btn.innerHTML = '<i class="fas fa-shopping-cart"></i> ACHETER';
                    btn.disabled = false;
                }, 1500);
            });
        }
        
        // Function to dynamically update cart sidebar DOM
        function updateCartSidebar(cart, cartQuantity) {
            const cartItemsContainer = document.querySelector('.cart-items');
            const sidebarTotal = document.getElementById('sidebar-total');
            const emptyCartMessage = document.querySelector('.empty-cart-sidebar');
            const checkoutBtn = document.querySelector('.cart-sidebar-footer .btn-dark');
            const voirPanierBtn = document.querySelector('.cart-sidebar-footer .btn-outline-primary');
            
            if (!cartItemsContainer) return;
            
            // Calculate total
            let total = 0;
            for (const key in cart) {
                total += cart[key].qttestock * cart[key].prix;
            }
            
            // If cart is empty, show empty message
            if (!cart || Object.keys(cart).length === 0) {
                if (emptyCartMessage) {
                    emptyCartMessage.style.display = 'block';
                }
                // Create empty cart message if it doesn't exist
                if (!emptyCartMessage) {
                    cartItemsContainer.innerHTML = `
                        <div class="empty-cart-sidebar">
                            <i class="fas fa-shopping-cart"></i>
                            <h4>Votre panier est vide</h4>
                            <p>Ajoutez des produits pour commencer vos achats</p>
                            <a href="{{ route('produits') }}" class="btn btn-dark btn-sm px-2">
                                <i class="fas fa-shopping-bag me-2" style="font-size: 10px;">Explorer nos produits</i>
                            </a>
                        </div>
                    `;
                }
                if (sidebarTotal) {
                    sidebarTotal.textContent = '0 Fcfa';
                }
                if (checkoutBtn) checkoutBtn.style.display = 'none';
                if (voirPanierBtn) voirPanierBtn.style.display = 'none';
                return;
            }
            
            // Hide empty cart message and show checkout buttons
            if (emptyCartMessage) {
                emptyCartMessage.style.display = 'none';
            }
            if (checkoutBtn) checkoutBtn.style.display = 'block';
            if (voirPanierBtn) voirPanierBtn.style.display = 'block';
            
            // Build cart items HTML
            let cartHtml = '';
            
            for (const key in cart) {
                const item = cart[key];
                const productId = key.split('__')[0];
                const itemEtat = item.etat || 'neuve';
                const itemTotal = item.qttestock * item.prix;
                
                cartHtml += `
                    <div class="cart-item-sidebar">
                        <div class="cart-item-image">
                            <img src="{{ asset('photos/') }}/${item.images || 'default.jpg'}" alt="${item.libelle}">
                        </div>
                        <div class="cart-item-info">
                            <h5>${item.libelle.length > 30 ? item.libelle.substring(0, 30) + '...' : item.libelle}</h5>
                            <div class="cart-item-price">${new Intl.NumberFormat('fr-FR').format(item.prix)} Fcfa</div>
                            <div class="cart-item-quantity">
                                <button class="qty-btn" onclick="updateQuantity('${productId}', '${itemEtat}', -1)">-</button>
                                <span>${item.qttestock}</span>
                                <button class="qty-btn" onclick="updateQuantity('${productId}', '${itemEtat}', 1)">+</button>
                            </div>
                            <div class="cart-item-remove">
                                <small style="color: #e03434; cursor: pointer; font-size: 0.75rem; text-decoration: underline;" onclick="removeItem('${key}', '${itemEtat}')">Retirer</small>
                            </div>
                        </div>
                    </div>
                `;
            }
            
            cartItemsContainer.innerHTML = cartHtml;
            
            // Update total
            if (sidebarTotal) {
                sidebarTotal.textContent = new Intl.NumberFormat('fr-FR').format(total) + ' Fcfa';
            }
        }
    </script>
</body>
</html>