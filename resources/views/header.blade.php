<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2NCORPORATE - Style Djoolah</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        /* Top Header Bar - Blanc avec bordure */
        .top-header {
            background: #ffffff;
            border-bottom: 1px solid #e5e5e5;
            padding: 10px 0;
        }

        .top-header-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-menu-icon {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: #333;
            cursor: pointer;
            padding: 8px 12px;
            border-radius: 4px;
            transition: background 0.3s;
        }

        .header-menu-icon:hover {
            background: #f8f8f8;
        }

        .header-menu-icon i {
            font-size: 18px;
        }

        /* Demande de devis button styling */
        .btn-devis {
            background: #272727;
            color: #ffffff !important;
            text-decoration: none;
            padding: 10px 16px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .btn-devis:active {
            transform: translateY(0);
            box-shadow: 0 2px 8px rgba(224, 184, 63, 0.3);
        }

        .btn-devis i {
            font-size: 14px;
        }

        /* Contact Info Section - Inline and Centered */
        .header-contact-info {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            font-size: 12px;
            color: #666;
            flex: 1;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 5px 10px;
            border-radius: 4px;
            transition: all 0.3s;
        }

        .contact-item:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .contact-phone {
            font-weight: 600;
            color: #5b5b5b;
        }

        .contact-email {
            color: rgba(19, 19, 19, 1);
        }

        .contact-hours {
            color: #5b5b5b;
            font-weight: 500;
        }

        .contact-item i {
            font-size: 11px;
        }

        /* Logo centré */
        .header-logo {
            flex: 1;
        }

        .header-logo img {
            height: 45px;
            max-width: 200px;
            object-fit: contain;
        }

        /* Actions à droite */
        .header-actions {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .header-action-link {
            color: #333;
            text-decoration: none;
            font-size: 13px;
            padding: 8px 12px;
            border-radius: 4px;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 6px;
            position: relative;
        }

        .header-action-link:hover {
            background: #f8f8f8;
        }

        /* Top Header Dropdown */
        .header-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            background: #ffffff;
            min-width: 180px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15), 0 4px 10px rgba(0,0,0,0.1);
            border: 1px solid #e5e5e5;
            border-radius: 8px;
            border-top: none;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            z-index: 9999;
            overflow: hidden;
        }

        

        /* Triangle pointer */
        .header-dropdown::before {
            content: '';
            position: absolute;
            top: -6px;
            right: 15px;
            width: 0;
            height: 0;
            border-left: 6px solid transparent;
            border-right: 6px solid transparent;
            border-bottom: 6px solid #ffffff;
            z-index: 100;
        }

        .header-action-link:hover .header-dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .header-dropdown li {
            list-style: none;
        }

        .header-dropdown li a {
            display: block;
            padding: 10px 20px;
            color: #474747;
            text-decoration: none;
            font-size: 13px;
            transition: all 0.3s;
            border-bottom: 1px solid #f5f5f5;
        }

          ol, ul {

          padding-left: 0px;

          }

        .header-dropdown li:last-child a {
            border-bottom: none;
        }

        .header-dropdown li a:hover {
            background: #f8f9fa;
            color: #000;
        }

        /* Main Navigation - Fond gris clair */
        .main-navigation {
            background: #f8f9fa;
            border-bottom: 1px solid #e5e5e5;
            position: sticky;
            top: 0;
            z-index: 999;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 50px;
        }

        /* Menu principal */
        .main-menu {
            display: flex;
            list-style: none;
            gap: 0;
            align-items: center;
            flex: 1;
        }

        .main-menu > li {
            position: relative;
        }

        .main-menu > li > a {
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 15px 18px;
            color: #333;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s;
            white-space: nowrap;
        }

        .main-menu > li > a:hover {
            background: #ffffff;
            color: #000;
        }

        .main-menu > li > a i {
            font-size: 10px;
            transition: transform 0.3s;
        }

        .main-menu > li:hover > a i {
            transform: rotate(180deg);
        }

        /* Dropdown / Mega Menu - CORRECTION IMPORTANTE */
        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            background: #ffffff;
            min-width: 220px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border: 1px solid #e5e5e5;
            border-top: none;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease-in-out;
            z-index: 1000;
            display: block !important; /* Force l'affichage */
        }

        /* CORRECTION: Ce sélecteur était le problème */
        .main-menu > li:hover .dropdown-menu {
            opacity: 1 !important;
            visibility: visible !important;
            transform: translateY(0) !important;
        }

        /* Ajout d'un espace invisible pour maintenir le hover */
        .dropdown-menu::before {
            content: '';
            position: absolute;
            top: -10px;
            left: 0;
            width: 100%;
            height: 10px;
            background: transparent;
        }

        .dropdown-menu li {
            list-style: none;
        }

        .dropdown-menu li a {
            display: block;
            padding: 10px 20px;
            color: #666;
            text-decoration: none;
            font-size: 13px;
            transition: all 0.3s;
            border-bottom: 1px solid #f5f5f5;
        }

        .dropdown-menu li:last-child a {
            border-bottom: none;
        }

        .dropdown-menu li a:hover {
            background: #f8f9fa;
            color: #000;
            padding-left: 25px;
        }

        /* Search Bar - Style Djoolah */
        .search-box {
            flex: 0 1 400px;
            position: relative;
        }

        .search-form {
            position: relative;
            width: 100%;
        }

        .search-input {
            width: 100%;
            padding: 10px 45px 10px 15px;
            border: 1px solid #ffffff;
            border-radius: 25px;
            font-size: 13px;
            outline: none;
            transition: all 0.3s;
            background: #ffffff;
        }

        .search-input:focus {
            border-color: #ffffff;
        }

        .search-button {
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #666;
            cursor: pointer;
            padding: 8px 12px;
            border-radius: 50%;
            transition: all 0.3s;
        }

        .search-button:hover {
            background: #f0f0f0;
            color: #000;
        }

        /* Cart Button - Style Djoolah */
        .cart-button {
            position: relative;
            padding: 8px 20px;
            background: #f8f9fa;
            border: none;
            color: #333;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s;
            white-space: nowrap;
            cursor: pointer;
        }

       

        .cart-amount {
            font-weight: 700;
            color: #000;
        }

        .cart-count {
            position: absolute;
            top: -4px;
            right: 5px;
            background: #dc3545;
            color: white;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            font-weight: 700;
        }

        /* Secondary Navigation (sous le menu principal) */
        .secondary-nav {
            background: #ffffff;
            border-bottom: 1px solid #e5e5e5;
            padding: 12px 0;
        }

        .secondary-nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            gap: 25px;
            align-items: center;
            overflow-x: auto;
            scrollbar-width: none;
        }

        .secondary-nav-container::-webkit-scrollbar {
            display: none;
        }

        .secondary-link {
            color: #666;
            text-decoration: none;
            font-size: 13px;
            white-space: nowrap;
            transition: color 0.3s;
            padding: 5px 0;
        }

        .secondary-link:hover {
            color: #000;
        }

        /* Mobile Menu Toggle */
        .mobile-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            color: #333;
            cursor: pointer;
        }

        /* Mobile Menu Close Button */
        .mobile-close {
            display: none;
            position: absolute;
            top: 20px;
            right: 20px;
            background: none;
            border: none;
            font-size: 28px;
            color: #333;
            cursor: pointer;
            z-index: 1101;
            width: 40px;
            height: 40px;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: background 0.3s;
        }

        .mobile-close:hover {
            background: #f0f0f0;
        }

        /* Mobile Overlay */
        .mobile-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 1098;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .mobile-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        

        /* Search Results Dropdown */
        .search-results {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border: 1px solid #e5e5e5;
            border-top: none;
            border-radius: 0 0 8px 8px;
            max-height: 400px;
            overflow-y: auto;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            display: none;
            z-index: 1001;
        }

        .search-results.active {
            display: block;
        }

        .search-result-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 12px 15px;
            border-bottom: 1px solid #f5f5f5;
            cursor: pointer;
            transition: background 0.3s;
        }

        .search-result-item:hover {
            background: #f8f9fa;
        }

        .result-image {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 4px;
        }

        .result-info {
            flex: 1;
        }

        .result-title {
            font-size: 13px;
            color: #333;
            margin-bottom: 3px;
            font-weight: 500;
        }

        .result-price {
            font-size: 14px;
            color: #dc3545;
            font-weight: 700;
        }

        /* Animation pour le menu mobile */
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Cart Sidebar Styles */
        .cart-sidebar {
            position: fixed;
            top: 0;
            right: -400px;
            width: 400px;
            height: 100vh;
            background: white;
            box-shadow: -5px 0 15px rgba(0,0,0,0.1);
            z-index: 1050;
            transition: right 0.3s ease;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .cart-sidebar.active {
            right: 0;
        }

        .cart-sidebar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem;
            border-bottom: 1px solid #e9ecef;
            background: #ffffff;
        }

        .cart-sidebar-header h3 {
            margin: 0;
            font-size: 1.25rem;
            color: #0a1c3a;
        }

        .cart-close-btn {
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #000000;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 50%;
            transition: all 0.2s;
        }

        .cart-sidebar-content {
            flex: 1;
            overflow-y: auto;
            padding: 0;
        }

        .empty-cart-sidebar {
            text-align: center;
            padding: 3rem 1.5rem;
            color: #6c757d;
        }

        .empty-cart-sidebar i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #dee2e6;
        }

        .empty-cart-sidebar h4 {
            margin-bottom: 0.5rem;
            color: #495057;
        }

        .cart-items {
            padding: 0;
        }

        .cart-item-sidebar {
            display: flex;
            align-items: center;
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #f8f9fa;
            transition: background 0.2s;
        }

        .cart-item-image {
            width: 60px;
            height: 60px;
            margin-right: 1rem;
            flex-shrink: 0;
        }

        .cart-item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
        }

        .cart-item-info {
            flex: 1;
            min-width: 0;
        }

        .cart-item-info h5 {
            margin: 0 0 0.25rem 0;
            font-size: 0.9rem;
            font-weight: 600;
            color: #0a1c3a;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .cart-item-price {
            font-weight: 700;
            color: #000000;
            font-size: 0.85rem;
            margin-bottom: 0.5rem;
        }

        .cart-item-quantity {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .qty-btn {
            width: 25px;
            height: 25px;
            border: 1px solid #dee2e6;
            background: white;
            color: #495057;
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            transition: all 0.2s;
        }

        .qty-btn:hover {
            background: #0a1c3a;
            color: white;
            border-color: #0a1c3a;
        }

        .remove-item-btn {
            background: none;
            border: none;
            color: #020202;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 4px;
            transition: all 0.2s;
        }

        .remove-item-btn:hover {
            background: #f8d7da;
            color: #721c24;
        }

        .cart-sidebar-footer {
            border-top: 1px solid #e9ecef;
            padding: 1.5rem;
        }

        .cart-total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .total-amount {
            color: #000000;
        }

        .cart-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 1049;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .cart-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* ========== RESPONSIVE STYLES ========== */

        /* Tablet et petits écrans (1024px et moins) */
        @media (max-width: 1024px) {
            /* Cacher les infos de contact */
            .header-contact-info {
                display: none !important;
            }

            /* Réorganiser le top header */
            .top-header-container {
                gap: 15px;
            }

            /* Menu mobile */
            .mobile-toggle {
                display: block;
                order: 1;
            }

            .main-menu {
                position: fixed;
                top: 0;
                left: -100%;
                width: 280px;
                height: 100vh;
                background: white;
                flex-direction: column;
                padding: 80px 0 20px;
                overflow-y: auto;
                transition: left 0.3s ease;
                z-index: 1100;
                box-shadow: 2px 0 10px rgba(0,0,0,0.1);
                align-items: flex-start;
            }

            .main-menu.active {
                left: 0;
            }

            .main-menu > li {
                width: 100%;
                border-bottom: 1px solid #f0f0f0;
            }

            .main-menu > li > a {
                padding: 15px 20px;
                justify-content: space-between;
                width: 100%;
            }

            .main-menu > li > a:hover {
                background: #f8f9fa;
            }

            /* Dropdown dans le menu mobile */
            .dropdown-menu {
                position: static;
                opacity: 1;
                visibility: visible;
                transform: none;
                box-shadow: none;
                border: none;
                background: #f8f9fa;
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.3s ease;
                display: none !important;
            }

            .main-menu > li.active .dropdown-menu {
                max-height: 800px;
                display: block !important;
            }

            .dropdown-menu li a:hover {
                padding-left: 30px;
            }

            /* Bouton de fermeture du menu mobile */
            .mobile-close {
                display: flex;
            }

            /* Mobile Overlay active - couvrir seulement l'arrière-plan */
            .mobile-overlay.active {
                left: 280px;
                width: calc(100% - 280px);
            }

            /* Search box */
            .search-box {
                flex: 1;
                max-width: none;
                order: 3;
            }

            /* Secondary nav caché */
            .secondary-nav {
                display: none;
            }

            /* Navigation container */
            .nav-container {
                gap: 15px;
            }
        }

        /* Mobile (768px et moins) */
        @media (max-width: 768px) {
            /* Top header */
            .top-header-container {
                padding: 0 15px;
                flex-wrap: wrap;
                gap: 10px;
            }

            /* Logo */
            .header-logo {
                order: 1;
                flex: 0 0 auto;
            }

            .header-logo img {
                height: 35px;
            }

            /* Actions */
            .header-actions {
                order: 2;
                gap: 8px;
                margin-left: auto;
            }

            /* Cacher le texte des boutons, garder les icônes */
            .header-action-link span {
                display: none;
            }

            .header-action-link {
                padding: 8px;
            }

            .btn-devis span {
                display: none;
            }

            .btn-devis {
                padding: 8px 12px;
                font-size: 14px;
            }

            .btn-devis i {
                margin: 0;
            }

            /* Navigation principale */
            .nav-container {
                padding: 0 15px;
                height: 50px;
            }

            /* Search input */
            .search-input {
                font-size: 13px;
                padding: 8px 40px 8px 12px;
            }

            /* Cart button */
            .cart-button {
                padding: 8px 12px;
            }

            .cart-button span:not(.cart-count) {
                display: none;
            }

            /* Menu mobile plus large */
            .main-menu {
                width: 85%;
                max-width: 320px;
            }

            /* Mobile Overlay active - ajuster pour menu plus large */
            .mobile-overlay.active {
                left: 320px;
                width: calc(100% - 320px);
            }
        }

        /* Très petits écrans (480px et moins) */
        @media (max-width: 480px) {
            .top-header-container {
                padding: 0 10px;
            }

            .header-logo img {
                height: 30px;
            }

            .nav-container {
                padding: 0 10px;
                height: 45px;
            }

            .search-input {
                font-size: 12px;
                padding: 7px 35px 7px 10px;
            }

            .btn-devis {
                padding: 6px 10px;
                font-size: 12px;
            }

            /* Cart sidebar pleine largeur */
            .cart-sidebar {
                width: 100vw;
                right: -100vw;
            }

            .cart-sidebar.active {
                right: 0;
            }

            /* Menu mobile pleine largeur */
            .main-menu {
                width: 100%;
                max-width: 100%;
            }

            /* Pas d'overlay sur très petits écrans pour éviter de couvrir le menu */
            .mobile-overlay.active {
                display: none;
            }

            .cart-sidebar-header {
                padding: 1rem;
            }

            .cart-sidebar-footer {
                padding: 1rem;
            }

            .cart-item-sidebar {
                padding: 0.75rem 1rem;
            }
        }
    </style>

    <!-- Toast Notification Styles -->
    <style>
        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1060;
        }

        .toast {
            max-width: 350px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            border: none;
            margin-bottom: 10px;
            overflow: hidden;
        }

        .toast.success {
            border-left: 4px solid #28a745;
        }

        .toast.error {
            border-left: 4px solid #dc3545;
        }

        .toast.warning {
            border-left: 4px solid #ffc107;
        }

        .toast.info {
            border-left: 4px solid #17a2b8;
        }

        .toast-header {
            background: #f8f9fa;
            border-bottom: 1px solid #e9ecef;
            padding: 0.75rem 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .toast-body {
            padding: 1rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .toast-icon {
            font-size: 18px;
            flex-shrink: 0;
        }

        .toast.success .toast-icon {
            color: #28a745;
        }

        .toast.error .toast-icon {
            color: #dc3545;
        }

        .toast.warning .toast-icon {
            color: #ffc107;
        }

        .toast.info .toast-icon {
            color: #17a2b8;
        }

        .toast-close {
            background: none;
            border: none;
            font-size: 20px;
            color: #6c757d;
            cursor: pointer;
            padding: 0;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.2s;
        }

        .toast-close:hover {
            background: #e9ecef;
            color: #495057;
        }

        .toast.show {
            animation: slideInRight 0.3s ease-out;
        }

        .toast.hide {
            animation: slideOutRight 0.3s ease-in forwards;
        }

        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideOutRight {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }

        @media (max-width: 480px) {
            .toast-container {
                left: 10px;
                right: 10px;
                top: 10px;
            }

            .toast {
                max-width: none;
            }
        }
    </style>
</head>
<body>

    <!-- Toast Notifications Container -->
    <div class="toast-container" id="toast-container">
        <!-- Toasts will be dynamically added here -->
    </div>

    <!-- Mobile Overlay -->
    <div class="mobile-overlay" id="mobile-overlay"></div>

    <!-- Top Header -->
    <div class="top-header">
        <div class="top-header-container">
            <div class="header-logo">
                <a href="/">
                    <img src="{{ asset('img/Gemini_Generated_Image_64jw0s64jw0s64jw.png') }}" alt="2N CORPORATE SHOP">
                </a>
            </div>

            <div class="header-contact-info">
                <div class="contact-item">
                    <i class="fas fa-phone"></i>
                    <span class="contact-phone">+237 694 015 788 / 691 102 395</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <span class="contact-email">info@2ncorporate.com</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-clock"></i>
                    <span class="contact-hours">Lun-Sam : 8h-18h</span>
                </div>
            </div>

            <div class="header-actions">
                <div class="header-action-link">
                    <i class="far fa-user"></i>
                    <span>@auth {{ Auth::user()->name }} @else Mon compte @endauth</span>
                    <i class="fas fa-chevron-down" style="font-size: 10px; margin-left: 5px;"></i>
                    <ul class="header-dropdown">
                        @auth
                            <li><a href="{{ route('monCompte') }}">Mon profil</a></li>
                            <li>
                                <form action="{{ route('logout') }}" method="post" style="display: inline;">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" style="background: none; border: none; color: inherit; text-decoration: none; cursor: pointer;">Déconnexion</button>
                                </form>
                            </li>
                        @else
                            <li><a href="{{ route('login') }}">Connectez-vous</a></li>
                            <li><a href="{{ route('signin') }}">Inscription</a></li>
                        @endauth
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="main-navigation">
        <div class="nav-container">
            <button class="mobile-toggle" id="mobile-toggle">
                <i class="fas fa-bars"></i>
            </button>

            <ul class="main-menu" id="main-menu">
                <button class="mobile-close" id="mobile-close">
                    <i class="fas fa-times"></i>
                </button>
                
@forelse($souscategories ?? [] as $cat)
                <li>
                    <a href="#" class="menu-item-with-dropdown">
                        {{ $cat->nomCat }}
                        <i class="fas fa-chevron-down"></i>
                    </a>
                    @include('partials.menu-categorie', ['categorieId' => $cat->id, 'categorieName' => $cat->nomCat])
                </li>
@empty
                <li>
                    <a href="/produits">
                        Produits
                    </a>
                </li>
@endforelse






            </ul>

            <div class="search-box">
                <form class="search-form" action="{{ route('search.handle') }}" method="POST">
                    @csrf
                    <input type="text" class="search-input" placeholder="Recherche de produits" name="query" id="searchInput">
                    <button type="submit" class="search-button">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
                <!-- Live Search Results Dropdown -->
                <div class="search-results" id="searchResults">
                    <!-- Results will be populated by JavaScript -->
                </div>
            </div>

            @php
                $cart = session()->get('cart', []);
                $cartCount = 0;
                foreach ($cart as $item) {
                    $cartCount += $item['qttestock'] ?? 0;
                }
            @endphp
            <button class="cart-button" onclick="toggleCartSidebar()">
                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                </svg>
                <span class="cart-count">{{ $cartCount }}</span>
            </button>
        </div>
    </nav>

    <!-- Secondary Navigation -->
    <div class="secondary-nav">
        <div class="secondary-nav-container">
            <a href="/" class="secondary-link">~</a>
            <a href="/" class="secondary-link">Accueil</a>
            <a href="#" class="secondary-link">/</a>
            <a href="/produits" class="secondary-link">Produits</a>
        </div>
    </div>

    <!-- Cart Sidebar -->
    <div id="cart-sidebar" class="cart-sidebar">
        <div class="cart-sidebar-header">
            <h3><strong>Votre Panier</strong></h3>
            <button class="cart-close-btn" onclick="toggleCartSidebar()">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="cart-sidebar-content">
            @php
                $cart = session()->get('cart', []);
                $totalle = 0;
            @endphp

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin: 1rem;">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="cart-items">
                @if(empty($cart))
                    <div class="empty-cart-sidebar">
                        <i class="fas fa-shopping-cart"></i>
                        <h4>Votre panier est vide</h4>
                        <p>Ajoutez des produits pour commencer vos achats</p>
                        <a href="{{ route('produits') }}" class="btn btn-dark btn-sm px-2">
                            <i class="fas fa-shopping-bag me-2" style="font-size: 10px;">Explorer nos produits</i>
                        </a>
                    </div>
                @else
                    @foreach ($cart as $id => $produit)
                        @php
                            $totalle += $produit['qttestock'] * $produit['prix'];
                            $parts = explode('__', $id);
                            $productId = $parts[0];
                            $etat = $parts[1] ?? 'neuve';
                            $itemTotal = $produit['qttestock'] * $produit['prix'];
                        @endphp

                        <div class="cart-item-sidebar">
                            <div class="cart-item-image">
                                <img src="{{ asset('photos/' . $produit['images']) }}" alt="{{ $produit['libelle'] }}">
                            </div>
                            <div class="cart-item-info">
                                <h5>{{ Str::limit($produit['libelle'], 30) }}</h5>
                                <div class="cart-item-price">{{ number_format($produit['prix'], 0, ',', ' ') }} FCFA</div>
                                <div class="cart-item-quantity">
                                    <button class="qty-btn" onclick="updateQuantity('{{ $productId }}', '{{ $etat }}', -1)">-</button>
                                    <span>{{ $produit['qttestock'] }}</span>
                                    <button class="qty-btn" onclick="updateQuantity('{{ $productId }}', '{{ $etat }}', 1)">+</button>
                                </div>
                                <div class="cart-item-remove">
                                    <small style="color: #e03434; cursor: pointer; font-size: 0.75rem; text-decoration: underline;" onclick="removeItem('{{ $id }}', '{{ $etat }}')">Retirer</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="cart-sidebar-footer">
            <div class="cart-total">
                <span>Total:</span>
                <span class="total-amount" id="sidebar-total">{{ number_format($totalle, 0, ',', ' ') }} FCFA</span>
            </div>
            <a href="{{ route('cartshopping') }}" class="btn btn-outline-primary w-100 mb-2">
                <i class="fas fa-shopping-cart me-2"></i>Voir mon panier
            </a>
            <button class="btn btn-dark w-100 mb-2" onclick="checkout()" style="display: {{ !empty($cart) ? 'block' : 'none' }};">
                <i class="fas fa-credit-card me-2"></i>Commander
            </button>
           <!-- <button class="btn w-100 mb-2" onclick="commanderWhatsApp()" style="background-color: #25d366; border-color: #25d366; color: white; display: {{ !empty($cart) ? 'block' : 'none' }};">
                <i class="fab fa-whatsapp me-2"></i>Commander via WhatsApp
            </button> -->
        </div>
    </div>

    <!-- Cart Sidebar Overlay -->
    <div id="cart-overlay" class="cart-overlay" onclick="toggleCartSidebar()"></div>

    <!-- Checkout Modal -->
    <div class="modal fade" id="commandeModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Comment souhaitez-vous commander ?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="d-grid gap-2">
                        <a href="/finaliser" class="btn btn-success btn-lg">
                            <i class="fas fa-bolt me-2"></i>Commande rapide
                        </a>
                        <a href="/login" class="btn btn-primary btn-lg">
                            <i class="fas fa-user me-2"></i>Avec mon compte
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Mobile Menu Toggle
        const mobileToggle = document.getElementById('mobile-toggle');
        const mobileClose = document.getElementById('mobile-close');
        const mainMenu = document.getElementById('main-menu');
        const mobileOverlay = document.getElementById('mobile-overlay');

        function toggleMobileMenu() {
            mainMenu.classList.toggle('active');
            mobileOverlay.classList.toggle('active');
            document.body.style.overflow = mainMenu.classList.contains('active') ? 'hidden' : 'auto';
        }

        mobileToggle?.addEventListener('click', toggleMobileMenu);
        mobileClose?.addEventListener('click', toggleMobileMenu);
        mobileOverlay?.addEventListener('click', toggleMobileMenu);

        // Mobile Menu Dropdown Toggle - click et hover pour mobile
        document.querySelectorAll('.menu-item-with-dropdown').forEach(item => {
            if (window.innerWidth <= 1024) {
                // Pour mobile: ajouter hover en plus du click
                item.addEventListener('mouseenter', function(e) {
                    const parent = this.parentElement;
                    parent.classList.add('active');

                    // Fermer les autres dropdowns
                    document.querySelectorAll('.main-menu > li').forEach(otherLi => {
                        if (otherLi !== parent && otherLi.classList.contains('active')) {
                            otherLi.classList.remove('active');
                        }
                    });
                });

                item.addEventListener('mouseleave', function(e) {
                    // Ne pas fermer immédiatement, donner du temps pour naviguer
                    setTimeout(() => {
                        const parent = this.parentElement;
                        // Vérifier si la souris n'est pas sur le dropdown
                        const dropdown = parent.querySelector('.dropdown-menu');
                        if (dropdown && !dropdown.matches(':hover')) {
                            parent.classList.remove('active');
                        }
                    }, 100);
                });

                // Garder le click aussi
                item.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    const parent = this.parentElement;
                    parent.classList.toggle('active');

                    // Fermer les autres dropdowns
                    document.querySelectorAll('.main-menu > li').forEach(otherLi => {
                        if (otherLi !== parent && otherLi.classList.contains('active')) {
                            otherLi.classList.remove('active');
                        }
                    });
                });
            }
        });

        // Empêcher la navigation sur desktop quand on veut ouvrir le dropdown
        document.querySelectorAll('.main-menu > li > a[href="#"]').forEach(item => {
            item.addEventListener('click', function(e) {
                if (window.innerWidth > 1024) {
                    e.preventDefault();
                    e.stopPropagation();
                }
            });
        });

        // Live Search Functionality
        const searchInput = document.getElementById('searchInput');
        const searchResultsEl = document.getElementById('searchResults');

        // Debounce utility
        function debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        }

        // Format price
        function formatPrice(price) {
            return new Intl.NumberFormat('fr-FR').format(price) + ' FCFA';
        }

        // Live search
        const performSearch = debounce((query) => {
            if (query.length < 2) {
                searchResultsEl.innerHTML = '';
                searchResultsEl.classList.remove('active');
                return;
            }

            searchResultsEl.innerHTML = '<div style="padding: 20px 15px; text-align: center; color: #666;"><i class="fas fa-spinner fa-spin"></i> Recherche...</div>';
            searchResultsEl.classList.add('active');

            fetch(`/search-products?query=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(products => {
                    if (products.length === 0) {
                        searchResultsEl.innerHTML = '<div style="padding: 20px 15px; text-align: center; color: #999;">Aucun produit trouvé</div>';
                        return;
                    }

                    searchResultsEl.innerHTML = products.map(product => {
                        const imageSrc = product.images && product.images.length > 0 
                            ? `/photos/${product.images[0].nom}` 
                            : 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNTAiIGhlaWdodD0iNTAiIHZpZXdCb3g9IjAgMCA1MCA1MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3Qgd2lkdGg9IjUwIiBoZWlnaHQ9IjUwIiBmaWxsPSIjRTVFNUVFIi8+Cjx0ZXh0IHg9IjI1IiB5PSIyOCIgZm9udC1mYW1pbHk9IkFyaWFsIiBmb250LXNpemU9IjE0IiBmaWxsPSIjOUI5OUJCIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIj5ObSBpbWFnZTwvdGV4dD4KPC9zdmc+';
                        return `
                            <a href="/detailprod/${product.id}" class="search-result-item" style="text-decoration: none; color: inherit; display: block;">
                                <img src="${imageSrc}" alt="${product.libelle}" class="result-image" loading="lazy">
                                <div class="result-info">
                                    <div class="result-title">${product.libelle}</div>
                                    <div class="result-price">${formatPrice(product.prix)}</div>
                                </div>
                            </a>
                        `;
                    }).join('');
                })
                .catch(error => {
                    console.error('Search error:', error);
                    searchResultsEl.innerHTML = '<div style="padding: 20px 15px; text-align: center; color: #dc3545;">Erreur de recherche</div>';
                });
        }, 300);

        searchInput?.addEventListener('input', (e) => {
            const query = e.target.value.trim();
            performSearch(query);
            
            // Masquer dropdown si effacement
            if (query.length === 0) {
                if (searchResultsEl) {
                    searchResultsEl.classList.remove('active');
                    searchResultsEl.innerHTML = '';
                }
            }
        });

        // Close search results when clicking outside (y compris dropdowns autres menus)
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.search-box') && !e.target.closest('.header-action-link')) {
                if (searchResultsEl && searchResultsEl.classList.contains('active')) {
                    searchResultsEl.classList.remove('active');
                    searchResultsEl.innerHTML = '';
                }
            }
        });

        // Prevent form submission if search is empty
        document.querySelector('.search-form')?.addEventListener('submit', (e) => {
            const query = searchInput.value.trim();
            if (query.length === 0) {
                e.preventDefault();
                return false;
            }
        });

        // Cart Sidebar Functions
        function toggleCartSidebar() {
            const sidebar = document.getElementById('cart-sidebar');
            const overlay = document.getElementById('cart-overlay');

            if (sidebar && overlay) {
                sidebar.classList.toggle('active');
                overlay.classList.toggle('active');
                document.body.style.overflow = sidebar.classList.contains('active') ? 'hidden' : 'auto';
            }
        }

        function updateQuantity(productId, etat, change) {
            const url = change > 0 ? '/addtocard1/' + productId + '/' + etat : '/minusfromcard/' + productId + '/' + etat;

            fetch(url, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        function removeItem(productKey, etat) {
            fetch('/suprimerprodcard/' + productKey + '/' + etat, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                    setTimeout(() => {
                        toggleCartSidebar();
                    }, 100);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                window.location.href = '/suprimerprodcard/' + productKey + '/' + etat;
            });
        }

        function checkout() {
            window.location.href = '/finaliser';
        }

        function commanderWhatsApp() {
            @php
                $cart = session()->get('cart', []);
                if (empty($cart)) {
                    echo 'alert("Votre panier est vide. Veuillez ajouter des produits avant de commander.");';
                    echo 'return;';
                }
                $message = "Bonjour, je souhaite commander les produits suivants :\\n\\n";
                $total = 0;
                foreach ($cart as $id => $produit) {
                    $message .= "- " . $produit['libelle'] . " (Quantité: " . $produit['qttestock'] . ", Prix: " . number_format($produit['prix'], 0, ',', ' ') . " FCFA)\\n";
                    $total += $produit['prix'] * $produit['qttestock'];
                }
                $message .= "\\nTotal: " . number_format($total, 0, ',', ' ') . " FCFA\\n\\nMerci !";
            @endphp
            const whatsappUrl = "https://wa.me/237694015788?text=" + encodeURIComponent("{{ $message }}");
            window.open(whatsappUrl, '_blank');
        }

        // Close sidebar when clicking escape
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                const sidebar = document.getElementById('cart-sidebar');
                if (sidebar?.classList.contains('active')) {
                    toggleCartSidebar();
                }
                if (mainMenu?.classList.contains('active')) {
                    toggleMobileMenu();
                }
            }
        });

        // Toast Notification System
        class Toast {
            constructor(message, type = 'success', duration = 2000) {
                this.message = message;
                this.type = type;
                this.duration = duration;
                this.element = null;
                this.create();
                this.show();
            }

            create() {
                const toast = document.createElement('div');
                toast.className = `toast ${this.type}`;

                const icons = {
                    success: 'fas fa-check-circle',
                    error: 'fas fa-exclamation-circle',
                    warning: 'fas fa-exclamation-triangle',
                    info: 'fas fa-info-circle'
                };

                toast.innerHTML = `
                    <div class="toast-body">
                        <i class="${icons[this.type] || icons.success} toast-icon"></i>
                        <span>${this.message}</span>
                        <button class="toast-close" onclick="this.parentElement.parentElement.remove()">×</button>
                    </div>
                `;

                this.element = toast;
            }

            show() {
                const container = document.getElementById('toast-container');
                if (container) {
                    container.appendChild(this.element);

                    setTimeout(() => {
                        this.element.classList.add('show');
                    }, 10);

                    setTimeout(() => {
                        this.hide();
                    }, this.duration);
                }
            }

            hide() {
                if (this.element) {
                    this.element.classList.add('hide');
                    setTimeout(() => {
                        if (this.element && this.element.parentNode) {
                            this.element.parentNode.removeChild(this.element);
                        }
                    }, 300);
                }
            }
        }

        // Global toast function
        function showToast(message, type = 'success', duration = 2000) {
            new Toast(message, type, duration);
        }

        // Auto-hide success messages
        document.addEventListener('DOMContentLoaded', function() {
            const successAlerts = document.querySelectorAll('.alert-success');
            successAlerts.forEach(function(alert) {
                setTimeout(function() {
                    alert.style.transition = 'opacity 0.5s ease';
                    alert.style.opacity = '0';
                    setTimeout(function() {
                        alert.remove();
                    }, 500);
                }, 2000);
            });

            @auth
            sessionStorage.setItem('tab_logged_in', 'true');
            @endauth
        });

        // Debug pour vérifier le hover sur les menus
        document.addEventListener('DOMContentLoaded', function() {
            if (window.innerWidth > 1024) {
                console.log('Mode desktop détecté');
                document.querySelectorAll('.main-menu > li').forEach(item => {
                    item.addEventListener('mouseenter', function() {
                        console.log('Hover sur menu:', this.querySelector('a').textContent.trim());
                    });
                });
            }
        });
    </script>

    <!-- ===== ICÔNE SUPPORT TECHNIQUE - GLOBAL (TOUTES PAGES) ===== -->
    <style>
    .support-float{position:fixed;bottom:25px;right:25px;z-index:9999;}
    .support-btn{width:60px;height:60px;background:transparent;color:black;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:1.3rem;box-shadow:0 8px 25px rgba(10,28,58,0.3);transition:all .3s;position:relative;text-decoration:none;}
    .support-btn:hover{background:#e0b83f;transform:scale(1.1);box-shadow:0 12px 35px rgba(224,184,63,0.4);}
    .support-tooltip{position:absolute;bottom:100%;left:50%;transform:translateX(-50%);background:#0a1c3a;color:white;padding:8px 12px;border-radius:6px;font-size:.8rem;white-space:nowrap;opacity:0;visibility:hidden;transition:all .3s;margin-bottom:8px;}
    .support-tooltip::after{content:'';position:absolute;top:100%;left:50%;transform:translateX(-50%);border:5px solid transparent;border-top-color:#0a1c3a;}
    .support-btn:hover .support-tooltip{opacity:1;visibility:visible;}
    @media(max-width:768px){.support-float{bottom:20px;right:20px;}.support-btn{width:55px;height:55px;font-size:1.2rem;}}
    </style>
    <div class="support-float">
        <a href="{{ route('support') }}" class="support-btn" title="Support Technique 6j/7">
            <i class="fas fa-headset"></i>
            <span class="support-tooltip">Besoin d'aide ?</span>
        </a>
    </div>
</body>
</html>
