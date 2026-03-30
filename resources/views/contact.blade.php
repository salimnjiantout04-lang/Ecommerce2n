
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="{{ asset('img/logo2n.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Contactez 2N CORPORATE - Expert en équipements électroniques professionnels. Service client disponible 24/7 pour toutes vos questions.">
    <title>Contact - 2N CORPORATE</title>
    
    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Styles -->
    <style>
        :root {
            --primary-color: #0a1c3a;
            --primary-light: #1a3b6e;
            --secondary-color: #ffc107;
            --accent-color: #28a745;
            --text-dark: #333;
            --text-light: #666;
            --bg-light: #f8f9fa;
            --border-color: #dee2e6;
            --shadow-light: 0 2px 10px rgba(0,0,0,0.05);
            --shadow-medium: 0 4px 15px rgba(0,0,0,0.1);
            --transition-normal: 0.3s ease;
        }

        /* Hero Section */
        .contact-hero {
            background: linear-gradient(135deg, #0a1c3a 0%, #1a3b6e 100%);
            color: white;
            padding: 5rem 0 3rem;
            position: relative;
            overflow: hidden;
        }

        .contact-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://img.freepik.com/photos-premium/homme-noir-ordinateur-centre-appels-pensant-nous-contacter-se-concentrer-communication-casque-se-connecter-agent-masculin-focus-service-client-employe-du-service-assistance-lit-ligne_590464-186565.jpg') center/cover;
            opacity: 0.1;
        }

        .contact-hero-content {
            position: relative;
            z-index: 2;
        }

        .breadcrumb {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 30px;
            padding: 0.75rem 1.5rem;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            margin-bottom: 2rem;
        }

        .breadcrumb-item a {
            color: white;
            text-decoration: none;
            transition: color var(--transition-normal);
        }

        .breadcrumb-item a:hover {
            color: var(--secondary-color);
        }

        .breadcrumb-item.active {
            color: var(--secondary-color);
        }

        .breadcrumb-item + .breadcrumb-item::before {
            color: rgba(255, 255, 255, 0.5);
        }

        /* Contact Cards */
        .contact-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            height: 100%;
            box-shadow: var(--shadow-light);
            transition: transform var(--transition-normal), box-shadow var(--transition-normal);
            border: 1px solid var(--border-color);
        }

        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-medium);
        }

        .contact-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: rgba(10, 28, 58, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
        }

        .contact-icon i {
            font-size: 1.8rem;
            color: var(--primary-color);
        }

        /* Form Styles */
        .contact-form-container {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: var(--shadow-medium);
            border: 1px solid var(--border-color);
        }

        .form-control, .form-select {
            border: 1px solid var(--border-color);
            border-radius: 10px;
            padding: 0.75rem 1rem;
            transition: all var(--transition-normal);
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(10, 28, 58, 0.25);
        }

        .form-label {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        .btn-primary {
            background: var(--primary-color);
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 10px;
            font-weight: 600;
            transition: all var(--transition-normal);
        }

        .btn-primary:hover {
            background: var(--primary-light);
            transform: translateY(-2px);
            box-shadow: var(--shadow-medium);
        }

        /* Map Section */
        .map-container {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--shadow-medium);
            height: 400px;
        }

        .map-container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        /* Info Section */
        .info-section {
            background: var(--bg-light);
            border-radius: 20px;
            padding: 3rem;
            margin-top: 3rem;
        }

        .info-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            box-shadow: var(--shadow-light);
        }

        .info-icon i {
            font-size: 1.5rem;
            color: var(--primary-color);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .contact-hero {
                padding: 3rem 0 2rem;
            }
            
            .contact-form-container {
                padding: 1.5rem;
            }
            
            .info-section {
                padding: 2rem 1.5rem;
            }
        }

        /* Animation */
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }

        .animate-on-scroll.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body>
    <!-- Header -->
    @include('header', ['souscategories' => $souscategories ?? []])

    <!-- Hero Section -->
    <section class="contact-hero" data-aos="fade-in">
        <div class="container">
            <div class="contact-hero-content">
                
                
                <div class="row align-items-center">
                    <div class="col-lg-8" data-aos="fade-right" data-aos-delay="200">
                        <span class="badge bg-warning text-dark mb-3 px-3 py-2">
                            <i class="fas fa-headset me-2"></i>Support 24/7
                        </span>
                        
                        <h1 class="display-4 fw-bold mb-4">Contactez-nous</h1>
                        
                        <p class="lead mb-4">
                            Besoin d'aide pour choisir votre équipement ? Une question technique ? 
                            Notre équipe d'experts est à votre écoute pour vous accompagner dans tous vos projets.
                        </p>
                    </div>
                    
                    <div class="col-lg-4" data-aos="fade-left" data-aos-delay="400">
                        <div class="bg-blue  p-4 ">
                            <h5 class="fw-bold mb-3 text-primary">
                                <i class="fas fa-clock me-2"></i>Horaires d'ouverture
                            </h5>
                            <ul class="list-unstyled mb-0">
                                <li class="d-flex justify-content-between mb-2">
                                    <span>Lundi - Vendredi</span>
                                    <strong>8h00 - 18h00</strong>
                                </li>
                                <li class="d-flex justify-content-between mb-2">
                                    <span>Samedi</span>
                                    <strong>9h00 - 16h00</strong>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <span>Dimanche</span>
                                    <strong class="text-danger">Fermé</strong>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Methods -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Téléphone</h4>
                        <p class="text-muted mb-3">Appelez-nous pour un conseil personnalisé</p>
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <i class="fas fa-phone text-primary"></i>
                            <a href="tel:+237 691 102 395" class="text-decoration-none fw-bold fs-5">
                                +237 691 102 395
                            </a>
                        </div>

                         <div class="d-flex align-items-center gap-2 mb-2">
                            <i class="fas fa-phone text-primary"></i>
                            <a href="tel:+237 693 015 001" class="text-decoration-none fw-bold fs-5">
                               +237 693 015 001
                            </a>
                        </div>

                         <div class="d-flex align-items-center gap-2 mb-2">
                            <i class="fas fa-phone text-primary"></i>
                            <a href="tel:+237 233 390 876" class="text-decoration-none fw-bold fs-5">
                               +237 233 390 876
                            </a>
                        </div>
                       
                    </div>
                </div>
                
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Email</h4>
                        <p class="text-muted mb-3">Écrivez-nous pour toute demande</p>
                       
                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-envelope text-primary"></i>
                            <a href="mailto:info@2ncorporate.com" class="text-decoration-none fw-bold">
                                info@2ncorporate.com
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Adresse</h4>
                        <p class="text-muted mb-3">Venez nous rencontrer</p>
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-map-pin text-primary mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1">2N CORPORATE SARL</h6>
                                <p class="mb-0">
                                   Ancienne Route Bonaberi<br>
                                    En face ancien Cinema FOHATO<br>
                                    
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form & Map -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-5">
                <!-- Contact Form -->
                <div class="col-lg-7" data-aos="fade-right">
                    <div class="contact-form-container">
                        <h2 class="fw-bold mb-4">Envoyez-nous un message</h2>
                        <p class="text-muted mb-4">Remplissez le formulaire ci-dessous et nous vous répondrons dans les plus brefs délais</p>
                        
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle me-2"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-circle me-2"></i>
                                Veuillez corriger les erreurs ci-dessous
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        
                        <form action="{{ route('contact.submit') }}" method="POST" id="contactForm">
                            @csrf
                            
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Nom complet *</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email *</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           id="email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Téléphone</label>
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                                           id="phone" name="phone" value="{{ old('phone') }}">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="subject" class="form-label">Sujet *</label>
                                    <select class="form-select @error('subject') is-invalid @enderror" 
                                            id="subject" name="subject" required>
                                        <option value="" selected disabled>Sélectionnez un sujet</option>
                                        <option value="Demande de devis" {{ old('subject') == 'Demande de devis' ? 'selected' : '' }}>Demande de devis</option>
                                        <option value="Support technique" {{ old('subject') == 'Support technique' ? 'selected' : '' }}>Support technique</option>
                                        <option value="Informations produit" {{ old('subject') == 'Informations produit' ? 'selected' : '' }}>Informations produit</option>
                                        <option value="Service après-vente" {{ old('subject') == 'Service après-vente' ? 'selected' : '' }}>Service après-vente</option>
                                        <option value="Partenariat" {{ old('subject') == 'Partenariat' ? 'selected' : '' }}>Partenariat</option>
                                        <option value="Autre" {{ old('subject') == 'Autre' ? 'selected' : '' }}>Autre</option>
                                    </select>
                                    @error('subject')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="message" class="form-label">Message *</label>
                                <textarea class="form-control @error('message') is-invalid @enderror" 
                                          id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-check mb-4">
                                <input class="form-check-input @error('privacy') is-invalid @enderror" 
                                       type="checkbox" id="privacy" name="privacy" required>
                                <label class="form-check-label" for="privacy">
                                    J'accepte la <a href="#" class="text-primary">politique de confidentialité</a> *
                                </label>
                                @error('privacy')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-primary btn-lg w-100">
                                <i class="fas fa-paper-plane me-2"></i>Envoyer le message
                            </button>
                        </form>
                    </div>
                </div>
                
                <!-- Map -->
                <div class="col-lg-5" data-aos="fade-left">
                    <div class="map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3979.70307817461!2d9.664755788486838!3d4.0807595853034115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10611332392adf35%3A0x4b6989e2ec333a0d!2s2NCORPORATE%20SARL!5e0!3m2!1sfr!2sfr!4v1766589825822!5m2!1sfr!2sfr" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    
                    <div class="mt-4">
                        <h5 class="fw-bold mb-3">
                            <i class="fas fa-info-circle me-2 text-primary"></i>Informations pratiques
                        </h5>
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fas fa-car text-primary"></i>
                                    <small>Parking gratuit</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fas fa-wheelchair text-primary"></i>
                                    <small>Accessible PMR</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fas fa-wifi text-primary"></i>
                                    <small>WiFi gratuit</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fas fa-coffee text-primary"></i>
                                    <small>Accueil café</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Additional Information -->
    <section class="py-5">
        <div class="container">
            <div class="info-section" data-aos="fade-up">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <h2 class="fw-bold mb-3">Besoin d'un conseil technique ?</h2>
                        <p class="lead mb-4">
                            Nos experts techniques sont disponibles pour vous aider à choisir l'équipement parfait 
                            pour vos besoins spécifiques. N'hésitez pas à nous contacter pour une étude personnalisée.
                        </p>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="info-icon">
                                        <i class="fas fa-cogs"></i>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold mb-2">Support technique</h5>
                                        <p class="mb-0 text-muted">Assistance technique gratuite pour l'installation et la maintenance</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="info-icon">
                                        <i class="fas fa-truck"></i>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold mb-2">Livraison sur site</h5>
                                        <p class="mb-0 text-muted">Livraison et installation sur toute la région</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center">
                        <div class="p-4 bg-primary rounded-3 text-white">
                            <i class="fas fa-headset fa-4x mb-3"></i>
                            <h4 class="fw-bold">Urgence technique ?</h4>
                            <p class="mb-3">Service d'intervention rapide 24h/24</p>
                            <a href="tel:+237691102395" class="btn btn-warning btn-lg w-100">
                                <i class="fas fa-phone-alt me-2"></i>Appeler maintenant
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    

    <!-- Footer -->
    @include('footer1')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });

        // Form validation
        document.getElementById('contactForm')?.addEventListener('submit', function(e) {
            const requiredFields = this.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('is-invalid');
                } else {
                    field.classList.remove('is-invalid');
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                alert('Veuillez remplir tous les champs obligatoires.');
            }
        });

        // Smooth scroll to form
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Animation on scroll
        function animateOnScroll() {
            const elements = document.querySelectorAll('.animate-on-scroll');
            
            elements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;
                
                if (elementTop < windowHeight - 100) {
                    element.classList.add('visible');
                }
            });
        }

        window.addEventListener('scroll', animateOnScroll);
        window.addEventListener('load', animateOnScroll);
        
        // Auto-resize textarea
        const textarea = document.getElementById('message');
        if (textarea) {
            textarea.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = (this.scrollHeight) + 'px';
            });
        }
        
        // Phone number formatting
        const phoneInput = document.getElementById('phone');
        if (phoneInput) {
            phoneInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length > 0) {
                    value = '+237 ' + value;
                }
                e.target.value = value;
            });
        }
    </script>
</body>
</html>