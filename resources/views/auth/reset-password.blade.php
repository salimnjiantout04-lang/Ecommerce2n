<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialiser le mot de passe - 2N SHOP</title>

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
            --danger-color: #dc3545;
        }

        body {
            font-family: 'Figtree', sans-serif;
            background: linear-gradient(135deg, #0a1c3a 0%, #1a3b6e 100%);
            color: #333;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .reset-container {
            max-width: 500px;
            width: 100%;
        }

        .reset-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 40px;
        }

        .logo {
            font-size: 2.5rem;
            color: var(--primary-color);
            text-align: center;
            margin-bottom: 20px;
        }

        .reset-title {
            color: var(--primary-color);
            font-weight: 700;
            text-align: center;
            margin-bottom: 10px;
        }

        .reset-subtitle {
            color: #666;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }

        .form-control {
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            padding: 12px 45px 12px 15px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(77, 171, 247, 0.1);
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
            right: 45px;
            top: 40px;
            background: none;
            border: none;
            color: #999;
            cursor: pointer;
            z-index: 2;
        }

        .password-toggle:hover {
            color: var(--primary-color);
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
            background: #ffc107;
            width: 50%;
        }

        .strength-good .strength-fill {
            background: #ff9800;
            width: 75%;
        }

        .strength-strong .strength-fill {
            background: #28a745;
            width: 100%;
        }

        .strength-text {
            font-weight: 600;
        }

        .strength-weak .strength-text {
            color: var(--danger-color);
        }

        .strength-medium .strength-text {
            color: #ffc107;
        }

        .strength-good .strength-text {
            color: #ff9800;
        }

        .strength-strong .strength-text {
            color: #28a745;
        }

        .btn-reset {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            border: none;
            padding: 14px 30px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1.1rem;
            width: 100%;
            transition: all 0.3s ease;
        }

        .btn-reset:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(10, 28, 58, 0.3);
            color: white;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
        }

        .back-link:hover {
            color: var(--accent-color);
            text-decoration: underline;
        }

        .alert {
            border-radius: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="reset-container">
        <div class="reset-card">
            <div class="logo">
                <i class="fas fa-lock"></i>
            </div>

            <h2 class="reset-title">Réinitialiser le mot de passe</h2>
            <p class="reset-subtitle">Choisissez un nouveau mot de passe sécurisé</p>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('password.update') }}" method="POST">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="form-group">
                    <label for="email" class="form-label">Adresse email</label>
                    <input type="email"
                           id="email"
                           name="email"
                           class="form-control"
                           placeholder="votre@email.com"
                           required
                           value="{{ old('email', $request->email) }}"
                           autocomplete="email">
                    <div class="input-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Nouveau mot de passe</label>
                    <input type="password"
                           id="password"
                           name="password"
                           class="form-control"
                           placeholder="Minimum 8 caractères"
                           required
                           minlength="8"
                           autocomplete="new-password">
                    <div class="input-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <button type="button" class="password-toggle" id="togglePassword">
                        <i class="fas fa-eye"></i>
                    </button>

                    <div class="password-strength" id="passwordStrength">
                        <div class="strength-text"></div>
                        <div class="strength-bar">
                            <div class="strength-fill"></div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                    <input type="password"
                           id="password_confirmation"
                           name="password_confirmation"
                           class="form-control"
                           placeholder="Répétez votre mot de passe"
                           required
                           autocomplete="new-password">
                    <div class="input-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <button type="button" class="password-toggle" id="toggleConfirmPassword">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>

                <button type="submit" class="btn btn-reset">
                    <i class="fas fa-save me-2"></i>
                    Réinitialiser le mot de passe
                </button>
            </form>

            <a href="{{ route('login') }}" class="back-link">
                <i class="fas fa-arrow-left me-2"></i>Retour à la connexion
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
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

        // Real-time password confirmation check
        document.getElementById('password_confirmation').addEventListener('input', function() {
            const password = document.getElementById('password').value;
            const confirmPassword = this.value;

            if (password && confirmPassword) {
                if (password !== confirmPassword) {
                    this.classList.add('is-invalid');
                } else {
                    this.classList.remove('is-invalid');
                }
            }
        });
    </script>
</body>
</html>
