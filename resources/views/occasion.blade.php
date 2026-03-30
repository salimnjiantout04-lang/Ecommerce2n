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
    
    <!-- Styles -->
    <style>
        /* Styles de la page d'accueil pour les produits */
        .product-card {
            border: 1px solid #e9ecef;
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
            background: white;
            position: relative;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .product-image {
            padding: 15px;
            text-align: center;
            background: #ffffffff;
            flex-shrink: 0;
        }

        .product-image img {
            width: 100%;
            height: 200px;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .product-card:hover .product-image img {
            transform: scale(1.05);
        }

        .card-body {
            padding: 15px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .product-category {
            font-size: 0.8rem;
            color: #6c757d;
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .product-title {
            font-size: 0.95rem;
            font-weight: 600;
            color: #333;
            line-height: 1.4;
            margin-bottom: 10px;
            flex-grow: 1;
        }

        .product-price {
            margin-bottom: 15px;
        }

        .product-price h3 {
            font-size: 1.1rem;
            color: #dc3545;
            font-weight: 700;
        }

        .product-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            padding: 4px 10px;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 600;
            z-index: 2;
        }

        .product-badge.new {
            background-color: #0d6efd;
            color: white;
        }

        .product-badge.sale {
            background-color: #28a745;
            color: white;
        }

        .product-badge.occasion {
            background-color: #ffc107;
            color: #000;
        }

        .btn-danger {
            background-color: #0a1c3a !important;
            border-color: #0a1c3a !important;
            color: white;
            padding: 10px;
            font-weight: 600;
            border-radius: 0 0 12px 12px;
            transition: all 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #1a3b6e !important;
            transform: translateY(-2px);
        }

        /* Styles des filtres */
        .page-header {
            background: #0a1c3a !important;
            color: white;
            padding: 60px 0;
            text-align: center;
            margin-bottom: 30px;
        }

        .page-header h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .page-header p {
            font-size: 1.1rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
        }

        .product-filters {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
        }

        .product-filters label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            display: block;
        }

        .product-filters select {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 10px 15px;
            width: 100%;
            transition: all 0.3s ease;
        }

        .product-filters select:focus {
            border-color: #0a1c3a;
            box-shadow: 0 0 0 0.2rem rgba(10, 28, 58, 0.1);
            outline: none;
        }

        /* Pagination */
        .pagination {
            margin-top: 40px;
        }

        .page-item.active .page-link {
            background-color: #0a1c3a;
            border-color: #0a1c3a;
        }

        .page-link {
            color: #0a1c3a;
            border: 1px solid #dee2e6;
            padding: 8px 16px;
            margin: 0 2px;
            border-radius: 5px;
        }

        .page-link:hover {
            background-color: #f8f9fa;
            color: #0a1c3a;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .page-header {
                padding: 40px 0;
            }
            
            .page-header h1 {
                font-size: 2rem;
            }
            
            .product-card {
                margin-bottom: 20px;
            }
            
            .product-image img {
                height: 180px;
            }
        }

        @media (max-width: 576px) {
            .page-header h1 {
                font-size: 1.8rem;
            }
            
            .product-image img {
                height: 160px;
            }
            
            .product-title {
                font-size: 0.9rem;
            }
            
            .product-price h3 {
                font-size: 1rem;
            }
        }

        /* Animation pour les images */
        .img-animate {
            transition: transform 0.4s ease;
        }

        .img-animate:hover {
            transform: scale(1.05);
        }
    </style>

    <!-- SEO Meta Tags -->
    {!! SEOTools::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}

</head>

<body>
    @include('header', ['souscategories' => $souscategories1])
    
    <main>
        <!-- Bannière de titre de la page -->
        <section class="page-header">
            <div class="container">
                <h1>
                    Nos Équipements d'Occasion
                    @if(isset($selectedCatName))
                        - {{ $selectedCatName }}
                    @endif
                </h1>
                <p>Découvrez notre gamme d'équipements d'occasion : informatique, téléphones, électronique, outillage, luminaire, générateur...</p>
            </div>
        </section>



        <!-- Message d'alerte -->
        @if(isset($message))
            <div class="container">
                <div class="alert alert-warning text-center mt-3">
                    {{ $message }}
                </div>
            </div>
        @endif

        <!-- Section des produits -->
        <section class="products py-4">
            <div class="container">
                <div class="row g-4">
                    @foreach ($produits as $produit)
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="product-card h-100">
                                <!-- Badge OCCASION ajouté -->
                                <div class="product-badge occasion">OCCASION</div>
                                
                                @if($produit->created_at->gt(now()->subDays(7)))
                                    <div class="product-badge new" style="left: 100px;">NOUVEAU</div>
                                @elseif($produit->discount)
                                    <div class="product-badge sale" style="left: 100px;">-{{ $produit->discount }}%</div>
                                @endif

                                <div class="product-image">
                                    @if(count($produit->images))
                                        <a href="/detailprod/{{ $produit->id }}">
                                            <img src="{{ asset('photos/' . urlencode($produit->images[0]->nom)) }}"
                                                 alt="{{ $produit->nom }}"
                                                 class="img-fluid img-animate">
                                        </a>
                                    @else
                                        <a href="/detailprod/{{ $produit->id }}">
                                            <img src="/default.jpg" 
                                                 alt="Image non disponible" 
                                                 class="img-fluid img-animate">
                                        </a>
                                    @endif
                                </div>

                                <div class="card-body">
                                    <div class="product-category small text-muted mb-2">
                                        {{ $produit->categorie->nomCat ?? 'Produit' }}
                                    </div>
                                    <h3 class="product-title fw-semibold mb-3">
                                        {{ $produit->libelle }}
                                    </h3>
                                    <div class="product-price">
                                        <h3 class="fw-bold text-danger mb-0">
                                            {{ number_format($produit->prixbonetat, 0, ',', ',') }} FCFA
                                        </h3>
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

                                </div>

                                <a href="/detailprod/{{ $produit->id }}" class="btn btn-danger gap-2 w-100 d-flex align-items-center justify-content-center">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-2">
                                        <path d="M2 2H4L4.73 5M4.73 5H21L17 14H6L4.73 5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7 18C7 17.4477 7.44772 17 8 17C8.55228 17 9 17.4477 9 18C9 18.5523 8.55228 19 8 19C7.44772 19 7 18.5523 7 18Z" stroke="currentColor" stroke-width="2"/>
                                        <path d="M15 18C15 17.4477 15.4477 17 16 17C16.5523 17 17 17.4477 17 18C17 18.5523 16.5523 19 16 19C15.4477 19 15 18.5523 15 18Z" stroke="currentColor" stroke-width="2"/>
                                    </svg>
                                    Détails
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($produits->hasPages())
                    <div class="pagination mt-5">
                        {{ $produits->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            </div>
        </section>
    </main>

    @include('footer1')
</body>
</html>