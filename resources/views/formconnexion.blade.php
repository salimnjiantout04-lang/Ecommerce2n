<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion - 2N SHOP</title>
    
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

        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            max-width: 1200px;
            width: 100%;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .login-left {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .login-left::before {
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

        .welcome-text h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: white;
        }

        .welcome-text p {
            font-size: 1.1rem;
            opacity: 0.9;
            line-height: 1.6;
        }

        .features-list {
            margin-top: 40px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            padding: 10px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            backdrop-filter: blur(5px);
        }

        .feature-icon {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        }

        .feature-text h4 {
            font-size: 1rem;
            margin-bottom: 2px;
        }

        .feature-text p {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        .login-right {
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .login-header h2 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .login-header p {
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
            border: 0px  ;
            border-radius: 10px;
            padding: 12px 45px 12px 15px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
        }

        .form-control:focus {
            border-color: white;
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
            right: 9px;
            top: 50%;
            transform: translateY(-7%);
            background: none;
            border: none;
            color: #666666;
            cursor: pointer;
            z-index: 2;
            padding: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        

        .form-check {
            margin-bottom: 25px;
        }

        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .form-check-label {
            color: #555;
        }

        .btn-login {
            background: linear-gradient(135deg, var(--primary-color)100%);
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
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(10, 28, 58, 0.3);
            color: white;
        }

        .divider {
            text-align: center;
            margin: 30px 0;
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

        .social-login {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
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

        .links-section {
            text-align: center;
            margin-top: 30px;
        }

        .links-section a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .links-section a:hover {
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

        

        /* Responsive Design */
        @media (max-width: 992px) {
            .login-left {
                padding: 40px 30px;
            }
            
            .login-right {
                padding: 40px 30px;
            }
            
            .welcome-text h1 {
                font-size: 2rem;
            }
        }

        @media (max-width: 768px) {
            .login-card {
                flex-direction: column;
            }
            
            .login-left {
                padding: 40px 20px;
                border-radius: 20px 20px 0 0;
            }
            
            .login-right {
                padding: 40px 20px;
            }
            
            .social-login {
                flex-direction: column;
            }
            
            .feature-item {
                padding: 8px;
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
    </style>
</head>
<body>
    <!-- Alert Messages -->
    @if(session('fail'))
        <div class="alert-container">
            <div class="alert alert-danger alert-dismissible fade show animate-fade-in-up" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>
                {{ session('fail') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    @if(session('success'))
        <div class="alert-container">
            <div class="alert alert-success alert-dismissible fade show animate-fade-in-up" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="login-container">
        <div class="login-card d-flex flex-wrap">
            <!-- Left Column - Welcome Section -->
            <div class="col-lg-6 login-left" data-aos="fade-right" data-aos-duration="800">
                <div class="logo-container">
                    <img src="{{ asset('img/logo2n.png') }}" alt="2N SHOP Logo">
                    <h1 class="display-5 fw-bold">2N CORPORATE SHOP</h1>
                </div>
                
                <div class="welcome-text">
                    <p>Connectez-vous à votre compte pour accéder à toutes les fonctionnalités et bénéficier de nos meilleures offres.</p>
                </div>

                <div class="features-list">
                    <div class="feature-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="feature-icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="feature-text">
                            <h4>Suivi des commandes</h4>
                            <p>Consultez l'état de vos commandes en temps réel</p>
                        </div>
                    </div>
                    
                    <div class="feature-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="feature-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <div class="feature-text">
                            <h4>Wishlist personnelle</h4>
                            <p>Accédez à vos produits favoris</p>
                        </div>
                    </div>
                    
                    <div class="feature-item" data-aos="fade-up" data-aos-delay="300">
                        <div class="feature-icon">
                            <i class="fas fa-tags"></i>
                        </div>
                        <div class="feature-text">
                            <h4>Offres exclusives</h4>
                            <p>Profitez de réductions réservées aux membres</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Login Form -->
            <div class="col-lg-6 login-right" data-aos="fade-left" data-aos-duration="800">
                <div class="login-header">
                    <h2>Connectez-vous</h2>
                    <p>Entrez vos identifiants pour accéder à votre compte</p>
                </div>

                <form action="{{ route('loginuser') }}" method="POST" id="loginForm">
                    @csrf
                    
                    <!-- Email Field -->
                    <div class="form-group">
                        <label for="email" class="form-label">Adresse Email</label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               class="form-control" 
                               placeholder="votre@email.com"
                               required
                               autocomplete="email"
                               autofocus>
                       
                        <div class="invalid-feedback" id="emailError"></div>
                    </div>

                    <!-- Password Field -->
                    <div class="form-group">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" 
                               id="password" 
                               name="password" 
                               class="form-control" 
                               placeholder="Entrez votre mot de passe"
                               required
                               autocomplete="current-password">
                        
                        <button type="button" class="password-toggle" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </button>
                        <div class="invalid-feedback" id="passwordError"></div>
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember">
                                Se souvenir de moi
                            </label>
                        </div>
                        <a href="#" class="text-decoration-none">
                            <small>Mot de passe oublié ?</small>
                        </a>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-login mb-4" id="loginBtn">
                        <i class="fas fa-sign-in-alt"></i>
                        Se connecter
                    </button>

                    
                    

                    <!-- Register Link -->
                    <div class="links-section">
                        <p class="mb-0">
                            Vous n'avez pas de compte ? 
                            <a href="{{ route('signin') }}" class="fw-bold">Créer un compte</a>
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

        // Form Validation
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = document.getElementById('email');
            const password = document.getElementById('password');
            const emailError = document.getElementById('emailError');
            const passwordError = document.getElementById('passwordError');
            let isValid = true;
            
            // Reset errors
            email.classList.remove('is-invalid');
            password.classList.remove('is-invalid');
            emailError.textContent = '';
            passwordError.textContent = '';
            
            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email.value)) {
                email.classList.add('is-invalid');
                emailError.textContent = 'Veuillez entrer une adresse email valide';
                isValid = false;
            }
            
            // Password validation
            if (password.value.length < 6) {
                password.classList.add('is-invalid');
                passwordError.textContent = 'Le mot de passe doit contenir au moins 6 caractères';
                isValid = false;
            }
            
            if (isValid) {
                // Show loading state
                const loginBtn = document.getElementById('loginBtn');
                loginBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Connexion en cours...';
                loginBtn.disabled = true;
                
                // Submit form
                this.submit();
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

        // Add enter key support
        document.addEventListener('keypress', function(e) {
            if (e.key === 'Enter' && !e.target.matches('button, a')) {
                const form = document.getElementById('loginForm');
                const submitBtn = form.querySelector('button[type="submit"]');
                submitBtn.click();
            }
        });
    </script>
</body>
</html>