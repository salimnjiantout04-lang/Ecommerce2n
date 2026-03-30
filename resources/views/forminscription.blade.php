<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - 2N SHOP</title>
    
    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #0a1c3a;
            --secondary-color: #1a3b6e;
            --accent-color: #4dabf7;
            --light-color: #f8f9fa;
            --success-color: #28a745;
            --danger-color: #dc3545;
            --warning-color: #ffc107;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Figtree', sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #0a1c3a 0%, #1a3b6e 100%);
            color: #333;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("https://cloutierpro.com/wp-content/uploads/2023/11/91efa982081ef4965ed44f8300d6-300x300.webp");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            filter: blur(3px) brightness(0.7);
            z-index: -1;
        }

        .register-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .register-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            max-width: 1200px;
            width: 100%;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .register-left {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .register-left::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><path fill="%23ffffff10" d="M0,500Q0,0,500,0Q1000,0,1000,500Q1000,1000,500,1000Q0,1000,0,500Z"></path></svg>');
            background-size: cover;
            opacity: 0.1;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo-container img {
            width: 120px;
            height: auto;
            margin-bottom: 20px;
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.1));
        }

        .benefits-text h2 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: white;
        }

        .benefits-text p {
            font-size: 1.1rem;
            opacity: 0.9;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .benefits-list {
            margin-top: 20px;
        }

        .benefit-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
            padding: 15px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            backdrop-filter: blur(5px);
            transition: transform 0.3s ease;
        }

        .benefit-item:hover {
            transform: translateX(5px);
        }

        .benefit-icon {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            flex-shrink: 0;
            font-size: 1.2rem;
        }

        .benefit-content h4 {
            font-size: 1.1rem;
            margin-bottom: 5px;
            color: white;
        }

        .benefit-content p {
            font-size: 0.9rem;
            opacity: 0.8;
            margin-bottom: 0;
        }

        .register-right {
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .register-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .register-header h2 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .register-header p {
            color: #666;
            font-size: 1rem;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            display: block;
        }

        .form-control {
            border: 0px ;
            border-radius: 10px;
            padding: 12px 45px 12px 15px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
        }

        .form-control:focus {
            border-color: none;
            box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.99);
            outline: none;
        }

        .input-icon {
            position: absolute;
            right: 15px;
            top: 40px;
            color: #999;
            font-size: 1.2rem;
        }

        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-10%);
            background: none;
            border: none;
            color: #999;
            cursor: pointer;
            z-index: 2;
            padding: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 20px;
            height: 20px;
        }

        
        .password-strength {
            margin-top: 8px;
            font-size: 0.85rem;
        }

        .strength-bar {
            height: 4px;
            background: #e0e0e0;
            border-radius: 2px;
            margin-top: 5px;
            overflow: hidden;
        }

        .strength-fill {
            height: 100%;
            width: 0%;
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        .strength-weak .strength-fill {
            background: var(--danger-color);
            width: 25%;
        }

        .strength-medium .strength-fill {
            background: var(--warning-color);
            width: 50%;
        }

        .strength-good .strength-fill {
            background: #ff9800;
            width: 75%;
        }

        .strength-strong .strength-fill {
            background: var(--success-color);
            width: 100%;
        }

        .strength-text {
            font-weight: 600;
        }

        .strength-weak .strength-text {
            color: var(--danger-color);
        }

        .strength-medium .strength-text {
            color: var(--warning-color);
        }

        .strength-good .strength-text {
            color: #ff9800;
        }

        .strength-strong .strength-text {
            color: var(--success-color);
        }

        .form-check {
            margin-bottom: 15px;
        }

        .form-check-input {
            width: 18px;
            height: 18px;
            margin-top: 0.2rem;
            cursor: pointer;
        }

        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .form-check-label {
            color: #555;
            cursor: pointer;
            font-size: 0.95rem;
            line-height: 1.4;
        }

        .terms-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
        }

        .terms-link:hover {
            color: var(--accent-color);
            text-decoration: underline;
        }

        .btn-register {
            background:linear-gradient(135deg, var(--primary-color)100%);
            color: white;
            border: none;
            padding: 14px 30px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(10, 28, 58, 0.3);
            color: white;
        }

        .divider {
            text-align: center;
            margin: 25px 0;
            position: relative;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e0e0e0;
        }

        .divider span {
            background: white;
            padding: 0 20px;
            color: #666;
            font-size: 0.9rem;
        }

        .social-register {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
        }

        .btn-social {
            flex: 1;
            padding: 12px;
            border-radius: 10px;
            border: 2px solid #e0e0e0;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-social:hover {
            transform: translateY(-2px);
            border-color: var(--accent-color);
        }

        .btn-google {
            color: #DB4437;
        }

        .btn-facebook {
            color: #4267B2;
        }

        .login-link {
            text-align: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #e0e0e0;
        }

        .login-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
        }

        .login-link a:hover {
            color: var(--accent-color);
            text-decoration: underline;
        }

        .alert-container {
            position: fixed;
            top: 100px;
            right: 20px;
            z-index: 1050;
            max-width: 400px;
        }

        .progress-indicator {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 30px;
            gap: 10px;
        }

        .progress-step {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #e0e0e0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: #999;
            font-size: 0.9rem;
        }

        .progress-step.active {
            background: var(--primary-color);
            color: white;
        }

        .progress-line {
            flex: 1;
            height: 2px;
            background: #e0e0e0;
            max-width: 50px;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .register-left {
                padding: 40px 30px;
            }
            
            .register-right {
                padding: 40px 30px;
            }
            
            .benefits-text h2 {
                font-size: 1.8rem;
            }
        }

        @media (max-width: 768px) {
            .register-card {
                flex-direction: column;
            }
            
            .register-left {
                padding: 40px 20px;
                border-radius: 20px 20px 0 0;
            }
            
            .register-right {
                padding: 40px 20px;
            }
            
            .social-register {
                flex-direction: column;
            }
            
            .benefit-item {
                padding: 12px;
            }
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .pulse-animation {
            animation: pulse 2s infinite;
        }
    </style>
</head>
<body>
    <!-- Alert Messages -->
    @if(session('success'))
        <div class="alert-container">
            <div class="alert alert-success alert-dismissible fade show animate-fade-in-up" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    @if($errors->any())
        <div class="alert-container">
            <div class="alert alert-danger alert-dismissible fade show animate-fade-in-up" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>
                <strong>Veuillez corriger les erreurs suivantes :</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="register-container">
        <div class="register-card d-flex flex-wrap">
            <!-- Left Column - Benefits Section -->
            <div class="col-lg-6 register-left" data-aos="fade-right" data-aos-duration="800">
                <div class="logo-container">
                    <img src="{{ asset('img/logo2n.png') }}" alt="2N SHOP Logo">
                    <h1 class="display-5 fw-bold">2N CORPORATE SHOP</h1>
                </div>
                
                <div class="benefits-text">
                    <h2>Rejoignez notre communauté</h2>
                    <p>Créez votre compte et bénéficiez de nombreux avantages exclusifs pour vos achats d'équipements électroniques professionnels.</p>
                </div>

                <div class="benefits-list">
                    <div class="benefit-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="benefit-icon">
                            <i class="fas fa-percent"></i>
                        </div>
                        <div class="benefit-content">
                            <h4>Remises exclusives</h4>
                            <p>Profitez de réductions spéciales réservées aux membres</p>
                        </div>
                    </div>
                    
                    <div class="benefit-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="benefit-icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <div class="benefit-content">
                            <h4>Livraison rapide</h4>
                            <p>Suivi en temps réel de vos commandes</p>
                        </div>
                    </div>
                    
                    <div class="benefit-item" data-aos="fade-up" data-aos-delay="300">
                        <div class="benefit-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <div class="benefit-content">
                            <h4>Support prioritaire</h4>
                            <p>Accès à notre équipe de support dédiée</p>
                        </div>
                    </div>
                    
                    <div class="benefit-item" data-aos="fade-up" data-aos-delay="400">
                        <div class="benefit-icon">
                            <i class="fas fa-history"></i>
                        </div>
                        <div class="benefit-content">
                            <h4>Historique des commandes</h4>
                            <p>Accédez à tout votre historique d'achat</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Registration Form -->
            <div class="col-lg-6 register-right" data-aos="fade-left" data-aos-duration="800">
                <!-- Progress Indicator -->
                <div class="progress-indicator">
                    <div class="progress-step active">1</div>
                    <div class="progress-line"></div>
                    <div class="progress-step">2</div>
                    <div class="progress-line"></div>
                    <div class="progress-step">3</div>
                </div>

                <div class="register-header">
                    <h2>Créez votre compte</h2>
                    <p>Remplissez le formulaire ci-dessous pour vous inscrire</p>
                </div>

                <form action="{{ route('createuser') }}" method="POST" id="registrationForm" novalidate>
                    @csrf
                    
                    <!-- Full Name Field -->
                    <div class="form-group">
                        <label for="name" class="form-label">Nom complet </label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               class="form-control" 
                               placeholder="Votre nom et prénom"
                               required
                               value="{{ old('name') }}"
                               autocomplete="name"
                               autofocus>
                        
                        <div class="invalid-feedback" id="nameError"></div>
                    </div>

                    <!-- Email Field -->
                    <div class="form-group">
                        <label for="email" class="form-label">Adresse email </label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               class="form-control" 
                               placeholder="votre@email.com"
                               required
                               value="{{ old('email') }}"
                               autocomplete="email">
                        
                        <div class="invalid-feedback" id="emailError"></div>
                    </div>

                    <!-- Password Field -->
                    <div class="form-group">
                        <label for="password" class="form-label">Mot de passe </label>
                        <input type="password" 
                               id="password" 
                               name="password" 
                               class="form-control" 
                               placeholder="Minimum 8 caractères"
                               required
                               minlength="8"
                               autocomplete="new-password">
                        
                        <button type="button" class="password-toggle" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </button>
                        <div class="invalid-feedback" id="passwordError"></div>
                        
                        <!-- Password Strength Indicator -->
                        <div class="password-strength" id="passwordStrength">
                            <div class="strength-text"></div>
                            <div class="strength-bar">
                                <div class="strength-fill"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Confirm Password Field -->
                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">Confirmer le mot de passe </label>
                        <input type="password" 
                               id="password_confirmation" 
                               name="password_confirmation" 
                               class="form-control" 
                               placeholder="Répétez votre mot de passe"
                               required
                               autocomplete="new-password">
                       
                        <button type="button" class="password-toggle" id="toggleConfirmPassword">
                            <i class="fas fa-eye"></i>
                        </button>
                        <div class="invalid-feedback" id="confirmPasswordError"></div>
                    </div>

                    <!-- Terms and Conditions -->
                    <div class="form-check mb-3">
                        <input class="form-check-input" 
                               type="checkbox" 
                               id="terms" 
                               name="terms" 
                               required
                               {{ old('terms') ? 'checked' : '' }}>
                        <label class="form-check-label" for="terms">
                            J'accepte les <a href="{{ route('conditions-generales') }}" target="_blank" class="terms-link">conditions générales</a> 
                            et la <a href="{{ route('politique-confidentialite') }}" target="_blank" class="terms-link">politique de confidentialité</a> *
                        </label>
                        <div class="invalid-feedback" id="termsError"></div>
                    </div>

                    <!-- Newsletter Subscription -->
                    <div class="form-check mb-4">
                        <input class="form-check-input" 
                               type="checkbox" 
                               id="newsletter" 
                               name="newsletter"
                               {{ old('newsletter') ? 'checked' : '' }}>
                        <label class="form-check-label" for="newsletter">
                            Je souhaite recevoir la newsletter et les offres exclusives par email
                        </label>
                    </div>

                   

                    <!-- Register Button -->
                    <button type="submit" class="btn btn-register pulse-animation" id="registerBtn">
                        <i class="fas fa-user-plus"></i>
                        Créer mon compte
                    </button>

                    <!-- Login Link -->
                    <div class="login-link">
                        <p class="mb-0">
                            Vous avez déjà un compte ? 
                            <a href="{{ route('login') }}" class="fw-bold">Connectez-vous</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });

        // Toggle Password Visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        // Toggle Confirm Password Visibility
        document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
            const confirmPasswordInput = document.getElementById('password_confirmation');
            const icon = this.querySelector('i');
            
            if (confirmPasswordInput.type === 'password') {
                confirmPasswordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                confirmPasswordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        // Password Strength Checker
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthIndicator = document.getElementById('passwordStrength');
            let strength = 0;
            
            // Reset classes
            strengthIndicator.className = 'password-strength';
            
            // Length check
            if (password.length >= 8) strength += 25;
            if (password.length >= 12) strength += 10;
            
            // Lowercase check
            if (/[a-z]/.test(password)) strength += 15;
            
            // Uppercase check
            if (/[A-Z]/.test(password)) strength += 15;
            
            // Numbers check
            if (/[0-9]/.test(password)) strength += 15;
            
            // Special characters check
            if (/[^A-Za-z0-9]/.test(password)) strength += 20;
            
            // Update strength display
            const strengthText = strengthIndicator.querySelector('.strength-text');
            const strengthFill = strengthIndicator.querySelector('.strength-fill');
            
            if (strength <= 25) {
                strengthIndicator.classList.add('strength-weak');
                strengthText.textContent = 'Faible';
            } else if (strength <= 50) {
                strengthIndicator.classList.add('strength-medium');
                strengthText.textContent = 'Moyen';
            } else if (strength <= 75) {
                strengthIndicator.classList.add('strength-good');
                strengthText.textContent = 'Bon';
            } else {
                strengthIndicator.classList.add('strength-strong');
                strengthText.textContent = 'Fort';
            }
            
            // Update fill width
            strengthFill.style.width = Math.min(strength, 100) + '%';
        });

        // Form Validation
        document.getElementById('registrationForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const name = document.getElementById('name');
            const email = document.getElementById('email');
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('password_confirmation');
            const terms = document.getElementById('terms');
            
            const nameError = document.getElementById('nameError');
            const emailError = document.getElementById('emailError');
            const passwordError = document.getElementById('passwordError');
            const confirmPasswordError = document.getElementById('confirmPasswordError');
            const termsError = document.getElementById('termsError');
            
            let isValid = true;
            
            // Reset errors
            [name, email, password, confirmPassword, terms].forEach(field => {
                field.classList.remove('is-invalid');
            });
            [nameError, emailError, passwordError, confirmPasswordError, termsError].forEach(error => {
                error.textContent = '';
            });
            
            // Name validation
            if (name.value.trim().length < 2) {
                name.classList.add('is-invalid');
                nameError.textContent = 'Le nom doit contenir au moins 2 caractères';
                isValid = false;
            }
            
            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email.value)) {
                email.classList.add('is-invalid');
                emailError.textContent = 'Veuillez entrer une adresse email valide';
                isValid = false;
            }
            
            // Password validation
            if (password.value.length < 8) {
                password.classList.add('is-invalid');
                passwordError.textContent = 'Le mot de passe doit contenir au moins 8 caractères';
                isValid = false;
            }
            
            // Password confirmation
            if (password.value !== confirmPassword.value) {
                confirmPassword.classList.add('is-invalid');
                confirmPasswordError.textContent = 'Les mots de passe ne correspondent pas';
                isValid = false;
            }
            
            // Terms validation
            if (!terms.checked) {
                terms.classList.add('is-invalid');
                termsError.textContent = 'Vous devez accepter les conditions générales';
                isValid = false;
            }
            
            if (isValid) {
                // Show loading state
                const registerBtn = document.getElementById('registerBtn');
                registerBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Création du compte...';
                registerBtn.disabled = true;
                registerBtn.classList.remove('pulse-animation');
                
                // Submit form
                setTimeout(() => {
                    this.submit();
                }, 1500);
            }
        });

        // Auto-hide alerts after 5 seconds
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);

        // Real-time password confirmation check
        document.getElementById('password_confirmation').addEventListener('input', function() {
            const password = document.getElementById('password').value;
            const confirmPassword = this.value;
            
            if (password && confirmPassword) {
                if (password !== confirmPassword) {
                    this.classList.add('is-invalid');
                    document.getElementById('confirmPasswordError').textContent = 'Les mots de passe ne correspondent pas';
                } else {
                    this.classList.remove('is-invalid');
                    document.getElementById('confirmPasswordError').textContent = '';
                }
            }
        });

        // Add input focus effects
        const inputs = document.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('focused');
            });
        });

        // Initialize tooltips for terms links
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>
</body>
</html>