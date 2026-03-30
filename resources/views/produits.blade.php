<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="{{ asset('img/logo2n.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    
    <style>
        /* â­ CSS ÉTOILES PROFESSIONNELLES (pour .products-grid) â­ */
        .products-grid .product-stars { 
            display: flex; align-items: center; gap: 1px; 
            margin: 4px 0 8px 0; font-size: 13px; 
        }
        .products-grid .star-filled { 
            color: #ffd700 !important; 
            text-shadow: 0 0.5px 1px rgba(0,0,0,0.1); 
        }
        .products-grid .product-stars i { 
            transition: transform 0.2s ease; 
        }
        .products-grid .product-stars:hover i { 
            transform: scale(1.1); 
        }
        .products-grid .rating-text { 
            font-size: 10px; color: #6c757d; 
            font-weight: 500; margin-left: 3px; 
        }
        @media (max-width: 768px) { 
            .products-grid .product-stars { font-size: 11px; } 
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Figtree', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            color: #333;
            background-color: #ffffff;
            line-height: 1.6;
        }

        /* Conteneur principal */
        .main-content {
            padding: 0;
            background-color: #ffffffff;
        }

        /* ===== SIDEBAR FILTRES - REDESIGN PREMIUM ===== */
        .filters-sidebar {
            background: #fff;
            border-radius: 12px;
            padding: 0;
            box-shadow: 0 1px 4px rgba(0,0,0,0.08);
            border: 1px solid #e8ecf0;
            position: sticky;
            top: 20px;
            margin-top: 20px;
            height: fit-content;
            overflow: hidden;
        }

        /* En-tête de la sidebar */
        .filter-sidebar-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 18px;
            background: #003679;
            color: white;
        }

        .filter-sidebar-header .filter-title {
            font-size: 0.78rem;
            font-weight: 700;
            color: white;
            margin: 0;
            padding: 0;
            border: none;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .filter-sidebar-header .filter-title i {
            font-size: 0.85rem;
            opacity: 0.8;
        }

        .btn-reset-all {
            font-size: 0.7rem;
            color: rgba(255,255,255,0.65);
            background: none;
            border: none;
            cursor: pointer;
            padding: 4px 8px;
            border-radius: 4px;
            transition: all 0.2s;
            text-decoration: underline;
            white-space: nowrap;
        }

        .btn-reset-all:hover {
            color: white;
            background: rgba(255,255,255,0.12);
        }

        /* Sections de filtres */
        .filter-section {
            border-bottom: 1px solid #f0f2f5;
            overflow: hidden;
        }

        .filter-section:last-child {
            border-bottom: none;
        }

        /* En-tête collapsible de section */
        .filter-section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 18px;
            cursor: pointer;
            user-select: none;
            background: #fff;
            transition: background 0.15s ease;
        }

        .filter-section-header:hover {
            background: #f8f9fb;
        }

        .filter-section-header h6 {
            font-size: 0.8rem;
            font-weight: 700;
            color: #1a1a2e;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 0.6px;
        }

        .filter-section-header .chevron {
            font-size: 0.65rem;
            color: #999;
            transition: transform 0.25s ease;
        }

        .filter-section.collapsed .chevron {
            transform: rotate(-90deg);
        }

        .filter-section-body {
            padding: 6px 18px 14px;
            transition: all 0.25s ease;
        }

        .filter-section.collapsed .filter-section-body {
            display: none;
        }

        /* Compteur de filtres actifs */
        .filter-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 18px;
            height: 18px;
            background: #0a1c3a;
            color: white;
            border-radius: 50%;
            font-size: 0.6rem;
            font-weight: 700;
            margin-left: 6px;
        }

        /* Select catégorie stylisé */
        .filter-select-custom {
            width: 100%;
            border: 1.5px solid #e0e4ea;
            border-radius: 8px;
            padding: 9px 32px 9px 12px;
            font-size: 0.82rem;
            color: #333;
            background: #fff url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='6' viewBox='0 0 10 6'%3E%3Cpath d='M0 0l5 6 5-6z' fill='%230a1c3a'/%3E%3C/svg%3E") no-repeat right 12px center;
            appearance: none;
            -webkit-appearance: none;
            cursor: pointer;
            transition: border-color 0.2s, box-shadow 0.2s;
            font-weight: 500;
        }

        .filter-select-custom:focus {
            outline: none;
            border-color: #0a1c3a;
            box-shadow: 0 0 0 3px rgba(10,28,58,0.08);
        }

        .filter-select-custom:hover {
            border-color: #0a1c3a;
        }

        /* Tags de catégorie rapide (chips) */
        .filter-chips {
            display: flex;
            flex-direction: column;
            gap: 3px;
        }

        .filter-chip {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 8px 10px;
            border-radius: 7px;
            border: 1.5px solid transparent;
            cursor: pointer;
            transition: all 0.15s ease;
            text-decoration: none;
            background: #f7f8fa;
        }

        .filter-chip:hover {
            background: #eef1f7;
            border-color: #d0d8e8;
            color: inherit;
        }

        .filter-chip.active {
            background: #eef2ff;
            border-color: #0a1c3a;
        }

        .filter-chip-label {
            font-size: 0.8rem;
            color: #2c2c2c;
            font-weight: 500;
        }

        .filter-chip.active .filter-chip-label {
            color: #0a1c3a;
            font-weight: 700;
        }

        .filter-chip-count {
            font-size: 0.68rem;
            color: #999;
            background: #e8ecf0;
            padding: 2px 6px;
            border-radius: 10px;
            font-weight: 600;
        }

        .filter-chip.active .filter-chip-count {
            background: #0a1c3a;
            color: white;
        }

        /* Slider de prix PREMIUM */
        .price-range-wrapper {
            padding-top: 4px;
        }

        .price-inputs-row {
            display: flex;
            gap: 8px;
            margin-bottom: 14px;
        }

        .price-input-box {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .price-input-box label {
            font-size: 0.65rem;
            color: #999;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .price-input-box input {
            width: 100%;
            border: 1.5px solid #e0e4ea;
            border-radius: 7px;
            padding: 7px 10px;
            font-size: 0.78rem;
            color: #333;
            font-weight: 600;
            text-align: center;
            transition: border-color 0.2s, box-shadow 0.2s;
            background: #f9fafb;
        }

        .price-input-box input:focus {
            outline: none;
            border-color: #0a1c3a;
            box-shadow: 0 0 0 3px rgba(10,28,58,0.08);
            background: white;
        }

        /* Double range slider */
        .dual-range-container {
            position: relative;
            height: 28px;
            display: flex;
            align-items: center;
            margin-bottom: 6px;
        }

        .dual-range-track {
            position: absolute;
            width: 100%;
            height: 4px;
            background: #e0e4ea;
            border-radius: 2px;
        }

        .dual-range-fill {
            position: absolute;
            height: 4px;
            background: linear-gradient(90deg, #e4a547, #0a1c3a);
            border-radius: 2px;
            pointer-events: none;
        }

        .dual-range-input {
            position: absolute;
            width: 100%;
            height: 4px;
            background: none;
            -webkit-appearance: none;
            appearance: none;
            pointer-events: none;
            outline: none;
        }

        .dual-range-input::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: white;
            border: 2.5px solid #0a1c3a;
            cursor: grab;
            pointer-events: all;
            box-shadow: 0 2px 6px rgba(10,28,58,0.25);
            transition: transform 0.15s, box-shadow 0.15s;
        }

        .dual-range-input::-webkit-slider-thumb:hover {
            transform: scale(1.15);
            box-shadow: 0 3px 10px rgba(10,28,58,0.35);
        }

        .dual-range-input::-webkit-slider-thumb:active {
            cursor: grabbing;
            background: #0a1c3a;
        }

        .dual-range-input::-moz-range-thumb {
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: white;
            border: 2.5px solid #0a1c3a;
            cursor: grab;
            pointer-events: all;
            box-shadow: 0 2px 6px rgba(10,28,58,0.25);
        }

        .price-labels {
            display: flex;
            justify-content: space-between;
            font-size: 0.7rem;
            color: #aaa;
            margin-top: 2px;
        }

        .btn-apply-price {
            width: 100%;
            margin-top: 12px;
            padding: 9px;
            background: #003679;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 0.78rem;
            font-weight: 700;
            cursor: pointer;
            letter-spacing: 0.5px;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .btn-apply-price:hover {
            
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(10,28,58,0.3);
        }

        .btn-apply-price:active {
            transform: translateY(0);
        }

        .btn-reset-price {
            width: 100%;
            margin-top: 6px;
            padding: 7px;
            background: none;
            color: #999;
            border: 1px solid #e0e4ea;
            border-radius: 8px;
            font-size: 0.72rem;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-reset-price:hover {
            border-color: #999;
            color: #555;
        }

        /* Filtre tri-rapide (sort inline) */
        .sort-pills {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
        }

        .sort-pill {
            padding: 5px 12px;
            border-radius: 20px;
            border: 1.5px solid #e0e4ea;
            font-size: 0.75rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.15s;
            color: #555;
            background: white;
            white-space: nowrap;
        }

        .sort-pill:hover, .sort-pill.active {
            background: #003679;
            border-color: #003679;
            color: white;
        }

        /* Filtre disponibilité */
        .availability-toggle {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 8px 10px;
            border-radius: 8px;
            background: #f7f8fa;
            margin-bottom: 6px;
            cursor: pointer;
            border: 1.5px solid transparent;
            transition: all 0.15s;
        }

        .availability-toggle:hover {
            border-color: #e0e4ea;
            background: #eef1f7;
        }

        .availability-toggle-label {
            font-size: 0.8rem;
            color: #333;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .availability-toggle-label .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #4CAF50;
            flex-shrink: 0;
        }

        .availability-toggle-label .dot.limited {
            background: #ff9800;
        }

        /* Toggle switch */
        .toggle-switch {
            position: relative;
            width: 32px;
            height: 18px;
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .toggle-slider {
            position: absolute;
            cursor: pointer;
            top: 0; left: 0; right: 0; bottom: 0;
            background: #ccc;
            border-radius: 18px;
            transition: .2s;
        }

        .toggle-slider:before {
            position: absolute;
            content: "";
            height: 12px;
            width: 12px;
            left: 3px;
            bottom: 3px;
            background: white;
            border-radius: 50%;
            transition: .2s;
        }

        .toggle-switch input:checked + .toggle-slider {
            background: #003679;
        }

        .toggle-switch input:checked + .toggle-slider:before {
            transform: translateX(14px);
        }

        /* Filtre note */
        .rating-filter-row {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 7px 10px;
            border-radius: 7px;
            cursor: pointer;
            background: #f7f8fa;
            margin-bottom: 4px;
            border: 1.5px solid transparent;
            transition: all 0.15s;
        }

        .rating-filter-row:hover, .rating-filter-row.active {
            background: #eef2ff;
            border-color: #0a1c3a;
        }

        .rating-filter-row .stars {
            display: flex;
            gap: 1px;
            color: #ffd700;
            font-size: 0.7rem;
        }

        .rating-filter-row .and-more {
            font-size: 0.72rem;
            color: #666;
            font-weight: 500;
        }

        /* Mobile - filtres collapsibles */
        @media (max-width: 992px) {
            .filters-sidebar {
                position: relative;
                top: 0;
                margin-top: 0;
                margin-bottom: 20px;
            }

            .mobile-filter-toggle {
                display: flex !important;
            }
        }

        .mobile-filter-toggle {
            display: none;
            align-items: center;
            gap: 8px;
            width: 100%;
            padding: 10px 16px;
            background: #f0f3f7;
            border: none;
            font-size: 0.82rem;
            font-weight: 600;
            color: #333;
            cursor: pointer;
            border-radius: 0 0 12px 12px;
        }

        /* Jauge de prix horizontale - garder pour compat JS */
        .price-bar-container { display: none; }
        .price-bar { display: none; }
        .price-bar-fill { display: none; }
        .price-bar-handle { display: none; }
        .price-bar-labels { display: none; }
        .reset-price-btn { display: none; }

        /* En-tête des produits */
        .products-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding: 15px 0;
            background: transparent;
        }

        .products-count {
            font-size: 0.9rem;
            color: #666;
        }

        .products-sort {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .products-sort label {
            font-size: 0.9rem;
            color: #666;
            margin: 0;
        }

        .products-sort select {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 8px 15px;
            font-size: 0.9rem;
            min-width: 200px;
        }

        /* MODIF: Grille de produits - EXACTEMENT 5 produits par ligne */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 20px;
            margin-bottom: 40px;
            min-height: 900px; /* Hauteur minimale pour 3 lignes de produits */
        }

        /* Carte produit */
        .product-card {
            background: white;
            border-radius: 6px;
            overflow: hidden;
            transition: all 0.3s ease;
            position: relative;
            box-shadow: 0 3px 10px rgba(139, 139, 139, 0.05);
            height: 100%; /* MODIF: Hauteur uniforme */
            display: flex; /* MODIF: Flex pour structure */
            flex-direction: column; /* MODIF: Colonne pour contenu */
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        /* Badge de réduction */
        .product-badge {
            position: absolute;
            top: 9px;
            left: 9px;
            padding: 3px 9px;
            border-radius: 3px;
            font-size: 0.65rem;
            font-weight: 600;
            z-index: 2;
            text-transform: uppercase;
        }

        .badge-new { background: #4CAF50; color: white; }
        .badge-sale { background: #ff6b35; color: white; }
        .badge-limited { background: #ff9800; color: white; }

        /* Image du produit */
        .product-image {
            position: relative;
            height: 200px; /* MODIF: Hauteur fixe */
            overflow: hidden;
            flex-shrink: 0; /* MODIF: Empêche le rétrécissement */
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .product-card:hover .product-image img {
            transform: scale(1.08);
        }

        .product-actions {
            position: absolute;
            top: 9px;
            right: 9px;
            display: flex;
            flex-direction: column;
            gap: 5px;
            opacity: 0;
            transform: translateX(10px);
            transition: all 0.3s ease;
        }

        .product-card:hover .product-actions {
            opacity: 1;
            transform: translateX(0);
        }

        .action-btn {
            width: 30px;
            height: 30px;
            background: white;
            border: none;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.8rem;
        }

        .action-btn:hover {
            background: #0a1c3a;
            color: white;
            transform: scale(1.1);
        }

        /* Corps de la carte - MODIF: Structure flexible */
        .product-info {
            padding: 14px;
            flex-grow: 1; /* MODIF: Prend l'espace restant */
            display: flex; /* MODIF: Flex pour alignement */
            flex-direction: column; /* MODIF: Colonne pour contenu */
        }

        .product-category {
            font-size: 0.68rem;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            margin-bottom: 4px;
        }

        .product-name {
            font-size: 0.85rem;
            font-weight: 600;
            color: #2c2c2c;
            margin-bottom: 7px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            line-height: 1.3;
            min-height: 36px;
            flex-grow: 1; /* MODIF: Prend l'espace disponible */
        }

        .product-price {
            font-size: 1rem;
            font-weight: 700;
            color: #000000;
            margin-bottom: 8px;
        }

        .old-price {
            font-size: 0.8rem;
            color: #6c757d;
            text-decoration: line-through;
            margin-left: 5px;
            font-weight: 400;
        }

        .horizontal-product-link {
            color: #0a1c3a;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.85rem;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        

        /* Cases vides pour compléter la grille */
        .product-card-placeholder {
            background: transparent;
            border: none;
            min-height: 350px;
            visibility: hidden;
        }

        /* Pagination améliorée */
        .pagination-wrapper {
            margin-top: 50px;
            padding: 20px 0;
            border-top: 1px solid #e9ecef;
        }

        .pagination-info {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 15px;
        }

        .pagination {
            display: flex;
            gap: 8px;
            list-style: none;
            justify-content: center;
        }

        .page-item .page-link {
            padding: 10px 16px;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            color: #0a1c3a;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .page-item.active .page-link {
            background-color: #0a1c3a;
            
            color: white;
        }

        .page-item .page-link:hover {
            background-color: #001224ff;
            color: white;
        }

        /* Section de description */
        .category-description {
            background: white;
            border-radius: 0;
            padding: 40px;
            margin-top: 60px;
            box-shadow: none;
            border-top: 1px solid #e9ecef;
        }

        .category-description h2 {
            font-size: 1.8rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 20px;
        }

        .category-description p {
            color: #666;
            line-height: 1.8;
            font-size: 1rem;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .products-grid {
                grid-template-columns: repeat(4, 1fr);
                min-height: 1200px; /* Ajustement hauteur */
            }
        }

        /* ===== FILTRE RESPONSIVE MOBILE ===== */
        @media (max-width: 992px) {
            .filters-sidebar {
                margin-bottom: 30px;
                border-right: none;
                border-bottom: 1px solid #e9ecef;
                position: relative;
            }

            .products-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 20px;
                min-height: 1500px;
            }
        }

        @media (max-width: 768px) {
            .products-header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .products-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
                min-height: 2200px; /* Ajustement hauteur */
            }

            .product-image img {
                height: 180px;
            }

            .product-name {
                font-size: 0.85rem;
            }

            .product-price {
                font-size: 1rem;
            }
        }

        @media (max-width: 576px) {
            .products-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 12px;
                min-height: 2000px;
            }

            .product-image {
                height: 160px;
            }

            .product-image img {
                height: 140px;
            }

            .product-info {
                padding: 12px;
            }

            .product-name {
                font-size: 0.8rem;
                margin-bottom: 8px;
            }

            .product-price {
                font-size: 0.95rem;
            }

            .horizontal-product-link {
                font-size: 0.8rem;
            }
        }

        /* Animation pour les images */
        .img-animate {
            transition: transform 0.4s ease;
        }

        .img-animate:hover {
            transform: scale(1.05);
        }

        /* ===== ANIMATION ENTRÉE SIDEBAR ===== */
        @keyframes slideInFilter {
            from { opacity: 0; transform: translateX(-8px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .filter-section-body {
            animation: slideInFilter 0.2s ease;
        }
    </style>

    <!-- SEO Meta Tags -->
    {!! SEOTools::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
</head>

<body>
    @include('header', ['souscategories' => $souscategories])
    
    <main>
        <!-- Section principale avec filtres et produits -->
        <section class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Sidebar des filtres -->
                    <div class="col-lg-3 col-xl-2 px-0">
                        <div class="filters-sidebar">

                            {{-- ===== EN-TÊTE SIDEBAR ===== --}}
                            <div class="filter-sidebar-header">
                                <h5 class="filter-title">
                                    <i class="fas fa-sliders-h"></i> Filtres
                                </h5>
                                @if(request()->hasAny(['price_min','price_max','sort','en_stock','note_min']))
                                    <a href="{{ url()->current() }}" class="btn-reset-all">Effacer</a>
                                @endif
                            </div>

                            {{-- ===== SECTION : CATÉGORIES ===== --}}
                            <div class="filter-section" id="section-cat">
                                <div class="filter-section-header" onclick="toggleSection('section-cat')">
                                    <h6>
                                        Catégories
                                        @php $hasCat = request()->is('produitcate/*'); @endphp
                                        @if($hasCat)<span class="filter-badge">1</span>@endif
                                    </h6>
                                    <i class="fas fa-chevron-down chevron"></i>
                                </div>
                                <div class="filter-section-body">
                                    <select id="categorySelect" class="filter-select-custom"
                                            onchange="location.href = this.value || '/produits';">
                                        <option value="">Toutes les catégories</option>
                                        @foreach ($souscategories as $category)
                                            <option value="/produitcate/{{ $category->id }}/{{ $category->nomCat }}"
                                                    {{ request()->is('produitcate/' . $category->id . '/*') ? 'selected' : '' }}>
                                                {{ $category->nomCat }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- ===== SECTION : PRIX ===== --}}
                            <div class="filter-section" id="section-prix">
                                <div class="filter-section-header" onclick="toggleSection('section-prix')">
                                    <h6>
                                        Prix
                                        @if(request()->hasAny(['price_min','price_max']))<span class="filter-badge">1</span>@endif
                                    </h6>
                                    <i class="fas fa-chevron-down chevron"></i>
                                </div>
                                <div class="filter-section-body">
                                    <div class="price-range-wrapper">
                                        {{-- Inputs min/max --}}
                                        <div class="price-inputs-row">
                                            <div class="price-input-box">
                                                <label>Min (FCFA)</label>
                                                <input type="number" id="priceMinInput"
                                                       value="{{ request('price_min', 0) }}"
                                                       min="0" max="5000000" step="50000"
                                                       placeholder="0">
                                            </div>
                                            <div class="price-input-box">
                                                <label>Max (FCFA)</label>
                                                <input type="number" id="priceMaxInput"
                                                       value="{{ request('price_max', 5000000) }}"
                                                       min="0" max="5000000" step="50000"
                                                       placeholder="5 000 000">
                                            </div>
                                        </div>

                                        {{-- Double range slider --}}
                                        <div class="dual-range-container">
                                            <div class="dual-range-track"></div>
                                            <div class="dual-range-fill" id="dualFill"></div>
                                            <input type="range" class="dual-range-input" id="rangeMin"
                                                   min="0" max="5000000" step="50000"
                                                   value="{{ request('price_min', 0) }}">
                                            <input type="range" class="dual-range-input" id="rangeMax"
                                                   min="0" max="5000000" step="50000"
                                                   value="{{ request('price_max', 5000000) }}">
                                        </div>

                                        <div class="price-labels">
                                            <span>0 FCFA</span>
                                            <span>5 000 000 FCFA</span>
                                        </div>

                                        <button class="btn-apply-price" onclick="applyPriceFilter()">
                                            <i class="fas fa-check"></i> Appliquer
                                        </button>

                                        @if(request()->hasAny(['price_min','price_max']))
                                            <button class="btn-reset-price"
                                                    onclick="location.href='{{ url()->current() }}'">
                                                Réinitialiser le prix
                                            </button>
                                        @endif

                                        {{-- Éléments cachés pour compat ancien JS --}}
                                        <div style="display:none">
                                            <div id="price-bar"><div id="price-bar-fill"></div>
                                            <div id="price-bar-handle-min"></div>
                                            <div id="price-bar-handle-max"></div></div>
                                            <span id="price-min-label"></span>
                                            <span id="price-max-label"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- ===== SECTION : TRI ===== --}}
                            <div class="filter-section" id="section-tri">
                                <div class="filter-section-header" onclick="toggleSection('section-tri')">
                                    <h6>Trier par</h6>
                                    <i class="fas fa-chevron-down chevron"></i>
                                </div>
                                <div class="filter-section-body">
                                    <div class="sort-pills">
                                        <button class="sort-pill {{ !request('sort') || request('sort')=='newest' ? 'active' : '' }}"
                                                onclick="applySortFilter('newest')">
                                            <i class="fas fa-star" style="font-size:0.65rem;"></i> Récents
                                        </button>
                                        <button class="sort-pill {{ request('sort')=='popular' ? 'active' : '' }}"
                                                onclick="applySortFilter('popular')">
                                            <i class="fas fa-fire" style="font-size:0.65rem;"></i> Populaires
                                        </button>
                                        <button class="sort-pill {{ request('sort')=='price_asc' ? 'active' : '' }}"
                                                onclick="applySortFilter('price_asc')">
                                            <i class="fas fa-arrow-up" style="font-size:0.65rem;"></i> Prix ↑
                                        </button>
                                        <button class="sort-pill {{ request('sort')=='price_desc' ? 'active' : '' }}"
                                                onclick="applySortFilter('price_desc')">
                                            <i class="fas fa-arrow-down" style="font-size:0.65rem;"></i> Prix ↓
                                        </button>
                                    </div>
                                </div>
                            </div>

                            {{-- ===== SECTION : DISPONIBILITÉ ===== --}}
                            <div class="filter-section" id="section-dispo">
                                <div class="filter-section-header" onclick="toggleSection('section-dispo')">
                                    <h6>Disponibilité</h6>
                                    <i class="fas fa-chevron-down chevron"></i>
                                </div>
                                <div class="filter-section-body">
                                    <label class="availability-toggle">
                                        <span class="availability-toggle-label">
                                            <span class="dot"></span> En stock uniquement
                                        </span>
                                        <label class="toggle-switch">
                                            <input type="checkbox" id="stockToggle"
                                                   {{ request('en_stock') == '1' ? 'checked' : '' }}
                                                   onchange="applyStockFilter(this.checked)">
                                            <span class="toggle-slider"></span>
                                        </label>
                                    </label>
                                    <label class="availability-toggle">
                                        <span class="availability-toggle-label">
                                            <span class="dot limited"></span> Stock limité (&lt;5)
                                        </span>
                                        <label class="toggle-switch">
                                            <input type="checkbox" id="limitedToggle"
                                                   {{ request('stock_limite') == '1' ? 'checked' : '' }}
                                                   onchange="applyStockLimiteFilter(this.checked)">
                                            <span class="toggle-slider"></span>
                                        </label>
                                    </label>
                                </div>
                            </div>

                            {{-- ===== SECTION : NOTE ===== --}}
                            <div class="filter-section" id="section-note">
                                <div class="filter-section-header" onclick="toggleSection('section-note')">
                                    <h6>Note minimale</h6>
                                    <i class="fas fa-chevron-down chevron"></i>
                                </div>
                                <div class="filter-section-body">
                                    @foreach([4, 3, 2] as $stars)
                                        <div class="rating-filter-row {{ request('note_min') == $stars ? 'active' : '' }}"
                                             onclick="applyRatingFilter({{ $stars }})">
                                            <div class="stars">
                                                @for($s = 1; $s <= 5; $s++)
                                                    <i class="{{ $s <= $stars ? 'fas' : 'far' }} fa-star"></i>
                                                @endfor
                                            </div>
                                            <span class="and-more">& plus</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Zone des produits -->
                    <div class="col-lg-9 col-xl-10" style="background-color: #ffffffff; padding: 30px;">
                        <!-- En-tête avec compteur -->
                        <div class="products-header">
                            <div class="products-count" style="font-size:0.85rem; color:#666; font-weight:500;">
                                <i class="fas fa-box-open me-1" style="color:#0a1c3a; opacity:0.6;"></i>
                                +
                                @if($produits->total())
                                    {{ $produits->total() }} produit{{ $produits->total() > 1 ? 's' : '' }} trouvé{{ $produits->total() > 1 ? 's' : '' }}
                                    &nbsp;·&nbsp; Page {{ $produits->currentPage() }}/{{ $produits->lastPage() }}
                                @else
                                    Aucun produit
                                @endif
                            </div>
                            {{-- Select caché pour compat JS sortSelect --}}
                            <select id="sortSelect" style="display:none;">
                                <option value="newest">Plus récents</option>
                                <option value="popular">Popularité</option>
                                <option value="price_asc">Prix croissant</option>
                                <option value="price_desc">Prix décroissant</option>
                            </select>
                        </div>

                        <!-- Message d'erreur si aucun résultat -->
                        @if(request()->has('no_results') && request('no_results') == '1')
                            <div class="alert alert-warning text-center mb-4" role="alert">
                                <i class="fas fa-search fa-2x mb-3 text-warning"></i>
                                <h5 class="alert-heading">Aucun résultat trouvé</h5>
                                <p class="mb-0">
                                    Désolé, nous n'avons trouvé aucun produit correspondant à "<strong>{{ request('search_term') }}</strong>".
                                    Essayez de reformuler votre recherche ou consultez nos catégories.
                                </p>
                            </div>
                        @endif

                        <!-- Grille des produits - MODIF: 3 lignes de 5 produits -->
                        <div class="products-grid">
                            @php
                                $productsPerPage = 15; // Correspond au paginate(15) du controller
                                $productsCount = $produits->count();
                                $emptySpots = max(0, $productsPerPage - $productsCount);
                            @endphp
                            
                            @foreach ($produits as $produit)
                                <div class="product-card">
                                    @if($produit->created_at->gt(now()->subDays(7)))
                                        <span class="product-badge badge-new">Nouveau</span>
                                    @elseif($produit->discount)
                                        <span class="product-badge badge-sale">-{{ $produit->discount }}%</span>
                                    @elseif($produit->qttestock < 5 && $produit->qttestock > 0)
                                        <span class="product-badge badge-limited">Stock limité</span>
                                    @endif

                                    <div class="product-image">
                                        @php
                                            $isOccasionOnly = in_array($produit->libelle, ['CLIMATISEURS WHIRLPOOL', 'CLIMATISEURS UP LIVE-MIDEA']);
                                            $detailUrl = $isOccasionOnly ? route('detailprod', ['id' => $produit->id]) . '?etat=occasion' : route('detailprod', ['id' => $produit->id]);
                                        @endphp
                                        <a href="{{ $detailUrl }}">
                                            @if(count($produit->images))
                                                <img src="{{ asset('photos/' . urlencode($produit->images[0]->nom)) }}" alt="{{ $produit->libelle }}">
                                            @else
                                                <img src="https://images.unsplash.com/photo-1585659722983-3a675dabf23d?q=80&w=400" alt="Produit">
                                            @endif
                                        </a>
                                        <div class="product-actions">
                                            <button class="action-btn" title="Favori">
                                                <i class="far fa-heart"></i>
                                            </button>
                                            <button class="action-btn" title="Comparer">
                                                <i class="fas fa-sync-alt"></i>
                                            </button>
                                            <button class="action-btn" title="Aperçu">
                                                <i class="far fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="product-info">
                                        <div class="product-category">{{ $produit->categorie->nomCat ?? 'APPAREILS' }}</div>
                                        <h3 class="product-name">
                                            <a href="/detailprod/{{ $produit->id }}" style="text-decoration: none; color: inherit;">
                                                {{ Str::limit($produit->libelle, 40) }}
                                            </a>
                                        </h3>
                                        <div class="product-price">
                                            @php
                                                $isOccasionOnly = in_array($produit->libelle, ['CLIMATISEURS WHIRLPOOL', 'CLIMATISEURS UP LIVE-MIDEA']);
                                                $displayPrice = $isOccasionOnly ? $produit->prixbonetat : $produit->prix;
                                            @endphp
                                            {{ number_format($displayPrice, 0, ',', ' ') }} FCFA
                                        </div>
                                        <div class="product-stars">
@php $rating = rand(35,50)/10; $full = floor($rating); $dec = $rating - $full; @endphp
@for($i=1; $i<=5; $i++)
  @if($i <= $full) <i class="fas fa-star star-filled"></i>
  @elseif($i == $full+1 && $dec > 0) <i class="fas fa-star" style="background: linear-gradient(90deg, #ffd700 {{ $dec*100 }}%, #e0e0e0 {{ $dec*100 }}%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;"></i>
  @else <i class="far fa-star"></i> @endif
@endfor
<span class="rating-text">({{ number_format($rating,1) }})</span>
                                        </div>
                                        <a href="#" onclick="addToCart({{ $produit->id }}); return false;" class="horizontal-product-link">
                                            <i class="fas fa-shopping-cart"></i> Ajoutez au panier
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                            
                            <!-- Cases vides pour compléter la grille si nécessaire -->
                            @for ($i = 0; $i < $emptySpots; $i++)
                                <div class="product-card-placeholder"></div>
                            @endfor
                        </div>

                        <!-- Pagination en bas -->
                        @if($produits->hasPages())
                            <div class="pagination-wrapper">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <div class="pagination-info">
                                            Page {{ $produits->currentPage() }} sur {{ $produits->lastPage() }} 
                                            • {{ $produits->total() }} 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <nav aria-label="Pagination">
                                            <ul class="pagination justify-content-end">
                                                <!-- Première page -->
                                                <li class="page-item {{ $produits->onFirstPage() ? 'disabled' : '' }}">
                                                    <a class="page-link" href="{{ $produits->url(1) }}" aria-label="Première">
                                                        <i class="fas fa-angle-double-left"></i>
                                                    </a>
                                                </li>
                                                
                                                <!-- Page précédente -->
                                                <li class="page-item {{ $produits->onFirstPage() ? 'disabled' : '' }}">
                                                    <a class="page-link" href="{{ $produits->previousPageUrl() }}" aria-label="Précédent">
                                                        <i class="fas fa-angle-left"></i>
                                                    </a>
                                                </li>
                                                
                                                <!-- Pages numérotées -->
                                                @php
                                                    $start = max(1, $produits->currentPage() - 2);
                                                    $end = min($produits->lastPage(), $start + 4);
                                                    $start = max(1, $end - 4);
                                                @endphp
                                                
                                                @for ($page = $start; $page <= $end; $page++)
                                                    @if($page == $produits->currentPage())
                                                        <li class="page-item active" aria-current="page">
                                                            <span class="page-link">{{ $page }}</span>
                                                        </li>
                                                    @else
                                                        <li class="page-item">
                                                            <a class="page-link" href="{{ $produits->url($page) }}">{{ $page }}</a>
                                                        </li>
                                                    @endif
                                                @endfor
                                                
                                                <!-- Page suivante -->
                                                <li class="page-item {{ !$produits->hasMorePages() ? 'disabled' : '' }}">
                                                    <a class="page-link" href="{{ $produits->nextPageUrl() }}" aria-label="Suivant">
                                                        <i class="fas fa-angle-right"></i>
                                                    </a>
                                                </li>
                                                
                                                <!-- Dernière page -->
                                                <li class="page-item {{ !$produits->hasMorePages() ? 'disabled' : '' }}">
                                                    <a class="page-link" href="{{ $produits->url($produits->lastPage()) }}" aria-label="Dernière">
                                                        <i class="fas fa-angle-double-right"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Description de la catégorie -->
                <div class="row">
                    <div class="col-12">
                        <div class="category-description">
                            <h2> 2NCORPORATE SHOP -  Équipements Professionnels </h2>
                            <p>
                                Découvrez notre sélection complète d'équipements électriques et électroniques professionnels au Cameroun.
                                Que vous soyez à la recherche de <strong>groupes électrogènes</strong>, <strong>systèmes de sécurité</strong>,
                                <strong>outils électroportatifs</strong>, <strong>matériel électrique</strong> ou <strong>équipements électroniques</strong>,
                                nous proposons exclusivement les meilleures marques internationales (Bosch, Samsung, Hikvision, Schneider Electric, Hisense).
                                Tous nos produits sont <strong>100% neufs et garantis</strong>, avec un service après-vente complet incluant
                                installation, maintenance et support technique. Livraison sécurisée dans tout le Cameroun avec possibilité
                                d'installation sur site pour les équipements complexes.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('footer1')

    <script>
        // Ajout au panier
        function addToCart(productId) {
            const link = event.target.closest('a');
            const originalHTML = link.innerHTML;

            link.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Ajout...';
            link.style.pointerEvents = 'none';

            fetch(`/addtocard/${productId}`, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                // Update cart count in header
                if (data.cartQuantity !== undefined) {
                    updateCartCount(data.cartQuantity);
                }

                // Update cart sidebar
                updateCartSidebar();

                // Show success toast
                if (window.showToast) {
                    showToast('Produit ajouté au panier avec succès !', 'success');
                }

                link.innerHTML = '<i class="fas fa-check"></i> Ajouté !';
                link.style.color = '#28a745';

                setTimeout(() => {
                    link.innerHTML = originalHTML;
                    link.style.color = '';
                    link.style.pointerEvents = '';
                }, 1500);
            })
            .catch(error => {
                console.error('Error:', error);
                let errorMessage = 'Erreur lors de l\'ajout au panier';

                if (error.error) {
                    errorMessage = error.error;
                }

                // Show error toast
                if (window.showToast) {
                    showToast(errorMessage, 'error');
                }

                link.innerHTML = originalHTML;
                link.style.pointerEvents = '';
            });
        }

        // Function to update cart count in header
        function updateCartCount(count) {
            const cartCount = document.querySelector('.cart-count');
            if (cartCount) {
                cartCount.textContent = count;
                cartCount.classList.add('updated');
                setTimeout(() => cartCount.classList.remove('updated'), 300);
            }
        }

        // Function to update cart sidebar
        function updateCartSidebar() {
            fetch('/cartupdate', {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                const cartItems = document.querySelector('.cart-items');
                const cartTotal = document.querySelector('#sidebar-total');
                const cartFooter = document.querySelector('.cart-sidebar-footer');

                if (cartItems && data.quantity && Object.keys(data.quantity).length > 0) {
                    let html = '';
                    let total = 0;

                    Object.keys(data.quantity).forEach(key => {
                        const item = data.quantity[key];
                        const itemTotal = item.qttestock * item.prix;
                        total += itemTotal;

                        html += `
                            <div class="cart-item-sidebar">
                                <div class="cart-item-image">
                                    <img src="/photos/${item.images}" alt="${item.libelle}">
                                </div>
                                <div class="cart-item-info">
                                    <h5>${item.libelle}</h5>
                                    <div class="cart-item-price">${item.prix.toLocaleString()} FCFA</div>
                                    <div class="cart-item-quantity">
                                        <button class="qty-btn" onclick="updateQuantity('${key.split('__')[0]}', '${key.split('__')[1]}', -1)">-</button>
                                        <span>${item.qttestock}</span>
                                        <button class="qty-btn" onclick="updateQuantity('${key.split('__')[0]}', '${key.split('__')[1]}', 1)">+</button>
                                    </div>
                                </div>
                                <div class="cart-item-remove">
                                    <small style="color: #e03434; cursor: pointer; font-size: 0.75rem; text-decoration: underline;" onclick="removeItem('${key}', '${key.split('__')[1]}')">Retirer</small>
                                </div>
                            </div>
                        `;
                    });

                    cartItems.innerHTML = html;

                    if (cartTotal) {
                        cartTotal.textContent = total.toLocaleString() + ' FCFA';
                    }

                    // Afficher les boutons de commande si le panier n'est pas vide
                    if (cartFooter) {
                        const orderButtons = cartFooter.querySelectorAll('.btn:not(.btn-outline-primary)');
                        orderButtons.forEach(btn => {
                            btn.style.display = 'block';
                        });
                    }
                } else if (cartItems) {
                    cartItems.innerHTML = `
                        <div class="empty-cart-sidebar">
                            <i class="fas fa-shopping-cart"></i>
                            <h4>Votre panier est vide</h4>
                            <p>Ajoutez des produits pour commencer vos achats</p>
                            <a href="/produits" class="btn btn-dark btn-sm px-2">
                                <i class="fas fa-shopping-bag me-2"></i>Explorer nos produits
                            </a>
                        </div>
                    `;

                    if (cartTotal) {
                        cartTotal.textContent = '0 FCFA';
                    }

                    // Masquer les boutons de commande si le panier est vide
                    if (cartFooter) {
                        const orderButtons = cartFooter.querySelectorAll('.btn:not(.btn-outline-primary)');
                        orderButtons.forEach(btn => {
                            btn.style.display = 'none';
                        });
                    }
                }
            })
            .catch(error => {
                console.error('Error updating cart sidebar:', error);
            });
        }

        // Gestion des boutons d'action
        document.querySelectorAll('.action-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const icon = this.querySelector('i');

                if (icon.classList.contains('fa-heart')) {
                    if (icon.classList.contains('far')) {
                        icon.classList.remove('far');
                        icon.classList.add('fas');
                        this.style.background = '#0a1c3a';
                        this.style.color = 'white';
                    } else {
                        icon.classList.remove('fas');
                        icon.classList.add('far');
                        this.style.background = '';
                        this.style.color = '';
                    }
                }
            });
        });

        // ===== TRI DES PRODUITS (via sort pills dans sidebar) =====
        document.getElementById('sortSelect').addEventListener('change', function() {
            const sortValue = this.value;
            const currentUrl = new URL(window.location.href);
            if (sortValue) {
                currentUrl.searchParams.set('sort', sortValue);
            } else {
                currentUrl.searchParams.delete('sort');
            }
            window.location.href = currentUrl.toString();
        });

        // ===== NOUVELLES FONCTIONS FILTRES SIDEBAR =====

        // Toggle collapse des sections
        function toggleSection(sectionId) {
            const section = document.getElementById(sectionId);
            section.classList.toggle('collapsed');
        }

        // Appliquer le filtre de tri
        function applySortFilter(value) {
            const url = new URL(window.location.href);
            url.searchParams.set('sort', value);
            window.location.href = url.toString();
        }

        // Filtre stock
        function applyStockFilter(checked) {
            const url = new URL(window.location.href);
            if (checked) {
                url.searchParams.set('en_stock', '1');
            } else {
                url.searchParams.delete('en_stock');
            }
            window.location.href = url.toString();
        }

        // Filtre stock limité
        function applyStockLimiteFilter(checked) {
            const url = new URL(window.location.href);
            if (checked) {
                url.searchParams.set('stock_limite', '1');
            } else {
                url.searchParams.delete('stock_limite');
            }
            window.location.href = url.toString();
        }

        // Filtre note
        function applyRatingFilter(stars) {
            const url = new URL(window.location.href);
            const currentNote = url.searchParams.get('note_min');
            if (currentNote == stars) {
                url.searchParams.delete('note_min');
            } else {
                url.searchParams.set('note_min', stars);
            }
            window.location.href = url.toString();
        }

        // Appliquer le filtre de prix
        function applyPriceFilter() {
            const minVal = parseInt(document.getElementById('priceMinInput').value) || 0;
            const maxVal = parseInt(document.getElementById('priceMaxInput').value) || 5000000;
            const url = new URL(window.location.href);
            if (minVal > 0) url.searchParams.set('price_min', minVal);
            else url.searchParams.delete('price_min');
            if (maxVal < 5000000) url.searchParams.set('price_max', maxVal);
            else url.searchParams.delete('price_max');
            window.location.href = url.toString();
        }

        // ===== DOUBLE RANGE SLIDER =====
        const rangeMin = document.getElementById('rangeMin');
        const rangeMax = document.getElementById('rangeMax');
        const priceMinInput = document.getElementById('priceMinInput');
        const priceMaxInput = document.getElementById('priceMaxInput');
        const dualFill = document.getElementById('dualFill');

        const MIN_PRICE = 0;
        const MAX_PRICE = 5000000;

        function updateDualFill() {
            if (!rangeMin || !rangeMax || !dualFill) return;
            const minVal = parseInt(rangeMin.value);
            const maxVal = parseInt(rangeMax.value);
            const minPercent = (minVal / MAX_PRICE) * 100;
            const maxPercent = (maxVal / MAX_PRICE) * 100;
            dualFill.style.left = minPercent + '%';
            dualFill.style.width = (maxPercent - minPercent) + '%';
        }

        function formatPrice(price) {
            return new Intl.NumberFormat('fr-FR').format(price) + ' FCFA';
        }

        if (rangeMin) {
            rangeMin.addEventListener('input', function() {
                const minVal = parseInt(this.value);
                const maxVal = parseInt(rangeMax.value);
                if (minVal >= maxVal) { this.value = maxVal - 50000; return; }
                priceMinInput.value = this.value;
                updateDualFill();
            });
        }

        if (rangeMax) {
            rangeMax.addEventListener('input', function() {
                const maxVal = parseInt(this.value);
                const minVal = parseInt(rangeMin.value);
                if (maxVal <= minVal) { this.value = minVal + 50000; return; }
                priceMaxInput.value = this.value;
                updateDualFill();
            });
        }

        if (priceMinInput) {
            priceMinInput.addEventListener('input', function() {
                const val = Math.min(parseInt(this.value) || 0, parseInt(priceMaxInput.value) - 50000);
                rangeMin.value = val;
                updateDualFill();
            });
            priceMinInput.addEventListener('keydown', function(e) {
                if (e.key === 'Enter') applyPriceFilter();
            });
        }

        if (priceMaxInput) {
            priceMaxInput.addEventListener('input', function() {
                const val = Math.max(parseInt(this.value) || MAX_PRICE, parseInt(priceMinInput.value) + 50000);
                rangeMax.value = val;
                updateDualFill();
            });
            priceMaxInput.addEventListener('keydown', function(e) {
                if (e.key === 'Enter') applyPriceFilter();
            });
        }

        // ===== ANCIEN SLIDER - stubs pour compat =====
        const priceBar = document.getElementById('price-bar');
        const priceBarFill = document.getElementById('price-bar-fill');
        const handleMin = document.getElementById('price-bar-handle-min');
        const handleMax = document.getElementById('price-bar-handle-max');
        const priceMinLabel = document.getElementById('price-min-label');
        const priceMaxLabel = document.getElementById('price-max-label');
        const urlParams = new URLSearchParams(window.location.search);
        let currentMinPrice = parseInt(urlParams.get('price_min')) || MIN_PRICE;
        let currentMaxPrice = parseInt(urlParams.get('price_max')) || MAX_PRICE;
        function updatePriceLabels() {}
        function updateSliderVisual() {}
        function snapToStep(v) { return v; }
        function handleStart() {}
        function handleMove() {}
        function handleEnd() {}
        if (handleMin) { handleMin.addEventListener('mousedown', () => {}); handleMin.addEventListener('touchstart', () => {}); }
        if (handleMax) { handleMax.addEventListener('mousedown', () => {}); handleMax.addEventListener('touchstart', () => {}); }
        document.addEventListener('mousemove', () => {});
        document.addEventListener('touchmove', () => {}, { passive: false });
        document.addEventListener('mouseup', () => {});
        document.addEventListener('touchend', () => {});

        // ===== INITIALISATION =====
        window.addEventListener('DOMContentLoaded', function() {
            updateDualFill();

            const urlParams = new URLSearchParams(window.location.search);
            const sortParam = urlParams.get('sort');
            if (sortParam) {
                document.getElementById('sortSelect').value = sortParam;
            }

            // Auto-hide warning messages after 3 seconds
            const warningAlerts = document.querySelectorAll('.alert-warning');
            warningAlerts.forEach(function(alert) {
                setTimeout(function() {
                    alert.style.transition = 'opacity 0.5s ease';
                    alert.style.opacity = '0';
                    setTimeout(function() { alert.remove(); }, 500);
                }, 3000);
            });
        });
    </script>
</body>
</html>