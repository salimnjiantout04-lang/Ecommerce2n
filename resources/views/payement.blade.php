<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finaliser la Commande - 2N SHOP</title>
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
            background: linear-gradient(135deg, #ffffff);
            line-height: 1.6;
            font-size: 15px;
            min-height: 100vh;
           
            
        }

        /* Layout */
        .checkout-container {
            max-width: 1400px;
            margin: 50px auto;
            padding: 0 20px;
        }

        .checkout-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .checkout-header h1 {
            font-size: 32px;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .checkout-header p {
            color: var(--text-gray);
            font-size: 16px;
        }

        .checkout-layout {
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 30px;
            align-items: flex-start;
        }

        .checkout-main {
            min-width: 0;
        }

        .checkout-sidebar {
            position: sticky;
            top: 20px;
            max-height: 80vh;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        /* Progress Bar */
        .checkout-progress {
            background: white;
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        .progress-steps {
            display: flex;
            justify-content: space-between;
            position: relative;
            margin-bottom: 20px;
        }

        .progress-line {
            position: absolute;
            top: 20px;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--border-color);
            z-index: 1;
        }

        .progress-line-fill {
            position: absolute;
            top: 20px;
            left: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
            z-index: 2;
            transition: width 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            width: 0%;
        }

        .step-wrapper {
            position: relative;
            z-index: 3;
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .step {
            background: #fff;
            border: 3px solid var(--border-color);
            border-radius: 50%;
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: var(--text-gray);
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .step i {
            font-size: 16px;
        }

        .step.active {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: var(--text-light);
            transform: scale(1.1);
        }

        .step.completed {
            background: var(--success-color);
            border-color: var(--success-color);
            color: var(--text-light);
        }

        .step-label {
            font-size: 13px;
            font-weight: 600;
            color: var(--text-gray);
            text-align: center;
            margin-top: 12px;
            max-width: 100px;
        }

        .step-wrapper.active .step-label {
            color: var(--primary-color);
        }

        .step-wrapper.completed .step-label {
            color: var(--success-color);
        }

        /* Form Steps */
        .checkout-step {
            display: none;
            animation: fadeInUp 0.4s ease;
        }

        .checkout-step.active {
            display: block;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .step-content {
            background: white;
            border-radius: 12px;
            padding: 35px;
            margin-bottom: 25px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
        }

        .step-title {
            font-size: 26px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .step-title i {
            color: var(--primary-color);
            font-size: 24px;
        }

        .step-subtitle {
            color: var(--text-gray);
            font-size: 14px;
            margin-bottom: 30px;
        }

        /* Form Elements */
        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-label .required {
            color: var(--danger-color);
            margin-left: 3px;
        }

        .form-control {
            width: 100%;
            padding: 13px 16px;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s ease;
            background: white;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(10, 28, 58, 0.1);
        }

        .form-control::placeholder {
            color: #a0a0a0;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .input-icon {
            position: relative;
        }

        .input-icon i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-gray);
        }

        .input-icon .form-control {
            padding-left: 45px;
        }

        /* Radio Options */
        .option-group {
            display: grid;
            gap: 15px;
        }

        .option-card {
            border: 2px solid var(--border-color);
            border-radius: 10px;
            padding: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            background: white;
        }

        .option-card:hover {
            border-color: var(--primary-color);
            box-shadow: 0 4px 12px rgba(10, 28, 58, 0.15);
            transform: translateY(-2px);
        }

        .option-card.selected {
            border-color: var(--primary-color);
            background: linear-gradient(135deg, rgba(10, 28, 58, 0.05) 0%, rgba(37, 211, 102, 0.05) 100%);
        }

        .option-card input[type="radio"] {
            position: absolute;
            opacity: 0;
        }

        .option-radio {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 22px;
            height: 22px;
            border: 2px solid var(--border-color);
            border-radius: 50%;
            background: #fff;
            transition: all 0.3s ease;
        }

        .option-card.selected .option-radio {
            border-color: var(--primary-color);
            background: var(--primary-color);
        }

        .option-card.selected .option-radio::after {
            content: '';
            position: absolute;
            top: 4px;
            left: 4px;
            width: 10px;
            height: 10px;
            background: var(--text-light);
            border-radius: 50%;
        }

        .option-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 10px;
        }

        .option-icon {
            width: 45px;
            height: 45px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            background: var(--bg-light);
            color: var(--primary-color);
        }

        .option-card.selected .option-icon {
            background: var(--primary-color);
            color: white;
        }

        .option-info {
            flex: 1;
        }

        .option-title {
            font-size: 16px;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 4px;
        }

        .option-description {
            color: var(--text-gray);
            font-size: 13px;
            line-height: 1.4;
        }

        .option-price {
            font-weight: 700;
            color: var(--primary-color);
            margin-top: 8px;
            font-size: 15px;
        }

        .option-badge {
            display: inline-block;
            background: var(--accent-color);
            color: white;
            font-size: 11px;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 20px;
            margin-top: 8px;
        }

        /* Payment Methods - Style Glotelho */
        .payment-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-bottom: 25px;
        }

        .payment-method {
            border: 2px solid var(--border-color);
            border-radius: 10px;
            padding: 22px 15px;
            cursor: pointer;
            transition: all 0.25s ease;
            position: relative;
            background: white;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10px;
            min-height: 90px;
        }

        .payment-method:hover {
            border-color: #e8680a;
            box-shadow: 0 4px 14px rgba(232,104,10,0.1);
        }

        .payment-method.selected {
            border-color: #e8680a;
            background: #fff;
        }

        .payment-method.selected .payment-check {
            display: flex;
        }

        .payment-check {
            display: none;
            position: absolute;
            top: -10px;
            right: -10px;
            width: 22px;
            height: 22px;
            background: #e8680a;
            color: white;
            border-radius: 50%;
            align-items: center;
            justify-content: center;
            font-size: 11px;
        }

        .payment-method input[type="radio"] {
            position: absolute;
            opacity: 0;
        }

        .payment-logos {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            height: 40px;
        }

        .payment-logos img {
            height: 32px;
            width: auto;
            object-fit: contain;
        }

        .payment-icon-cash {
            font-size: 30px;
            color: #e8680a;
        }

        .payment-name {
            font-weight: 600;
            color: var(--text-dark);
            font-size: 14px;
        }

        /* OM/MOMO detail panel */
        .payment-detail-panel {
            display: none;
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 10px;
            padding: 25px;
            margin-top: 5px;
        }

        .payment-detail-panel.active {
            display: block;
            animation: fadeInUp 0.3s ease;
        }

        .payment-fields-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .payment-field-group label {
            display: block;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 8px;
            color: var(--text-dark);
        }

        .payment-input-wrap {
            display: flex;
            align-items: center;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            overflow: hidden;
            background: white;
        }

        .payment-input-wrap .input-prefix {
            padding: 12px 14px;
            background: #f8f9fa;
            border-right: 1px solid var(--border-color);
            color: var(--text-gray);
            font-size: 16px;
        }

        .payment-input-wrap input,
        .payment-input-wrap .input-suffix-text {
            flex: 1;
            border: none;
            outline: none;
            padding: 12px 14px;
            font-size: 15px;
            color: var(--text-dark);
            background: white;
        }

        .payment-input-wrap .input-suffix {
            padding: 12px 14px;
            background: #f8f9fa;
            border-left: 1px solid var(--border-color);
            font-size: 12px;
            font-weight: 700;
            color: var(--text-gray);
        }

        .payment-hint {
            font-size: 12px;
            color: var(--text-gray);
            margin-top: 6px;
        }

        /* Comment ça marche box */
        .how-it-works {
            background: #fff8f0;
            border: 1px solid #fde8cc;
            border-radius: 10px;
            padding: 20px 22px;
            margin-top: 5px;
        }

        .how-it-works h4 {
            font-size: 15px;
            font-weight: 700;
            color: #e8680a;
            margin-bottom: 15px;
        }

        .how-it-works ol {
            padding-left: 0;
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .how-it-works ol li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            font-size: 13px;
            color: #444;
            line-height: 1.5;
        }

        .how-step-num {
            min-width: 22px;
            height: 22px;
            background: #e8680a;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 700;
            margin-top: 1px;
        }

        .how-it-works .security-note {
            margin-top: 14px;
            font-size: 13px;
            color: #e8680a;
            font-style: italic;
        }

        /* Erreurs paiement */
        .payment-method.error-border {
            border-color: #dc3545 !important;
            background: #fff5f5;
        }
        .payment-error-msg {
            display: none;
            color: #dc3545;
            font-size: 13px;
            font-weight: 500;
            margin-top: 8px;
            padding: 8px 12px;
            background: #fff5f5;
            border-left: 3px solid #dc3545;
            border-radius: 4px;
        }
        .payment-error-msg.visible { display: block; }
        .payment-input-wrap.field-error { border-color: #dc3545; box-shadow: 0 0 0 3px rgba(220,53,69,0.1); }
        .payment-input-wrap.field-ok { border-color: #28a745; }
        .field-error-text {
            display: none;
            color: #dc3545;
            font-size: 12px;
            margin-top: 5px;
            font-weight: 500;
        }
        .field-error-text.visible { display: block; }

        @media (max-width: 600px) {
            .payment-fields-row {
                grid-template-columns: 1fr;
            }
        }
        .order-summary {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
        }

        .summary-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            padding: 20px 25px;
            color: white;
        }

        .summary-title {
            font-size: 20px;
            font-weight: 700;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .summary-body {
            padding: 25px;
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 0;
        }

        .cart-items-container {
            flex: 1;
            overflow-y: auto;
            max-height: 300px;
            margin-bottom: 20px;
        }

        .cart-items-container::-webkit-scrollbar {
            width: 6px;
        }

        .cart-items-container::-webkit-scrollbar-track {
            background: var(--bg-light);
            border-radius: 3px;
        }

        .cart-items-container::-webkit-scrollbar-thumb {
            background: var(--border-color);
            border-radius: 3px;
        }

        .cart-items-container::-webkit-scrollbar-thumb:hover {
            background: var(--text-gray);
        }

        .summary-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid var(--border-color);
        }

        .summary-item:last-child {
            border-bottom: none;
        }

        .item-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            border: 2px solid var(--border-color);
        }

        .item-details {
            flex: 1;
        }

        .item-details h4 {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-dark);
            margin: 0 0 5px 0;
        }

        .item-meta {
            font-size: 12px;
            color: var(--text-gray);
        }

        .item-price {
            font-weight: 700;
            color: var(--text-dark);
            font-size: 15px;
        }

        .summary-divider {
            height: 1px;
            background: var(--border-color);
            margin: 20px 0;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            font-size: 14px;
        }

        .summary-row.total {
            border-top: 2px solid var(--border-color);
            margin-top: 15px;
            padding-top: 20px;
            font-size: 18px;
            font-weight: 700;
            color: var(--primary-color);
        }

        .promo-code {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid var(--border-color);
        }

        .promo-input-group {
            display: flex;
            gap: 10px;
        }

        .promo-input {
            flex: 1;
        }

        .btn-promo {
            padding: 0 20px;
            background: var(--accent-color);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-promo:hover {
            background: #1fb854;
        }

        /* Navigation Buttons */
        .step-navigation {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .btn-nav {
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
        }

        .btn-prev {
            background: white;
            border: 2px solid var(--border-color);
            color: var(--text-dark);
        }

        .btn-prev:hover {
            background: var(--bg-light);
            border-color: var(--text-dark);
        }

        .btn-next, .btn-submit {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: var(--text-light);
            flex: 1;
            justify-content: center;
        }

        .btn-next:hover, .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(10, 28, 58, 0.3);
        }

        .btn-submit {
            background: linear-gradient(135deg, var(--success-color), #20c654);
        }

        /* Error Messages */
        .error-message {
            color: var(--danger-color);
            font-size: 13px;
            margin-top: 6px;
            display: none;
            font-weight: 500;
        }

        .form-group.error .form-control {
            border-color: var(--danger-color);
        }

        .form-group.error .error-message {
            display: block;
        }

        /* Success Animation */
        .success-animation {
            text-align: center;
            padding: 40px 20px;
        }

        .success-icon {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: var(--success-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 50px;
            margin: 0 auto 25px;
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
            font-size: 28px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 15px;
        }

        .success-message {
            color: var(--text-gray);
            font-size: 16px;
            margin-bottom: 30px;
        }

        .order-number {
            background: var(--bg-light);
            padding: 15px 25px;
            border-radius: 8px;
            display: inline-block;
            margin-bottom: 30px;
        }

        .order-number strong {
            color: var(--primary-color);
            font-size: 18px;
        }

        /* Alerts */
        .alert-custom {
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .alert-info {
            background: rgba(23, 162, 184, 0.1);
            border: 1px solid var(--info-color);
            color: var(--info-color);
        }

        .alert-warning {
            background: rgba(255, 193, 7, 0.1);
            border: 1px solid var(--warning-color);
            color: #856404;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .checkout-layout {
                grid-template-columns: 1fr;
            }

            .checkout-sidebar {
                order: -1;
                position: static;
            }
        }

        @media (max-width: 768px) {
            body {
                padding: 10px 0;
            }

            .checkout-container {
                padding: 0 15px;
            }

            .checkout-header h1 {
                font-size: 24px;
            }

            .step-content {
                padding: 25px 20px;
            }

            .step-title {
                font-size: 22px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .payment-grid {
                grid-template-columns: 1fr;
            }

            .step-navigation {
                flex-direction: column;
            }

            .btn-nav {
                width: 100%;
                justify-content: center;
            }

            .progress-steps {
                padding: 0 10px;
            }

            .step {
                width: 36px;
                height: 36px;
                font-size: 14px;
            }

            .step-label {
                font-size: 11px;
                max-width: 70px;
            }
        }

        /* Loading Spinner */
        .spinner {
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-top: 3px solid white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            animation: spin 0.8s linear infinite;
            display: none;
        }

        .btn-nav.loading .spinner {
            display: inline-block;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>

<body>
    @include('header')

    <div class="checkout-container">
        <!-- Header -->
        <div class="checkout-header">
            <h1> Finaliser votre commande</h1>
            <p>Complétez les informations ci-dessous pour finaliser votre achat en toute sécurité</p>
        </div>

        <!-- Progress Bar -->
        <div class="checkout-progress">
            <div class="progress-steps">
                <div class="progress-line"></div>
                <div class="progress-line-fill" id="progressLineFill"></div>
                
                <div class="step-wrapper active" data-step="1">
                    <div class="step active">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="step-label active">Informations</div>
                </div>
                
                <div class="step-wrapper" data-step="2">
                    <div class="step">
                        <i class="fas fa-truck"></i>
                    </div>
                    <div class="step-label">Livraison</div>
                </div>
                
                <div class="step-wrapper" data-step="3">
                    <div class="step">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <div class="step-label">Paiement</div>
                </div>
                
                <div class="step-wrapper" data-step="4">
                    <div class="step">
                        <i class="fas fa-check"></i>
                    </div>
                    <div class="step-label">Confirmation</div>
                </div>
            </div>
        </div>

        <div class="checkout-layout">
            <!-- Main Content -->
            <div class="checkout-main">
                <form id="checkoutForm" action="{{ route('ajoutcommandenv') }}" method="POST">
                    @csrf

                    <!-- Step 1: Client Information -->
                    <div class="checkout-step active" id="step1">
                        <div class="step-content">
                            <h2 class="step-title">
                                <i class="fas fa-user-circle"></i>
                                Vos informations
                            </h2>
                            <p class="step-subtitle">Veuillez remplir vos informations personnelles</p>

                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">Nom complet <span class="required">*</span></label>
                                    <div class="input-icon">
                                        <i class="fas fa-user"></i>
                                        <input type="text" name="nom" class="form-control" placeholder="Entrez votre nom complet" required>
                                    </div>
                                    <span class="error-message">Ce champ est obligatoire</span>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Téléphone <span class="required">*</span></label>
                                    <div class="input-icon">
                                        <i class="fas fa-phone"></i>
                                        <input type="tel" name="telephone" class="form-control" placeholder="+237 6XX XXX XXX" required>
                                    </div>
                                    <span class="error-message">Numéro de téléphone invalide</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Email <span class="required">*</span></label>
                                <div class="input-icon">
                                    <i class="fas fa-envelope"></i>
                                    <input type="email" name="email" class="form-control" placeholder="votre@email.com" required>
                                </div>
                                <span class="error-message">Adresse email invalide</span>
                            </div>

                            <div class="alert-custom alert-info">
                                <i class="fas fa-info-circle"></i>
                                <span>Vos informations sont sécurisées et ne seront jamais partagées</span>
                            </div>
                        </div>

                        <div class="step-navigation">
                            <div></div>
                            <button type="button" class="btn-nav btn-next" onclick="nextStep(1)">
                                Continuer <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Step 2: Delivery -->
                    <div class="checkout-step" id="step2">
                        <div class="step-content">
                            <h2 class="step-title">
                                <i class="fas fa-shipping-fast"></i>
                                Mode de livraison
                            </h2>
                            <p class="step-subtitle">Choisissez votre mode de livraison préféré</p>

                            <div class="option-group">
                                <label class="option-card" onclick="selectOption(this, 'livraison')">
                                    <input type="radio" name="mode_livraison" value="domicile" required>
                                    <div class="option-radio"></div>
                                    <div class="option-header">
                                        <div class="option-icon">
                                            <i class="fas fa-home"></i>
                                        </div>
                                        <div class="option-info">
                                            <div class="option-title">Livraison à domicile</div>
                                            <div class="option-description">Recevez votre commande directement chez vous</div>
                                        </div>
                                    </div>
                                    <div class="option-price">2 000 FCFA</div>
                                    <span class="option-badge">2-3 jours ouvrés</span>
                                </label>

                                <label class="option-card" onclick="selectOption(this, 'livraison')">
                                    <input type="radio" name="mode_livraison" value="retrait" required>
                                    <div class="option-radio"></div>
                                    <div class="option-header">
                                        <div class="option-icon">
                                            <i class="fas fa-store"></i>
                                        </div>
                                        <div class="option-info">
                                            <div class="option-title">Retrait en magasin</div>
                                            <div class="option-description">Venez récupérer votre commande dans notre boutique</div>
                                        </div>
                                    </div>
                                    <div class="option-price">Gratuit</div>
                                    <span class="option-badge">Disponible sous 24h</span>
                                </label>

                                <label class="option-card" onclick="selectOption(this, 'livraison')">
                                    <input type="radio" name="mode_livraison" value="express" required>
                                    <div class="option-radio"></div>
                                    <div class="option-header">
                                        <div class="option-icon">
                                            <i class="fas fa-bolt"></i>
                                        </div>
                                        <div class="option-info">
                                            <div class="option-title">Livraison Express</div>
                                            <div class="option-description">Recevez votre commande en moins de 24 heures</div>
                                        </div>
                                    </div>
                                    <div class="option-price">5 000 FCFA</div>
                                    <span class="option-badge" style="background: var(--danger-color);">Urgent - 24h</span>
                                </label>
                            </div>

                            <div id="adresseSection" style="display: none; margin-top: 25px;">
                                <h3 style="font-size: 18px; margin-bottom: 15px; color: var(--text-dark);">
                                    <i class="fas fa-map-marker-alt"></i> Adresse de livraison
                                </h3>
                                
                                <div class="form-group">
                                    <label class="form-label">Ville <span class="required">*</span></label>
                                    <div class="input-icon">
                                        <i class="fas fa-city"></i>
                                        <input type="text" name="ville" class="form-control" placeholder="Ex: Douala">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group">
                                        <label class="form-label">Quartier <span class="required">*</span></label>
                                        <input type="text" name="quartier" class="form-control" placeholder="Ex: Akwa">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Code postal</label>
                                        <input type="text" name="code_postal" class="form-control" placeholder="Ex: 00237">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Adresse complète <span class="required">*</span></label>
                                    <textarea name="adresse" class="form-control" rows="3" placeholder="Numéro, rue, immeuble, étage..."></textarea>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Instructions de livraison (optionnel)</label>
                                    <textarea name="instructions" class="form-control" rows="2" placeholder="Ex: Sonnez à l'interphone, code 1234..."></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="step-navigation">
                            <button type="button" class="btn-nav btn-prev" onclick="prevStep(2)">
                                <i class="fas fa-arrow-left"></i> Retour
                            </button>
                            <button type="button" class="btn-nav btn-next" onclick="nextStep(2)">
                                Continuer <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Step 3: Payment -->
                    <div class="checkout-step" id="step3">
                        <div class="step-content">
                            <h2 class="step-title">
                                <i class="fas fa-wallet"></i>
                                Mode de paiement
                            </h2>
                            <p class="step-subtitle">Sélectionnez votre méthode de paiement préférée</p>

                            <div class="payment-grid">
                                <!-- Paiement à la livraison -->
                                <label class="payment-method" onclick="selectPayment(this, 'livraison')">
                                    <input type="radio" name="mode_paiement" value="livraison" required>
                                    <span class="payment-check"><i class="fas fa-check"></i></span>
                                    <div class="payment-icon-cash">
                                        <i class="fas fa-hand-holding-usd"></i>
                                    </div>
                                    <div class="payment-name">Paiement à la livraison</div>
                                </label>

                                <!-- OM / MOMO -->
                                <label class="payment-method" onclick="selectPayment(this, 'om_momo')">
                                    <input type="radio" name="mode_paiement" value="om_momo" required>
                                    <span class="payment-check"><i class="fas fa-check"></i></span>
                                    <div class="payment-logos">
                                        <!-- Orange Money logo -->
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRjykY3ZcP7kv0RJjPwvZhDZB6M7Vggpx8P9w&s" 
                                             alt="Orange Money"
                                             onerror="this.outerHTML='<span style=\'font-size:22px;color:#ff6600\'>OM</span>'">
                                        <!-- MTN logo -->
                                        <img src="https://mma.prnewswire.com/media/1688009/MTN_Mobile_Money.jpg?p=facebook" 
                                             alt="MTN MOMO"
                                             onerror="this.outerHTML='<span style=\'font-size:22px;color:#ffcc00\'>MTN</span>'">
                                    </div>
                                    <div class="payment-name">OM / MOMO</div>
                                </label>
                            </div>
                            <div class="payment-error-msg" id="paiementError">
                                <i class="fas fa-exclamation-circle"></i> Veuillez sélectionner un mode de paiement.
                            </div>

                            <!-- Panel OM/MOMO (affiché dynamiquement) -->
                            <div class="payment-detail-panel" id="omMomoPanel">
                                <div class="payment-fields-row">
                                    <div class="payment-field-group">
                                        <label>Téléphone :</label>
                                        <div class="payment-input-wrap" id="telWrap">
                                            <span class="input-prefix"><i class="fas fa-mobile-alt"></i></span>
                                            <input type="tel" name="telephone_paiement" id="telephone_paiement" placeholder="677 77 77 77">
                                        </div>
                                        <p class="payment-hint">Entrez votre numéro Orange Money ou MTN Mobile Money</p>
                                        <p class="field-error-text" id="telPaiementError">â  Numéro de téléphone requis (min. 8 chiffres).</p>
                                    </div>
                                    <div class="payment-field-group">
                                        <label>Montant à payer</label>
                                        <div class="payment-input-wrap" id="montantWrap">
                                            <span class="input-prefix"><i class="fas fa-coins"></i></span>
                                            <input type="number" name="montant_paiement" id="montantPaiement"
                                                   value="{{ $subtotal ?? '0' }}"
                                                   min="1" max="1000000"
                                                   style="background:white; color:var(--text-dark); font-weight:600;">
                                            <span class="input-suffix">XAF</span>
                                        </div>
                                        <p class="payment-hint">Le montant maximum à payer est de FCFA 1,000,000</p>
                                        <p class="field-error-text" id="montantError"></p>
                                    </div>
                                </div>

                                <div class="how-it-works">
                                    <h4>Comment ça marche</h4>
                                    <ol>
                                        <li>
                                            <span class="how-step-num">1</span>
                                            <span>Entrez le numéro de téléphone (Orange ou MTN) avec lequel vous souhaitez payer dans le champ ci-dessus</span>
                                        </li>
                                        <li>
                                            <span class="how-step-num">2</span>
                                            <span>Entrez le montant que vous souhaitez payer (en cas de paiement anticipé). Par défaut, le montant est le montant total de la commande.<br>Le montant maximum pour les paiements en ligne est de <strong>1 000 000 XAF</strong>.</span>
                                        </li>
                                        
                                        <li>
                                            <span class="how-step-num">3</span>
                                            <span>Vérifiez que tout est correct et cliquez sur le bouton <strong>"Valider la commande"</strong>.</span>
                                        </li>
                                        <li>
                                            <span class="how-step-num">5</span>
                                            <span>Un message de confirmation sera envoyé sur votre adresse email pour le paiement. Suivez les instructions pour valider votre paiement.</span>
                                        </li>
                                        
                                    </ol>
                                    <p class="security-note">Pour des raisons de sécurité, vérifiez bien que le nom de l'initiateur de cette transaction soit bel et bien <strong>2N CORPORATE SARL (Orange et MTN)</strong>.</p>
                                </div>
                            </div>

                            <div class="alert-custom alert-warning" style="margin-top: 20px;">
                                <i class="fas fa-shield-alt"></i>
                                <span>Tous les paiements sont sécurisés et cryptés</span>
                            </div>
                        </div>

                        <div class="step-navigation">
                            <button type="button" class="btn-nav btn-prev" onclick="prevStep(3)">
                                <i class="fas fa-arrow-left"></i> Retour
                            </button>
                            <button type="button" class="btn-nav btn-next" onclick="nextStep(3)">
                                Continuer <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Step 4: Confirmation -->
                    <div class="checkout-step" id="step4">
                        <div class="step-content">
                            <h2 class="step-title">
                                <i class="fas fa-clipboard-check"></i>
                                Récapitulatif de la commande
                            </h2>
                            <p class="step-subtitle">Vérifiez vos informations avant de valider</p>

                            <div style="background: var(--bg-light); padding: 20px; border-radius: 8px; margin-bottom: 20px;">
                                <h3 style="font-size: 16px; font-weight: 600; margin-bottom: 15px; color: var(--text-dark);">
                                    <i class="fas fa-user"></i> Informations client
                                </h3>
                                <p style="margin: 8px 0; color: var(--text-gray);"><strong>Nom:</strong> <span id="recap_nom"></span></p>
                                <p style="margin: 8px 0; color: var(--text-gray);"><strong>Email:</strong> <span id="recap_email"></span></p>
                                <p style="margin: 8px 0; color: var(--text-gray);"><strong>Téléphone:</strong> <span id="recap_telephone"></span></p>
                            </div>

                            <div style="background: var(--bg-light); padding: 20px; border-radius: 8px; margin-bottom: 20px;">
                                <h3 style="font-size: 16px; font-weight: 600; margin-bottom: 15px; color: var(--text-dark);">
                                    <i class="fas fa-truck"></i> Livraison
                                </h3>
                                <p style="margin: 8px 0; color: var(--text-gray);"><strong>Mode:</strong> <span id="recap_livraison"></span></p>
                                <p id="recap_adresse_complete" style="margin: 8px 0; color: var(--text-gray);"></p>
                            </div>

                            <div style="background: var(--bg-light); padding: 20px; border-radius: 8px; margin-bottom: 20px;">
                                <h3 style="font-size: 16px; font-weight: 600; margin-bottom: 15px; color: var(--text-dark);">
                                    <i class="fas fa-credit-card"></i> Paiement
                                </h3>
                                <p style="margin: 8px 0; color: var(--text-gray);"><strong>Méthode:</strong> <span id="recap_paiement"></span></p>
                            </div>

                            <div class="form-group" id="conditionsGroup">
                                <label style="display: flex; align-items: center; gap: 10px; cursor: pointer;">
                                    <input type="checkbox" name="conditions" style="width: 18px; height: 18px;">
                                    <span style="font-size: 14px; color: var(--text-dark);">
                                        J'accepte les <a href="#" style="color: var(--primary-color); text-decoration: none;">conditions générales de vente</a> et la <a href="#" style="color: var(--primary-color); text-decoration: none;">politique de confidentialité</a>
                                    </span>
                                </label>
                                <span class="error-message" id="conditionsError">Vous devez accepter les conditions générales de vente et la politique de confidentialité pour continuer.</span>
                            </div>
                        </div>

                        <div class="step-navigation">
                            <button type="button" class="btn-nav btn-prev" onclick="prevStep(4)">
                                <i class="fas fa-arrow-left"></i> Retour
                            </button>
                            <button type="submit" class="btn-nav btn-submit">
                                <i class="fas fa-check-circle"></i> Valider la commande
                                <span class="spinner"></span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Sidebar - Order Summary -->
            <div class="checkout-sidebar">
                <div class="order-summary">
                    <div class="summary-header">
                        <h3 class="summary-title">
                            <i class="fas fa-shopping-bag"></i>
                            Votre commande
                        </h3>
                    </div>

                    <div class="summary-body">
                        <!-- Cart Items - Dynamic from backend -->
                        <div class="cart-items-container">
                            <div id="cartItems">
                            @php
                                $cart = session()->get('cart', []);
                                $subtotal = 0;
                            @endphp
                            @if(!empty($cart))
                                @foreach ($cart as $id => $produit)
                                    @php
                                        $parts = explode('__', $id);
                                        $productId = $parts[0];
                                        $etat = $parts[1] ?? 'neuve';
                                        $itemTotal = $produit['qttestock'] * $produit['prix'];
                                        $subtotal += $itemTotal;
                                    @endphp
                                    <div class="summary-item">
                                        @if($produit['images'])
                                            <img src="{{ asset('photos/' . $produit['images']) }}" alt="{{ $produit['libelle'] }}" class="item-image">
                                        @else
                                            <img src="https://images.unsplash.com/photo-1585659722983-3a675dabf23d?q=80&w=400" alt="Produit" class="item-image">
                                        @endif
                                        <div class="item-details">
                                            <h4>{{ Str::limit($produit['libelle'], 25) }}</h4>
                                            <div class="item-meta">Quantité: {{ $produit['qttestock'] }} | État: {{ ucfirst($produit['etat']) }}</div>
                                        </div>
                                        <div class="item-price">{{ number_format($itemTotal, 0, ',', ' ') }} FCFA</div>
                                    </div>
                                @endforeach
                            @else
                                <div class="summary-item">
                                    <div class="item-details" style="text-align: center; width: 100%;">
                                        <h4 style="color: var(--text-gray);">Votre panier est vide</h4>
                                    </div>
                                </div>
                            @endif
                            </div>
                        </div>

                        <div class="summary-divider"></div>

                        <!-- Promo Code -->
                        <div class="promo-code">
                            <div class="promo-input-group">
                                <input type="text" class="form-control promo-input" placeholder="Code promo">
                                <button type="button" class="btn-promo">Appliquer</button>
                            </div>
                        </div>

                        <div class="summary-divider"></div>

                        <!-- Totals -->
                        <div class="summary-row">
                            <span>Sous-total</span>
                            <span id="subtotal">{{ number_format($subtotal, 0, ',', ' ') }} FCFA</span>
                        </div>

                        <div class="summary-row">
                            <span>Frais de livraison</span>
                            <span id="frais_livraison">0 FCFA</span>
                        </div>

                        <div class="summary-row" id="promo-row" style="display: none; color: var(--success-color);">
                            <span>Réduction</span>
                            <span id="reduction">-0 FCFA</span>
                        </div>

                        <div class="summary-row total">
                            <span>Total</span>
                            <span id="total">{{ number_format($subtotal, 0, ',', ' ') }} FCFA</span>
                        </div>
                    </div>
                </div>

                
               
            </div>
        </div>
    </div>
    <br>

    @include('footer1')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        let currentStep = 1;
        const totalSteps = 4;

        // Update progress bar
        function updateProgress() {
            const progressFill = document.getElementById('progressLineFill');
            const percentage = ((currentStep - 1) / (totalSteps - 1)) * 100;
            progressFill.style.width = percentage + '%';

            // Update steps
            document.querySelectorAll('.step-wrapper').forEach((wrapper, index) => {
                const step = wrapper.querySelector('.step');
                const label = wrapper.querySelector('.step-label');
                const stepNumber = index + 1;

                wrapper.classList.remove('active', 'completed');
                step.classList.remove('active', 'completed');
                label.classList.remove('active', 'completed');

                if (stepNumber < currentStep) {
                    wrapper.classList.add('completed');
                    step.classList.add('completed');
                    label.classList.add('completed');
                } else if (stepNumber === currentStep) {
                    wrapper.classList.add('active');
                    step.classList.add('active');
                    label.classList.add('active');
                }
            });
        }

        // Next step
        function nextStep(step) {
            if (validateStep(step)) {
                document.getElementById('step' + step).classList.remove('active');
                currentStep = step + 1;
                document.getElementById('step' + currentStep).classList.add('active');
                updateProgress();
                window.scrollTo({ top: 0, behavior: 'smooth' });

                // Update recap if going to step 4
                if (currentStep === 4) {
                    updateRecap();
                }
            }
        }

        // Previous step
        function prevStep(step) {
            document.getElementById('step' + step).classList.remove('active');
            currentStep = step - 1;
            document.getElementById('step' + currentStep).classList.add('active');
            updateProgress();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Validate step
        function validateStep(step) {
            let isValid = true;

            // ââ STEP 1 : infos client ââââââââââââââââââââââââââââââââââââââââ
            if (step === 1) {
                document.querySelectorAll('#step1 input[required]').forEach(input => {
                    const fg = input.closest('.form-group');
                    const err = fg ? fg.querySelector('.error-message') : null;
                    if (!input.value.trim()) {
                        fg && fg.classList.add('error');
                        isValid = false;
                    } else if (input.type === 'email' && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(input.value)) {
                        fg && fg.classList.add('error');
                        if (err) err.textContent = 'Adresse email invalide.';
                        isValid = false;
                    } else if (input.type === 'tel' && !/^[+]?[\d\s-]{8,}$/.test(input.value)) {
                        fg && fg.classList.add('error');
                        if (err) err.textContent = 'Numéro de téléphone invalide.';
                        isValid = false;
                    } else {
                        fg && fg.classList.remove('error');
                    }
                });
            }

            // ââ STEP 2 : livraison + adresse âââââââââââââââââââââââââââââââââ
            if (step === 2) {
                const livraisonOk = document.querySelector('input[name="mode_livraison"]:checked');
                if (!livraisonOk) {
                    document.querySelectorAll('#step2 .option-card').forEach(c => c.style.outline = '2px solid #dc3545');
                    isValid = false;
                } else {
                    document.querySelectorAll('#step2 .option-card').forEach(c => c.style.outline = '');
                }
                const adresseSection = document.getElementById('adresseSection');
                if (adresseSection && adresseSection.style.display !== 'none') {
                    adresseSection.querySelectorAll('input[required], textarea[required]').forEach(input => {
                        const fg = input.closest('.form-group');
                        if (!input.value.trim()) { fg && fg.classList.add('error'); isValid = false; }
                        else { fg && fg.classList.remove('error'); }
                    });
                }
            }

            // ââ STEP 3 : paiement âââââââââââââââââââââââââââââââââââââââââââââ
            if (step === 3) {
                const paiementOk = document.querySelector('input[name="mode_paiement"]:checked');
                const paiementError = document.getElementById('paiementError');

                // Mode paiement non sélectionné
                if (!paiementOk) {
                    document.querySelectorAll('.payment-method').forEach(c => c.classList.add('error-border'));
                    paiementError.classList.add('visible');
                    isValid = false;
                } else {
                    document.querySelectorAll('.payment-method').forEach(c => c.classList.remove('error-border'));
                    paiementError.classList.remove('visible');
                }

                // OM/MOMO sélectionné → valider téléphone + montant
                if (paiementOk && paiementOk.value === 'om_momo') {
                    const telInput  = document.getElementById('telephone_paiement');
                    const telWrap   = document.getElementById('telWrap');
                    const telError  = document.getElementById('telPaiementError');
                    const montant   = document.getElementById('montantPaiement');
                    const montantWrap  = document.getElementById('montantWrap');
                    const montantError = document.getElementById('montantError');
                    const totalVal  = parseInt(document.getElementById('total').textContent.replace(/\D/g, ''));
                    const montantVal = parseInt(montant.value);

                    // Téléphone
                    if (!telInput.value.trim() || !/^[+]?[\d\s-]{8,}$/.test(telInput.value)) {
                        telWrap.classList.add('field-error'); telWrap.classList.remove('field-ok');
                        telError.textContent = !telInput.value.trim()
                            ? 'â  Veuillez entrer votre numéro de téléphone.'
                            : 'â  Numéro invalide (minimum 8 chiffres).';
                        telError.classList.add('visible');
                        isValid = false;
                    } else {
                        telWrap.classList.remove('field-error'); telWrap.classList.add('field-ok');
                        telError.classList.remove('visible');
                    }

                    // Montant
                    montantWrap.classList.remove('field-error', 'field-ok');
                    montantError.classList.remove('visible');
                    if (!montant.value || isNaN(montantVal)) {
                        montantWrap.classList.add('field-error');
                        montantError.textContent = 'â  Veuillez entrer un montant.';
                        montantError.classList.add('visible'); isValid = false;
                    } else if (montantVal < totalVal) {
                        montantWrap.classList.add('field-error');
                        montantError.textContent = `â  Montant (${montantVal.toLocaleString('fr-FR')} XAF) inférieur au total (${totalVal.toLocaleString('fr-FR')} XAF).`;
                        montantError.classList.add('visible'); isValid = false;
                    } else if (montantVal > 1000000) {
                        montantWrap.classList.add('field-error');
                        montantError.textContent = 'â  Le montant ne peut pas dépasser 1 000 000 XAF.';
                        montantError.classList.add('visible'); isValid = false;
                    } else {
                        montantWrap.classList.add('field-ok');
                    }
                }
            }

            // Scroll vers première erreur
            if (!isValid) {
                const firstErr = document.querySelector('#step' + step + ' .form-group.error, #step' + step + ' .payment-method.error-border, #step' + step + ' .field-error, #step' + step + ' .payment-error-msg.visible');
                if (firstErr) firstErr.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }

            return isValid;
        }

        // Select option card
        function selectOption(card, groupName) {
            const group = card.closest('.option-group');
            group.querySelectorAll('.option-card').forEach(c => c.classList.remove('selected'));
            card.classList.add('selected');
            card.querySelector('input').checked = true;

            // Show/hide address section for delivery
            if (groupName === 'livraison') {
                const value = card.querySelector('input').value;
                const adresseSection = document.getElementById('adresseSection');
                
                if (value === 'domicile' || value === 'express') {
                    adresseSection.style.display = 'block';
                    // Make address fields required
                    adresseSection.querySelectorAll('input[name="ville"], input[name="quartier"], textarea[name="adresse"]').forEach(field => {
                        field.setAttribute('required', 'required');
                    });
                } else {
                    adresseSection.style.display = 'none';
                    // Remove required from address fields
                    adresseSection.querySelectorAll('input, textarea').forEach(field => {
                        field.removeAttribute('required');
                    });
                }

                // Update delivery fee
                updateDeliveryFee(value);
            }
        }

        // Select payment method
        function selectPayment(card, type) {
            document.querySelectorAll('.payment-method').forEach(c => c.classList.remove('selected'));
            card.classList.add('selected');
            card.querySelector('input').checked = true;

            // Show/hide OM MOMO panel
            const panel = document.getElementById('omMomoPanel');
            if (type === 'om_momo') {
                panel.classList.add('active');
                panel.querySelector('input[name="telephone_paiement"]').setAttribute('required', 'required');
            } else {
                panel.classList.remove('active');
                panel.querySelector('input[name="telephone_paiement"]').removeAttribute('required');
            }
        }

        // Update delivery fee
        function updateDeliveryFee(mode) {
            let fee = 0;
            if (mode === 'domicile') fee = 2000;
            if (mode === 'express') fee = 5000;

            document.getElementById('frais_livraison').textContent = fee.toLocaleString() + ' FCFA';
            updateTotal();
        }

        // Update total
        function updateTotal() {
            const subtotal = parseInt(document.getElementById('subtotal').textContent.replace(/\D/g, ''));
            const fraisLivraison = parseInt(document.getElementById('frais_livraison').textContent.replace(/\D/g, ''));
            const total = subtotal + fraisLivraison;

            document.getElementById('total').textContent = total.toLocaleString() + ' FCFA';

            // Sync montant paiement OM/MOMO
            const montantField = document.getElementById('montantPaiement');
            if (montantField) {
                montantField.value = total.toLocaleString('fr-FR');
            }
        }

        // Update recap
        function updateRecap() {
            // Client info
            document.getElementById('recap_nom').textContent = document.querySelector('input[name="nom"]').value;
            document.getElementById('recap_email').textContent = document.querySelector('input[name="email"]').value;
            document.getElementById('recap_telephone').textContent = document.querySelector('input[name="telephone"]').value;

            // Delivery
            const livraisonMode = document.querySelector('input[name="mode_livraison"]:checked');
            if (livraisonMode) {
                const livraisonText = livraisonMode.closest('.option-card').querySelector('.option-title').textContent;
                document.getElementById('recap_livraison').textContent = livraisonText;

                if (livraisonMode.value === 'domicile' || livraisonMode.value === 'express') {
                    const ville = document.querySelector('input[name="ville"]').value;
                    const quartier = document.querySelector('input[name="quartier"]').value;
                    const adresse = document.querySelector('textarea[name="adresse"]').value;
                    document.getElementById('recap_adresse_complete').innerHTML = `<strong>Adresse:</strong> ${adresse}, ${quartier}, ${ville}`;
                } else {
                    document.getElementById('recap_adresse_complete').innerHTML = '';
                }
            }

            // Payment
            const paiementMode = document.querySelector('input[name="mode_paiement"]:checked');
            if (paiementMode) {
                const paiementText = paiementMode.closest('.payment-method').querySelector('.payment-name').textContent;
                document.getElementById('recap_paiement').textContent = paiementText;
            }
        }

        // Form submission
        document.getElementById('checkoutForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const conditionsCheckbox = document.querySelector('input[name="conditions"]');
            const conditionsGroup = document.getElementById('conditionsGroup');
            const conditionsError = document.getElementById('conditionsError');

            if (!conditionsCheckbox.checked) {
                conditionsGroup.classList.add('error');
                conditionsError.style.display = 'block';
                return;
            } else {
                conditionsGroup.classList.remove('error');
                conditionsError.style.display = 'none';
            }

            const submitBtn = document.querySelector('.btn-submit');
            submitBtn.classList.add('loading');
            submitBtn.disabled = true;

            // Simulate form submission (replace with actual AJAX call)
            setTimeout(() => {
                this.submit();
            }, 1500);
        });

        // Hide error when checkbox is checked
        document.querySelector('input[name="conditions"]').addEventListener('change', function() {
            const conditionsGroup = document.getElementById('conditionsGroup');
            const conditionsError = document.getElementById('conditionsError');

            if (this.checked) {
                conditionsGroup.classList.remove('error');
                conditionsError.style.display = 'none';
            }
        });

        // Remove error on input
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('input', function() {
                const formGroup = this.closest('.form-group');
                if (formGroup) {
                    formGroup.classList.remove('error');
                }
            });
        });

        // Validation temps réel montant
        document.getElementById('montantPaiement').addEventListener('input', function () {
            const montantWrap  = document.getElementById('montantWrap');
            const montantError = document.getElementById('montantError');
            const totalVal = parseInt(document.getElementById('total').textContent.replace(/\D/g, ''));
            const montantVal = parseInt(this.value);

            montantWrap.classList.remove('field-error', 'field-ok');
            montantError.classList.remove('visible');
            if (!this.value) return;

            if (isNaN(montantVal) || montantVal < totalVal) {
                montantWrap.classList.add('field-error');
                montantError.textContent = `â  Montant inférieur au total (${totalVal.toLocaleString('fr-FR')} XAF).`;
                montantError.classList.add('visible');
            } else if (montantVal > 1000000) {
                montantWrap.classList.add('field-error');
                montantError.textContent = 'â  Dépasse le maximum de 1 000 000 XAF.';
                montantError.classList.add('visible');
            } else {
                montantWrap.classList.add('field-ok');
            }
        });

        // Validation temps réel téléphone paiement
        document.getElementById('telephone_paiement').addEventListener('input', function () {
            const telWrap  = document.getElementById('telWrap');
            const telError = document.getElementById('telPaiementError');
            telWrap.classList.remove('field-error', 'field-ok');
            telError.classList.remove('visible');
            if (!this.value) return;
            if (!/^[+]?[\d\s-]{8,}$/.test(this.value)) {
                telWrap.classList.add('field-error');
                telError.textContent = 'â  Numéro invalide (minimum 8 chiffres).';
                telError.classList.add('visible');
            } else {
                telWrap.classList.add('field-ok');
            }
        });

        // Initialize
        updateProgress();

        // Init montant depuis le total
        (function () {
            const totalEl = document.getElementById('total');
            const montantField = document.getElementById('montantPaiement');
            if (totalEl && montantField) {
                const val = parseInt(totalEl.textContent.replace(/\D/g, ''));
                if (!isNaN(val)) montantField.value = val;
            }
        })();
    </script>
</body>
</html>