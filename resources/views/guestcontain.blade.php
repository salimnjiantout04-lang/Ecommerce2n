<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="{{ asset('img/logo2n.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="2NCORPORATE - Votre partenaire de confiance pour équipements électriques professionnels">
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #00011fea;
            --secondary-color: #e0b83f;
            --accent-color: #ff6b35;
            --light-bg: #ffffff;
            --text-dark: #2c2c2c;
            --text-light: #6c757d;
            --border-color: #e8e8e8;
        }
        
         {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body
         {
            font-family: 'Figtree', sans-serif;
            color: var(--text-dark);
            overflow-x: hidden;
            background: #ffffff;
        }
        
        /* Conteneur principal élargi */
        .container {
            max-width: 1680px !important;
            padding-left: 15px;
            padding-right: 15px;
            margin-left: auto;
            margin-right: auto;
        }
        
        /* Sections avec moins d'espace latéral */
        .hero-split-section,
        .category-showcase,
        .products-section,
        .promo-grid {
            padding-left: 0;
            padding-right: 0;
        }
        
        /* Sections avec padding interne seulement */
        .hero-split-section {
            padding-top: 30px;
             padding-bottom: 40px;
        
           
        }
        
        .category-showcase {
            padding-top: 25px;
            padding-bottom: 25px;
        }
        
        .products-section {
            padding-top: 35px;
            padding-bottom: 35px;
        }
        
        .promo-grid {
            padding-top: 25px;
            padding-bottom: 15px;
        }
        
        /* ===== HERO SPLIT SECTION ===== */
        .hero-split-section {
            background: white;
        }
        
        .split-container {
            display: grid;
            grid-template-columns: 3fr 1fr;
            gap: 20px;
           
        }
        
        /* Carousel Left Side - plus large et plus haut */
        .hero-carousel {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            height: 450px;
         font-family: 'Times New Roman';

        }

        .carousel-container-slides {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .carousel-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            background-size: cover;
            background-position: center;
            opacity: 0;
            transform: translateX(100%);
            transition: all 0.8s ease-in-out;
        }

        .carousel-slide.active {
            opacity: 1;
            transform: translateX(0);
        }

        .carousel-slide.leaving {
            opacity: 0;
            transform: translateX(-100%);
        }
        
        .carousel-content {
            position: relative;
            z-index: 2;
            color:#000000;
            max-width: 600px;
            
            padding: 35px;
        }
        
        .carousel-content h2 {
            color: #f9f9f9;
            
            margin-bottom: 12px;
            line-height: 1.2;
        }
        
        .carousel-content p {
            font-size: 1rem;
            margin-bottom: 20px;
            opacity: 0.95;
        }
        
        .btn-carousel {
            background: #000000ff;
            color: #e0b83f;
            padding: 10px 25px;
            border: 1px solid black;
            border-radius: 1px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
        }
        
        .btn-carousel:hover {
            background: rgb(122, 122, 122);
           border-color: white;
            color: white;
        }
        
        .carousel-controls {
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            transform: translateY(-50%);
            display: flex;
            justify-content: space-between;
            padding: 0 15px;
            z-index: 3;
        }

        .carousel-arrow {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(0, 15, 37, 0.64);
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            font-size: 16px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }

        .carousel-arrow:hover {
            background:  rgb(0, 15, 37);
            transform: scale(1.1);
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
        }

        .carousel-arrow:active {
            transform: scale(0.95);
        }
        
        /* Promotional Cards Right Side */
        .promotional-cards-side {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .promotional-card {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            height: 220px;
            max-width: 330px;
            position: relative;
        }

        .promotional-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }

        .promotional-image {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
        }

        .promotional-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(10,28,58,0.1), rgba(10,28,58,0.05));
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            text-align: center;
        }

        .promotional-title {
            color: white;
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 15px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }

        .btn-promotional {
            background: transparent;
            color: white;
            border: 2px solid white;
            padding: 8px 16px;
            border-radius: 4px;
            font-weight: 600;
            font-size: 0.85rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.3s ease;
            text-shadow: 0 1px 2px rgba(0,0,0,0.3);
        }

        .btn-promotional:hover {
            background: white;
            color: var(--primary-color);
            text-shadow: none;
        }
        
        /* Popular Products Section */
        .popular-products-section {
            background: white;
            padding: 25px 0;
        }

        /* Horizontal Products Section - dimensions ajustées */
        .horizontal-products {
            background: #ffffffff;
            border-radius: 8px;
            padding: 18px;
            margin-top: 0px;
            width: 100%;
            
            max-width: 1700px;
            margin-left: auto;
            margin-right: auto;
        }
        
.horizontal-products-title {
    font-size: 1.3rem;
    font-weight: 700;
    color:  #000000ff;
    margin-top: -15px;
    
}
        
        .carousel-container {
            position: relative;
            display: flex;
            align-items: center;
            overflow: visible;
            padding: 0 40px;
        }

        .horizontal-products-carousel {
            display: flex;
            gap: 10px;
            overflow-x: auto;
            scroll-behavior: smooth;
            scrollbar-width: none;
            -ms-overflow-style: none;
            padding: 10px 0;
        }

        .horizontal-products-carousel::-webkit-scrollbar {
            display: none;
        }

        .horizontal-product-card {
            flex: 0 0 180px;
            background: white;
            border-radius: 6px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .carousel-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: var(--primary-color); 
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 10;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }

        .carousel-btn:hover {
            background: var(--secondary-color);
            transform: translateY(-50%) scale(1.1);
        }

        .carousel-prev {
            left: -20px;
            color: white;
        }

        .carousel-next {
            right: -20px;
            color: white;
        }
        
        .horizontal-product-card {
            background: white;
            border-radius: 6px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
        }
        
        .horizontal-product-card:hover {
            transform: translateY(-5px);
        }

        .horizontal-product-card:hover .product-actions {
            opacity: 1;
            transform: translateX(0);
        }
        
        .horizontal-product-image {
            height: 220px;
            background: #f8f9fa;
            overflow: hidden;
        }
        
        .horizontal-product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .horizontal-product-card:hover .horizontal-product-image img {
            transform: scale(1.08);
        }
        
        .horizontal-product-info {
            padding: 10px;
        }
        
        .horizontal-product-name {
            font-size: 0.78rem;
            font-weight: 600;
            margin-bottom: 5px;
            color: #002547;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            line-height: 1.3;
            min-height: 34px;
        }
        
        .horizontal-product-price {
            font-size: 0.9rem;
            font-weight: 700;
            color: var(--primary-color);
        }
        
        /* ===== CATEGORY CARDS WITH IMAGES ===== */
        .category-showcase {
            background: white;
        }
        
        /* Large Banner ajusté */
        .category-banner {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            height: 260px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            padding: 30px;
            margin-bottom: 18px;
            background-size: cover;
            background-position: center;
            transition: all 0.3s ease;
        }
        
        
        
        .category-banner-content {
            position: relative;
            z-index: 2;
            max-width: 450px;
        }
        
        .category-banner-content h5 {
           
            color: #2b2a2aff;
        }
        
        .category-banner-content p {
            font-size: 0.9rem;
            margin-bottom: 12px;
            color: rgb(0 0 0 / 90%);
        }
        
        .btn-category {
            background: #080808ff;   
            color: #ffffffff;
            padding: 7px 20px;
            border:  ;
            border-radius: 4px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.3s ease;
        }
        
        .btn-category:hover {
            background: #000000ff;
            color: #e0b83f;
            
        }
        
        /* Small Category Cards - dimensions ajustées */
        .small-category-card {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            height: 240px;
            width: 260px;
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: flex-end;
            padding: 18px;
            transition: all 0.3s ease;
        }
        
        
        
        .small-category-content {
            position: relative;
            z-index: 2;
            width: 100%;
        }

        a.small-category-card {
            text-decoration: none;
            color: inherit;
        }

        a.small-category-card p {
            text-decoration: none;
            color: #ffffff;
        }
        
        
        
        .small-category-link {
            color:  #000000;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.85rem;
        }
        
        .small-category-link:hover {
            color: #e0b83f;
            border-color: #e0b83f;
        }
        
        /* Overlay gradients */
        .small-category-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 1;
        }
        
        /* ===== SECTION PRODUITS PHARES ===== */
        .products-section {
            background: #ffffffff;
        }

        .products-section .section-header {
            text-align: left;
            margin-bottom: 35px;
        }

        .section-header {
            text-align: center;
            margin-bottom: 35px;
        }
        
        .section-title {
            font-size: 1.7rem;
            font-weight: 700;
            color: #000000ff;
            margin-bottom: 6px;
        }
        
        .product-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 18px;
        }
        
        .product-card {
            background: white;
          
            border-radius: 6px;
            overflow: hidden;
            transition: all 0.3s ease;
            position: relative;
            box-shadow: 0 3px 10px rgba(117, 117, 117, 0.05);
        }
        
        .product-card:hover {
            transform: translateY(-5px);
        }
        
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
        
        /* Image de produit ajustée */
        .product-image {
            position: relative;
            height: 200px;
            overflow: hidden;
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
            background: var(--primary-color);
            color: white;
            transform: scale(1.1);
        }
        
        .product-info {
            padding: 14px;
        }
        
        .product-category {
            font-size: 0.68rem;
            color: var(--text-light);
            text-transform: uppercase;
            letter-spacing: 0.4px;
            margin-bottom: 4px;
        }
        
        .product-name {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 7px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            line-height: 1.3;
            min-height: 36px;
        }
       
        .product-price {
            font-size: 1rem;
            font-weight: 700;
            color: #000000;
            margin-bottom: 8px;
        }
        
        .old-price {
            font-size: 0.8rem;
            color: var(--text-light);
            text-decoration: line-through;
            margin-left: 5px;
            font-weight: 400;
        }
        
        .btn-add-cart {
            width: 100%;
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 8px;
            border-radius: 4px;
            font-weight: 600;
            font-size: 0.8rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }
        
        .btn-add-cart:hover {
            background: var(--secondary-color);
            color: var(--primary-color);
        }

        .btn-add-cart-link {
            width: 100%;
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 8px;
            border-radius: 4px;
            font-weight: 600;
            font-size: 0.8rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            text-decoration: none;
        }

.btn-add-cart-link:hover {
            background: var(--secondary-color);
            color: var(--primary-color);
            text-decoration: none;
        }

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

        .horizontal-product-link {
            color: var(--primary-color);

            text-decoration: none;
            font-weight: 500;
            font-size: 0.85rem;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .horizontal-product-link:hover {
            color: var(--primary-color);
        }

        .product-link {
            color: var(--text-dark);
            text-decoration: none;
            cursor: pointer;
        }

        .product-link:hover {
            color: var(--text-dark);
            text-decoration: none;
        }
        
        /* ===== PROMOTIONAL GRID ===== */
        .promo-grid {
            background: white;
        }
        
        .promo-card-large {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            height: 300px;
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            padding: 30px;
            margin-bottom: 0;
        }
        
        .promo-card-large::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
          
            z-index: 1;
        }
        
        .promo-content {
            position: relative;
            z-index: 2;
            color: #333333ff;
            max-width: 450px;
        }
        
        .promo-badge {
            background: var(--accent-color);
            color: white;
            padding: 4px 10px;
            border-radius: 15px;
            font-size: 0.65rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 10px;
            text-transform: uppercase;
        }
        
        .promo-content h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 8px;
        }
        
        .promo-content p {
            font-size: 0.9rem;
            margin-bottom: 12px;
            opacity: 0.95;
        }



/* ===== CARACTERISTIQUES ET AVANTAGES ===== */
.features-section {
    background: white;
    padding: 40px 0;
}

.features-section .section-header {
    text-align: center;
    margin-bottom: 45px;
}

.features-section .section-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 10px;
}

.features-section .section-subtitle {
    font-size: 1rem;
    color: var(--text-light);
    max-width: 700px;
    margin: 0 auto 25px;
    line-height: 1.6;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}

.feature-card {
    background: white;
    border-radius: 8px;
    padding: 25px 20px;
    text-align: center;
    transition: all 0.3s ease;
    border: 1px solid var(--border-color);
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.feature-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    border-color: var(--secondary-color);
}

.feature-icon {
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg, var(--primary-color), #1a2f5a);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
    transition: all 0.3s ease;
}

.feature-card:hover .feature-icon {
    background: linear-gradient(135deg, var(--secondary-color), #e8c64a);
    transform: scale(1.1);
}

.feature-icon svg {
    width: 30px;
    height: 30px;
    color: white;
}

.feature-card h3 {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 12px;
    line-height: 1.3;
}

.feature-card p {
    font-size: 0.85rem;
    color: var(--text-light);
    line-height: 1.5;
    margin: 0;
    flex-grow: 1;
}

.feature-badge {
    background: var(--accent-color);
    color: white;
    padding: 4px 12px;
    border-radius: 15px;
    font-size: 0.65rem;
    font-weight: 600;
    margin-top: 15px;
    display: inline-block;
}


/* ===== SECTION PARTENAIRES ===== */
.partners-section {
    background: white;
    border-top: 1px solid var(--border-color);
    border-bottom: 1px solid var(--border-color);
}

.partner-card {
    background: white;
    border-radius: 8px;
    padding: 20px;
    height: 120px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    border: 1px solid var(--border-color);
    box-shadow: 0 3px 10px rgba(0,0,0,0.03);
}



.partner-card img {
    max-width: 100%;
    max-height: 60px;
    object-fit: contain;
    filter: none;
    opacity: 1;
    transition: all 0.3s ease;
}

.partner-card:hover img {
    filter: grayscale(0%);
    opacity: 1;
    transform: scale(1.05);
}

.hello{

    color: #e0b83f;
}

/* ===== DESCRIPTION BOUTIQUE ===== */
#more-description {
    display: none;
}

#more-description p {
    margin-bottom: 10px;
}

#more-description h5 {
    color: var(--primary-color);
    margin-top: 20px;
    margin-bottom: 15px;
    font-weight: 600;
}

#toggle-button-nad {
    color: var(--primary-color);
    text-decoration: underline;
    cursor: pointer;
    font-weight: 600;
}

#toggle-button-nad:hover {
    color: var(--secondary-color);
}

/* Media queries pour les partenaires */
@media (max-width: 768px) {
    .partner-card {
        height: 100px;
        padding: 15px;
    }
    
    .partner-card img {
        max-height: 50px;
    }
}

@media (max-width: 576px) {
    .partners-section {
        padding: 30px 0;
    }
    
    .partner-card {
        height: 90px;
        padding: 12px;
    }
    
    .partner-card img {
        max-height: 40px;
    }
}




        
        /* ===== RESPONSIVE ===== */
        @media (max-width: 1800px) {
            .container {
                max-width: 1500px !important;
            }
        }
        
        @media (max-width: 1600px) {
            .container {
                max-width: 1400px !important;
            }
        }
        
        @media (max-width: 1500px) {
            .container {
                max-width: 1300px !important;
            }
        }
        
        @media (max-width: 1400px) {
            .container {
                max-width: 1250px !important;
            }
        }
        
        @media (max-width: 1300px) {
            .container {
                max-width: 1150px !important;
            }
            
            .horizontal-products-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }
        
        @media (max-width: 1200px) {
            .container {
                max-width: 100% !important;
                padding-left: 20px;
                padding-right: 20px;
            }
            
            .split-container {
                grid-template-columns: 2fr 1fr;
            }
            
            .hero-carousel {
                height: 350px;
            }
            
            .horizontal-products-grid {
                grid-template-columns: repeat(4, 1fr);
            }
            
            .category-banner {
                height: 230px;
                padding: 25px;
            }
            
            .small-category-card {
                height: 220px;
            }
        }
    
        @media (max-width: 1100px) {
            .horizontal-products-grid {
                grid-template-columns: repeat(3, 1fr);
            }
            
            .product-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            }
        }
        
        @media (max-width: 992px) {
            .split-container {
                grid-template-columns: 1fr;
            }
            
            .hero-carousel {
                height: 320px;
            }
            
            .featured-product-card {
                display: flex;
                flex-direction: row;
            }
            
            .featured-product-image {
                width: 40%;
                height: 180px;
            }
            
            .featured-product-info {
                width: 60%;
                padding: 15px;
            }
            
            .horizontal-products-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 12px;
            }
            
            .category-banner {
                height: 200px;
                padding: 20px;
            }
            
            .small-category-card {
                height: 180px;
            }
        }
        
        @media (max-width: 768px) {
            .container {
                padding-left: 15px;
                padding-right: 15px;
            }
            
            .hero-carousel {
                height: 280px;
            }
            
            .carousel-content {
                padding: 20px;
            }
            
            .carousel-content h1 {
                font-size: 1.6rem;
            }
            
            .featured-product-card {
                flex-direction: column;
            }
            
            .featured-product-image,
            .featured-product-info {
                width: 100%;
            }
            
            .featured-product-image {
                height: 160px;
            }
            
            .horizontal-products-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .product-grid {
                grid-template-columns: repeat(auto-fill, minmax(170px, 1fr));
                gap: 15px;
            }
            
            .section-title {
                font-size: 1.4rem;
            }
            
            .promo-card-large {
                height: 250px;
                padding: 20px;
            }
            
            .promo-content h3 {
                font-size: 1.3rem;
            }
        }
        
        @media (max-width: 576px) {
            .hero-split-section {
                padding-top: 20px;
                
            }
            
            .hero-carousel {
                height: 240px;
            }
            
            .carousel-content h1 {
                font-size: 1.4rem;
            }
            
            .carousel-content p {
                font-size: 0.9rem;
                margin-bottom: 15px;
            }
            
            .horizontal-products {
                padding: 15px;
            }

            .horizontal-product-card {
                flex: 0 0 160px;
            }

            .carousel-btn {
                width: 35px;
                height: 35px;
            }

            .carousel-prev {
                left: -15px;
            }

            .carousel-next {
                right: -15px;
            }
            
            .product-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 12px;
            }
            
            .product-image {
                height: 160px;
            }
            
            .promo-card-large {
                height: 200px;
                padding: 15px;
            }
            
            .promo-content h3 {
                font-size: 1.2rem;
            }
            
            .category-banner {
                height: 180px;
                padding: 15px;
            }
            
            .small-category-card {
                height: 150px;
                padding: 12px;
            }
            
            .small-category-content h4 {
                font-size: 1rem;
            }
        }
        
        @media (max-width: 480px) {
            .container {
                padding-left: 10px;
                padding-right: 10px;
            }
            
            .product-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }
        }
        @media (max-width: 992px) {
            .features-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }
            
            .feature-card {
                padding: 20px 15px;
            }
        }
        
        @media (max-width: 576px) {
            .features-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }
            
            .features-section .section-title {
                font-size: 1.5rem;
            }
            
            .feature-icon {
                width: 60px;
                height: 60px;
            }
            
            .feature-icon svg {
                width: 25px;
                height: 25px;
            }
        }

.prix{

color: #e9e9e9;

}

.pri{color: #00000085;}

/* ===== BANDE PUBLICITAIRE (ANNOUNCEMENT BAR) ===== */
.announcement-bar {
    background: #01011aea;
    color: #ffffff;
    padding: 13px 0;
    overflow: hidden;
    position: relative;
    width: 100%;
    z-index: 1000;
    
}

.announcement-bar-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    max-width: 1680px;
    margin: 0 auto;
    padding: 0 25px;
    gap: 20px;
}

.announcement-marquee-wrapper {
    flex: 1;
    overflow: hidden;
    position: relative;
}

.announcement-marquee {
    display: flex;
    white-space: nowrap;
    animation: marquee-scroll 60s linear infinite;
    width: max-content;
}



.announcement-track {
    display: inline-flex;
    align-items: center;
    gap: 50px;
    padding-right: 50px;
}

.announcement-item {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-size: 0.95rem;
    font-weight: 600;
    letter-spacing: 0.4px;
    white-space: nowrap;
    text-transform: uppercase;
}

.announcement-item i {
    color: var(--secondary-color);
    font-size: 0.9rem;
}

.announcement-item a {
    color: var(--secondary-color);
    text-decoration: none;
    font-weight: 800;
    transition: opacity 0.2s;
    text-transform: uppercase;
}

.announcement-item a:hover {
    opacity: 0.8;
    text-decoration: underline;
}

.announcement-separator {
    color: var(--secondary-color);
    font-size: 1rem;
    opacity: 0.7;
    font-weight: 700;
}

.announcement-side {
    display: flex;
    align-items: center;
    gap: 20px;
    flex-shrink: 0;
    font-size: 0.95rem;
}

.announcement-phone {
    display: flex;
    align-items: center;
    gap: 7px;
    color: #ffffff;
    text-decoration: none;
    font-weight: 700;
    font-size: 0.95rem;
    transition: color 0.2s;
    text-transform: uppercase;
}

.announcement-phone:hover {
    color: var(--secondary-color);
}

.announcement-phone i {
    color: var(--secondary-color);
    font-size: 1rem;
}

.announcement-close {
    background: none;
    border: none;
    color: rgba(255,255,255,0.5);
    cursor: pointer;
    font-size: 1rem;
    padding: 0;
    line-height: 1;
    transition: color 0.2s;
    flex-shrink: 0;
}

.announcement-close:hover {
    color: #ffffff;
}

@keyframes marquee-scroll {
    0%   { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}

@media (max-width: 768px) {
    .announcement-bar {
        padding: 10px 0;
    }
    .announcement-side {
        display: none;
    }
    .announcement-item {
        font-size: 0.82rem;
    }
}


    </style>
    
    <title>2NCORPORATE - Équipements Électriques Professionnels</title>
</head>

<body>

  <!-- ===== BANDE PUBLICITAIRE ===== -->
    <div class="announcement-bar" id="announcementBar">
        <div class="announcement-bar-inner">
            <!-- Texte défilant -->
            <div class="announcement-marquee-wrapper">
                <div class="announcement-marquee">
                    <!-- Track 1 -->
                    <div class="announcement-track">
                        <span class="announcement-item"><i class="fas fa-bolt"></i> Livraison rapide à Douala &amp; Yaoundé</span>
                        <span class="announcement-separator"></span>
                        <span class="announcement-item"><i class="fas fa-tag"></i> Jusqu'à -30% sur les équipements — Offre limitée</span>
                        <span class="announcement-separator"></span>
                        <span class="announcement-item"><i class="fas fa-shield-alt"></i> Garantie sur tous nos produits</span>
                        <span class="announcement-separator"></span>
                        <span class="announcement-item"><i class="fas fa-headset"></i> Support technique disponible 6j/7</span>
                        <span class="announcement-separator"></span>
                        <span class="announcement-item">Installation incluse sur certains équipements — </span>
                        <span class="announcement-separator"></span>
                    </div>
                    <!-- Track 2 — copie exacte pour boucle fluide -->
                    <div class="announcement-track">
                        <span class="announcement-item"><i class="fas fa-bolt"></i> Livraison rapide à Douala &amp; Yaoundé</span>
                        <span class="announcement-separator"></span>
                        <span class="announcement-item"><i class="fas fa-tag"></i> Jusqu'à -30% sur les équipements — Offre limitée</span>
                        <span class="announcement-separator"></span>
                        <span class="announcement-item"><i class="fas fa-shield-alt"></i> Garantie constructeur sur tous nos produits</span>
                        <span class="announcement-separator"></span>
                        <span class="announcement-item"><i class="fas fa-headset"></i> Support technique disponible 6j/7</span>
                        <span class="announcement-separator"></span>
                        <span class="announcement-item"><i class="fas fa-truck"></i> Installation incluse sur certains équipements </span>
                        <span class="announcement-separator"></span>
                    </div>
                </div>
            </div>

            <!-- Côté droit : téléphone + fermer -->
            <div class="announcement-side">
                <a href="tel:+237600000000" class="announcement-phone">
                    <i class="fas fa-phone"></i> +237 691 102 395
                </a>
            </div>
            <button class="announcement-close" onclick="document.getElementById('announcementBar').style.display='none'" title="Fermer">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <!-- ===== FIN BANDE PUBLICITAIRE ===== -->
    

    
    @include('header', ['souscategories' => $souscategories])

    <!-- Hero Split Section -->
    <section class="hero-split-section">
        <div class="container">
            <!-- Split Layout: Carousel + Featured Product -->
            <div class="split-container">
                <!-- Carousel Left Side -->
                <div class="hero-carousel" data-aos="fade-right">
                    <div class="carousel-container-slides">
                        <div class="carousel-slide active" style="background: url('{{ asset('img/Gemini_Generated_Image_4pcrj54pcrj54pcr.png') }}') center/cover;  ">
                            <div class="carousel-content">
                                <h1 style="color: #1d1d1d;"> L'Elite Automobile </h1>
                                   <h5 style="color: #1d1d1d;" class="prix">Découvrez nos Pieces </h6>
                                   <h5 style="color: #1d1d1d;" class="prix">& Accessoires Automobile</h6>
                                
                                 <a href="{{ url('/produitcate/11/Automobile') }}" class="btn-carousel">
                                    Voir nos produits <i class="fas fa-arrow-right"></i>
                                 </a>
                              </div>
                            </div>
                            
                            
                            <div class="carousel-slide" style="background: url('{{ asset('img/Gemini_Generated_Image_4ff6ot4ff6ot4ff6.png') }}') center/cover;">
                               <div class="carousel-content">
                                   <h1 style="color: #202020;"> Boîtes à clés </h1>
                                 <h5 style="color: #202020;" class="prix">  Sécurisée</h5>
                                 <a href="{{ url('/detailprod/188') }}" class="btn-carousel">
                                     24.500 FCFA  <i class="fas fa-arrow-right"></i>
                                 </a>
                                </div>
                            </div>
                            
                               <div class="carousel-slide" style="background: url('{{ asset('img/Gemini_Generated_Image_t0n5kht0n5kht0n5.png') }}') center/cover;">
                            <div class="carousel-content">
                                <h1 style="color:black;">Grille pain Philips</h1>
                                <h5 style="color: #1f1f1f;" class="prix"> 2Tranches </h5>
                                
                                <a href="{{ url('/detailprod/187') }}" class="btn-carousel">
                                    28 000 FCFA <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                         </div>
                            
                            <div class="carousel-slide" style="background: url('{{ asset('img/ChatGPT Image 11 févr. 2026, 10_22_06.png') }}') center/cover;">
                               <div class="carousel-content">
                                   <h1 style="color: #1d1d1d;"> Pompes Submersible </h1>
                                     
                                     <h5 style="color: #018328;" class="prix">Disponible</h5>
                                <h5 style="color: #020202;" class="prix">En Gamme de produits</h5>
                                <br>
                                 <a href="{{ url('/produits?search=pompe+submersible') }}" class="btn-carousel">
                                    Voir nos produits <i class="fas fa-arrow-right"></i>
                                 </a>
                                </div>
                            </div>
                            

                         <div class="carousel-slide" style="background: url('{{ asset('img/ChatGPT Image 17 févr. 2026, 10_45_38.png') }}') center/cover;">
                            <div class="carousel-content">
                                <h1 style="color:black;">Pince pour filtre a huile</h1>
                                <h2 style="color: #d6b213;" class="prix">8.500 FCFA</h2>
                                <del class="pri">12.750 FCFA</del><br><br>
                                <a href="{{ url('detailprod/156') }}" class="btn-carousel">
                                    8.500 FCFA <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>

                         <div class="carousel-slide" style="background: url('{{ asset('img/Gemini_Generated_Image_l5i5y2l5i5y2l5i5.png') }}') center/cover;">
                            <div class="carousel-content">
                                <h1 style="color:black;">ATS 2P & 4P</h1>
                                <h5 style="color: #08b13b;" class="prix">Disponible</h5>
                                <h5 style="color: #1b1b1b;" class="prix">en Gamme de produits</h5>
                                <a href="{{ url('/produits?search=ATS') }}" class="btn-carousel">
                                    Voir les produits <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                         </div>


                        <div class="carousel-slide" style="background: url('{{ asset('img/Gemini_Generated_Image_o68siao68siao68s.png') }}') center/cover;">
                            <div class="carousel-content">
                                <h1 style="color:black;">Haut Parleur Intelligent</h1>
                                <h2 style="color: #d6b213;" class="prix">120.000 FCFA</h2>
                                <del class="pri">180.000 FCFA</del><br><br>
                                <a href="{{ url('/detailprod/92') }}" class="btn-carousel">
                                    120.000 FCFA <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>

                        <div class="carousel-slide" style="background: url('{{ asset('img/Gemini_Generated_Image_wpbdc1wpbdc1wpbd.png') }}') center/cover;">
                            <div class="carousel-content">
                                <h1 style="color: #0c0c0c;">Boite a outils</h1>
                                
                                <a href="{{ url('/produits?search=boite') }}" class="btn-carousel">
                                   Voir les produits <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>

                       
                        
                        <div class="carousel-slide" style="background: url('{{ asset('img/Gemini_Generated_Image_f1ldzvf1ldzvf1ld.png') }}') center/cover;">
                            <div class="carousel-content">
                                <h1 style="color: #ffffff;">Débroussailleuse Professionnelle</h1>
                                  <h2 style="color: #d6b213;" class="prix">98 000 FCFA</h2>
                                  <del class="pri"style="color: #000000;">104 260 FCFA</del><br><br>
                                <a href="{{ url('/detailprod/148') }}" class="btn-carousel">
                                    98 000 FCFA <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>

        
                        
                        <div class="carousel-slide" style="background: url('{{ asset('img/Gemini_Generated_Image_9ptop39ptop39pto.png') }}') center/cover;">
                            <div class="carousel-content">
                                <h1 style="color:black;"> Camera IP bullet </h1>
                              
                                <a href="{{ url('/detailprod/39') }}" class="btn-carousel">
                                    13 875 FCFA <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="carousel-slide" style="background: url('{{ asset('img/Gemini_Generated_Image_97koj297koj297ko.png') }}') center/cover;">
                            <div class="carousel-content">
                                <h1 style="color: #ffffff;"> Générateur Diesel </h1>
                                <h4 style="color: #ffffff;"> NUT 20KVA </h4>
                                <h4 style="color: #d6b213;" class="prix">5 213 750 FCFA</h4>
                                <a href="{{ url('/detailprod/1') }}" class="btn-carousel">
                                    5 213 750 FCFA <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-controls">
                        <button class="carousel-arrow carousel-prev" id="carousel-prev">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="carousel-arrow carousel-next" id="carousel-next">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Promotional Cards Right Side -->
                <div class="promotional-cards-side"style="font-family: 'Times New Roman';">
                    <div class="promotional-card" data-aos="fade-left" data-aos-delay="100">
                        <div class="promotional-image" style="background-image: url('{{ asset('img/Gemini_Generated_Image_6sh7vd6sh7vd6sh7.png') }}');">
                            <div class="promotional-overlay">
                                <h4 class="promotional-title">  XBOX 360GO  </h4>
                                <a href="/detailprod/146" class="btn-promotional">
                                   Commander <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="promotional-card" data-aos="fade-left" data-aos-delay="200">
                        <div class="promotional-image" style="background-image: url('{{ asset('img/75b8ef186ad5bd4349678ddc2127aa1762d46da5.jpg') }}');">
                            <div class="promotional-overlay">
                                <h4 style="color: #ffffff;" class="promotional-title">Nouveautés</h4>
                                <a href="/produitcate/11/Automobile" class="btn-promotional">
                                    Voir les produits <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Popular Products Section - Version horizontale améliorée -->
<section class="popular-products-section">
    <div class="container">

<!-- Small Category Cards Grid -->

            <div class= "row">
                <h2 class="horizontal-products-title" style="color: #042457; font-family: 'Times New Roman';">Meilleurs Pieces & Accessoires Automobile</h2>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                    <a href="/detailprod/179" class="small-category-card" style="background-image: url('{{ asset('img/mercedes-motor-rail-kutugu-6420703395-motor-parcalari-mercedes-4028-43-B.jpg') }}');">
                        <div class="small-category-content">
                            <p style="color: #302f2f; font-size: 0.92rem; font-weight: 700; margin-bottom: 5px; text-shadow: 0 2px 4px rgb(255, 255, 255); line-height: 1.3;">
                                Rampe d'injection de carburant
                            </p>
                            <span class="small-category-link" style="text-shadow: 0 0px 0px rgb(255, 255, 255);">
                               229200 FCFA
                            </span>
                        </div>
                    </a>
                </div>

                <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                    <a href="/detailprod/168" class="small-category-card" style="background-image: url('{{ asset('img/h-preview (6).jpg') }}');">
                        <div class="small-category-content">
                            <p style="color: #000000; font-size: 0.92rem; font-weight: 700; margin-bottom: 5px; text-shadow: 0 2px 4px rgb(255, 255, 255); line-height: 1.3;">
                                
                            Filtre à air moteur
                            </p>
                            <span class="small-category-link" style="text-shadow: 0 0px 0px rgba(0,0,0,0.5);">
                               27.000 FCFA
                            </span>
                        </div>
                    </a>
                </div>

                <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                    <a href="/detailprod/180" class="small-category-card" style="background-image: url('{{ asset('img/RIDEX v-ribbed belt 305p0241.jpg') }}');">
                        <div class="small-category-content">
                            <p style="color: #000000; font-size: 0.92rem; font-weight: 700; margin-bottom: 5px; text-shadow: 0 2px 4px rgb(255, 255, 255); line-height: 1.3;">
                               
                            Courroie RIDEX 305P0070  
                            </p>
                            <span class="small-category-link" style="text-shadow: 0 0px 0px rgba(0,0,0,0.5);">
                               8847 FCFA
                           </span>
                        </div>
                    </a>
                </div>

                <div class="col-md-3" data-aos="fade-up" data-aos-delay="400">
                    <a href="/detailprod/183" class="small-category-card" style="background-image: url('{{ asset('img/070020046-1.jpg') }}');">
                        <div class="small-category-content">
                            <p style="color: #000000; font-size: 0.92rem; font-weight: 700; margin-bottom: 5px; text-shadow: 0 2px 4px rgba(255, 255, 255, 0.98); line-height: 1.3;">
                              Essuie-glace RIDEX 298W0136
                            </p>
                            <span class="small-category-link" style="text-shadow: 0 0px 0px rgba(0,0,0,0.5);">
                              4.000 FCFA
                            </span>
                        </div>
                    </a>
                </div>
            </div>

    
        <div class="horizontal-products" data-aos="fade-up">
            <h3 class="horizontal-products-title" style="color: #042457; font-family: 'Times New Roman';">Les Incontournables</h3>
            
            <div class="carousel-container">
                <button class="carousel-btn carousel-prev" id="prevBtn">
                    <i class="fas fa-chevron-left"></i>
                </button>
                
                <div class="horizontal-products-carousel" id="productsCarousel">
                    @foreach ($produits->shuffle()->take(12) as $product)
                    <div class="product-card" style="flex: 0 0 220px; margin: 0 10px;">
                        @if($product->created_at->gt(now()->subDays(7)))
                            <span class="product-badge badge-new">Nouveau</span>
                        @elseif($product->discount)
                            <span class="product-badge badge-sale">-{{ $product->discount }}%</span>
                        @elseif($product->qttestock < 5 && $product->qttestock > 0)
                            <span class="product-badge badge-limited">Stock limité</span>
        @endif

        @php
            $isOccasionOnly = in_array($product->libelle, ['CLIMATISEURS WHIRLPOOL', 'CLIMATISEURS UP LIVE-MIDEA']);
            $detailUrl = $isOccasionOnly ? "/detailprod/{{ $product->id }}?etat=occasion" : "/detailprod/{{ $product->id }}";
            $displayPrice = $isOccasionOnly ? $product->prixbonetat : $product->prix;
        @endphp
        
        <div class="product-image" style="height: 180px;">
                            <a href="/detailprod/{{ $product->id }}">
                                @if(count($product->images))
                                    <img src="{{ asset('photos/' . urlencode($product->images[0]->nom)) }}" alt="{{ $product->libelle }}">
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
                            <div class="product-category">{{ $product->categorie->nomCat ?? 'APPAREILS' }}</div>
                            <h3 class="product-name">
                                <a href="/detailprod/{{ $product->id }}" style="text-decoration: none; color: inherit;">
                                    {{ Str::limit($product->libelle, 40) }}
                                </a>
                            </h3>
                            <div class="product-price">
                                {{ number_format($product->prix, 0, ',', ' ') }} FCFA
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
                            <a href="#" onclick="addToCart({{ $product->id }}); return false;" class="horizontal-product-link">
                                <i class="fas fa-shopping-cart"></i> Ajoutez au panier
                            </a>
                        </div>
                    </div>
                    @endforeach

                </div>
                
                <button class="carousel-btn carousel-next" id="nextBtn">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
        
    </div>
    
</section>

    <!-- Large Category Banner -->
    <section class="category-showcase">
        <div class="container">
            <div class="category-banner" style="background-image: url('{{ asset('photos/Gemini_Generated_Image_u85kpwu85kpwu85k.png') }}');" >
                <div class="category-banner-content">
                    <h5 style="color: #042457; font-family: 'Times New Roman';">MEULEUSE BOSCH SUR BATTERIE ADVANCED GRIND 18</h5>
                    <p>Équipez votre cuisine avec nos mélangeurs haute performance</p>
                    <a href="{{ url('detailprod/108') }}" class="btn-category">
                        125.000 FCFA <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

<!-- Video Ads Section -->
    <section class="video-ads">
        <div class="container">
            <div class="row g-3">
                <div class="col-md-6" data-aos="fade-up">
                    <div class="video-wrapper">
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/pZHscrcMgqE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="promo-card-large" style="background-image: url('photos/ChatGPT Image 7 janv. 2026, 11_36_47.png');">
                        <div class="promo-content">
                            <span class="promo-badge">Réduction -0%</span>
                            <h4 style="color: #042457; font-family: 'Times New Roman';">Lecteur de diagnostic  </h4>
                           <h4 style="color: #042457; font-family: 'Times New Roman';"> automobile </h4>
                            <p>RECHARGE AUTOMATIQUE</p>
                            <a href="{{ url('detailprod/104') }}" class="btn-category">
                                195.000 FCFA<i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
           </div>
    </section><br><br>


    </section>


    <!-- Produits Phares -->
    <section class="products-section">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <h7 class="section-title" style="color: #042457; font-family: 'Times New Roman';">Équipements Vedettes</h7>
            </div>
            
            <div class="product-grid">
                @foreach ($produits->shuffle()->take(12) as $produit)
                <div class="product-card" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 4) * 50 }}">
                    @if($produit->created_at->gt(now()->subDays(7)))
                        <span class="product-badge badge-new">Nouveau</span>
                    @elseif($produit->discount)
                        <span class="product-badge badge-sale">-{{ $produit->discount }}%</span>
                    @elseif($produit->qttestock < 5 && $produit->qttestock > 0)
                        <span class="product-badge badge-limited">Stock limité</span>
                    @endif
                    
                    <div class="product-image">
                        <a href="/detailprod/{{ $produit->id }}">
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
                                @php
                                    $isOccasionOnlyVedettes = in_array($produit->libelle, ['CLIMATISEURS WHIRLPOOL', 'CLIMATISEURS UP LIVE-MIDEA']);
                                    $detailUrlVedettes = $isOccasionOnlyVedettes ? "/detailprod/{{ $produit->id }}?etat=occasion" : "/detailprod/{{ $produit->id }}";
                                @endphp
                                <a href="{{ $detailUrlVedettes }}" style="text-decoration: none; color: inherit;">
                                    {{ $produit->libelle }}
                                </a>
                            </h3>
                            <div class="product-price">
                                @php
                                    $displayPriceVedettes = $isOccasionOnlyVedettes ? $produit->prixbonetat : $produit->prix;
                                @endphp
                                {{ number_format($displayPriceVedettes, 0, ',', ' ') }} FCFA
                                @if($produit->discount)
                                    <span class="old-price">
                                        {{ number_format($produit->prix * (1 + $produit->discount/100), 0, ',', ' ') }} FCFA
                                    </span>
                                @endif
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
                            <a href="#" onclick="addToCart({{ $produit->id }}, '{{ $isOccasionOnlyVedettes ? 'occasion' : 'neuve' }}'); return false;" class="horizontal-product-link">
                                <i class="fas fa-shopping-cart"></i> Ajoutez au panier
                            </a>
                        </div>

                </div>
                @endforeach
            </div>
        </div>
    </section>

     <!-- More Products Section -->
    <section class="products-section" style="background: white; padding-top: 25px;">
        <div class="container">
            <div class="product-grid">
                @foreach ($produits->shuffle()->take(6) as $produit)
                <div class="product-card" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 50 }}">
                    <div class="product-image">
                        <a href="/detailprod/{{ $produit->id }}">
                            @if(count($produit->images))
                                <img src="{{ asset('photos/' . urlencode($produit->images[0]->nom)) }}" alt="{{ $produit->libelle }}">
                            @else
                                <img src="https://images.unsplash.com/photo-1588854337221-4cf94c57e400?q=80&w=400" alt="Produit">
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
                                    {{ $produit->libelle }}
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

            </div>
        </div>
    </section>

    <!-- Promotional Grid -->
    <section class="promo-grid">
        <div class="container">
            <div class="row g-3">
                <div class="col-md-6" data-aos="fade-up">
                    <div class="promo-card-large" style="background-image: url('{{ asset('img/492879_picture_1.webp') }}');">
                        <div class="promo-content">
                            <span class="promo-badge">Soldes du week-end 0%</span>
                            <h4 style="color: #042457; font-family: 'Times New Roman';">Pompe A Haute Pression </h4>
                            <p>WAGNER AIRLESS SPRAYER </p>
                            <a href="{{ url('detailprod/118') }}" class="btn-category">
                              Commander <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>  
                    </div>
                </div>

                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="promo-card-large" style="background-image: url('{{ asset('img/perforateur_dexter_power_dp4_800_w_80168371.jpg') }}');">
                        <div class="promo-content">
                            <span class="promo-badge">Réduction 0%</span>
                            <h4 style="color: #042457; font-family: 'Times New Roman';">Perforateur  </h4>
                          
                            <p>Dexter Power</p>
                            <a href="{{ url('detailprod/32') }}" class="btn-category">
                                14.000 FCFA<i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Description de la Boutique -->

<div class="m-md-5 mb-3">
    <div class="row justify-content-center">
        <div class="col-md-12 custom-font">
            <div class="card">
                <div class="card-body">
                    <div id="short-description">
                        <h3 style="font-size: 22px; font-family: 'Times New Roman';">Bienvenue chez <strong class="hello">2NCORPORATE SHOP</strong></h3><br>
                        <p class="card-text">
                            Votre partenaire de confiance pour tous vos besoins en équipements électriques et électroniques professionnels.
                            Découvrez notre sélection premium de groupes électrogènes, caméras de surveillance, téléphones,
                            outils électroportatifs, matériel électrique et bien plus encore. Des marques reconnues comme
                            Bosch, Samsung, Hikvision et Schneider pour une qualité garantie.
                        </p>
                        <a href="#" id="toggle-button-nad" style="color: var(--primary-color); text-decoration: underline;">
                            Voir plus
                        </a>
                    </div>

                    <div id="more-description">
                        <h5>Notre Expertise par Catégorie</h5>
                        <p><strong>Groupes Électrogènes & Générateurs :</strong> Solutions d'alimentation de secours fiables pour particuliers et professionnels.
                        Modèles diesel, essence et solaire adaptés à tous vos besoins énergétiques.</p>

                        <p><strong>Systèmes de Sécurité & Caméras :</strong> Protection complète de votre domicile ou entreprise avec nos caméras
                        Hikvision, DVR haute définition et systèmes de contrôle d'accès.</p>

                        <p><strong>Téléphonie & Communication :</strong> Smartphones dernière génération, téléphones classiques Nokia,
                        et équipements de réseau pour une connectivité optimale.</p>

                        <p><strong>Outils Électroportatifs :</strong> Marteaux piqueurs, perceuses, meuleuses Bosch et autres outils professionnels
                        pour vos travaux de construction, rénovation et bricolage.</p>

                        <p><strong>Électroménager & Luminaires :</strong> Appareils Hisense, Philips et Midea pour votre confort quotidien,
                        plus un large choix de luminaires solaires et électriques.</p>

                        <p><strong>Matériel Électrique & Outillage :</strong> Câbles, interrupteurs Schneider Electric, nettoyeurs haute pression
                        Kärcher et équipements industriels pour tous vos projets.</p><br>

                        <h5>Pourquoi Nous Choisir ?</h5>
                        <p><strong>Expertise Technique :</strong> Notre équipe de spécialistes vous conseille pour choisir l'équipement
                        adapté à vos besoins spécifiques, qu'il s'agisse de projets résidentiels ou industriels.</p>

                        <p><strong>Partenaires Premium :</strong> Nous travaillons exclusivement avec les meilleures marques internationales
                        pour vous garantir des produits durables et performants.</p>

                        <p><strong>Service Après-Vente :</strong> Installation, maintenance et support technique pour tous vos équipements,
                        avec des techniciens certifiés à votre service.</p>

                        <p><strong>Livraison & Installation :</strong> Service de livraison rapide dans tout le Cameroun,
                        avec possibilité d'installation sur site pour les équipements complexes.</p>

                        <br>
                        <strong style="color: red; font-size: 18px;">
                            Que vous soyez un particulier, un entrepreneur ou une entreprise, 2NCORPORATE SHOP est votre
                            partenaire idéal pour tous vos besoins en équipements électriques et électroniques.
                            Découvrez notre catalogue et bénéficiez de notre expertise !
                        </strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

       <!-- Section Logos Partenaires -->
    <section class="partners-section" style="background: #f8f9fa; padding: 40px 0;">
        <div class="container">
            <div class="section-header text-center mb-5" data-aos="fade-up">
                <h2 class="section-title" style="color: #042457; font-family: 'Times New Roman';">Nos Partenaires</h2>
                <p class="section-subtitle" style="color: var(--text-light);">Nous collaborons avec les meilleures marques pour vous offrir des produits de qualité</p>
            </div>
            
            <div class="partners-grid" data-aos="fade-up" data-aos-delay="200">
                <div class="row g-4 justify-content-center">
                    <!-- Ligne 1 -->
                    <div class="col-6 col-md-3 col-lg-2 text-center">
                        <div class="partner-card">
                            <img src="{{ asset('img/hisense.jpeg') }}" alt="Hisense" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2 text-center">
                        <div class="partner-card">
                            <img src="{{ asset('img/lifan.jpeg') }}" alt="Lifan" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2 text-center">
                        <div class="partner-card">
                            <img src="{{ asset('img/Hikvision.jpeg') }}" alt="Hikvision" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2 text-center">
                        <div class="partner-card">
                            <img src="{{ asset('img/samsung.jpeg') }}" alt="Samsung" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2 text-center d-none d-md-block">
                        <div class="partner-card">
                            <img src="{{ asset('img/schneider.jpeg') }}" alt="Schneider Electric" class="img-fluid">
                        </div>
                    </div>
                    
                    <!-- Ligne 2 -->
                    <div class="col-6 col-md-3 col-lg-2 text-center">
                        <div class="partner-card">
                            <img src="{{ asset('img/motorola.jpeg') }}" alt="Motorola" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2 text-center">
                        <div class="partner-card">
                            <img src="{{ asset('img/signify-logo-philips-iluminacion-led-internet-cosas-400-200.png') }}" alt="Philips" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2 text-center">
                        <div class="partner-card">
                            <img src="{{ asset('img/Bosch.jpeg') }}" alt="Bosch" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2 text-center">
                        <div class="partner-card">
                            <img src="{{ asset('img/Karcher.jpeg') }}" alt="Kärcher" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2 text-center">
                        <div class="partner-card">
                            <img src="{{ asset('img/midea.png') }}" alt="Midea" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('footer1')

    <!-- Scripts -->
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        // Initialisation AOS
        AOS.init({
            duration: 600,
            once: true,
            offset: 50
        });
        
        // Simple Carousel Functionality
        document.addEventListener('DOMContentLoaded', function() {
            const slides = document.querySelectorAll('.carousel-slide');
            const prevBtn = document.getElementById('carousel-prev');
            const nextBtn = document.getElementById('carousel-next');
            let currentSlide = 0;
            let autoScrollInterval;

            // Function to show slide
            function showSlide(index) {
                // Remove active class from all slides
                slides.forEach(slide => {
                    slide.classList.remove('active');
                    slide.classList.remove('leaving');
                });

                // Add leaving class to current slide
                if (slides[currentSlide]) {
                    slides[currentSlide].classList.add('leaving');
                }

                // Set new current slide
                currentSlide = index;

                // Add active class to new slide after a brief delay
                setTimeout(() => {
                    if (slides[currentSlide]) {
                        slides[currentSlide].classList.add('active');
                    }
                }, 100);
            }

            // Function to next slide
            function nextSlide() {
                const nextIndex = (currentSlide + 1) % slides.length;
                showSlide(nextIndex);
            }

            // Function to previous slide
            function prevSlide() {
                const prevIndex = (currentSlide - 1 + slides.length) % slides.length;
                showSlide(prevIndex);
            }

            // Arrow button click handlers
            if (prevBtn) {
                prevBtn.addEventListener('click', () => {
                    prevSlide();
                    resetAutoScroll();
                });
            }

            if (nextBtn) {
                nextBtn.addEventListener('click', () => {
                    nextSlide();
                    resetAutoScroll();
                });
            }

            // Auto-scroll function
            function startAutoScroll() {
                autoScrollInterval = setInterval(nextSlide, 4000); // Change slide every 4 seconds
            }

            function resetAutoScroll() {
                clearInterval(autoScrollInterval);
                startAutoScroll();
            }

            // Start auto-scrolling
            startAutoScroll();

            // Pause on hover
            const carousel = document.querySelector('.hero-carousel');
            carousel.addEventListener('mouseenter', () => {
                clearInterval(autoScrollInterval);
            });

            carousel.addEventListener('mouseleave', () => {
                startAutoScroll();
            });
        });
        
        // Gestion des boutons d'action
        document.querySelectorAll('.action-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const icon = this.querySelector('i');
                
                if (icon.classList.contains('fa-heart')) {
                    if (icon.classList.contains('far')) {
                        icon.classList.remove('far');
                        icon.classList.add('fas');
                        this.style.background = 'var(--accent-color)';
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
        
        // Ajout au panier
        function addToCart(productId, etat = 'neuve') {
            const link = event.target.closest('a');
            const originalHTML = link.innerHTML;

            link.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Ajout...';
            link.style.pointerEvents = 'none';

            const url = etat === 'occasion' ? `/addtocard1/${productId}/${etat}` : `/addtocard/${productId}`;

            fetch(url, {
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

                // Update cart sidebar immediately with the new data
                updateCartSidebarDirect(data);

                // Open cart sidebar to show instantly
                toggleCartSidebar();

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

        // Function to update cart sidebar directly with data from addToCart response
        function updateCartSidebarDirect(cartData) {
            const cartItems = document.querySelector('.cart-items');
            const cartTotal = document.querySelector('#sidebar-total');

            if (cartItems && cartData && cartData.cart) {
                const cart = cartData.cart;

                if (Object.keys(cart).length > 0) {
                    let html = '';
                    let total = 0;

                    Object.keys(cart).forEach(key => {
                        const item = cart[key];
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
                } else {
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
                }
            }
        }

        // Function to update cart sidebar (legacy function for compatibility)
        function updateCartSidebar() {
            updateCartSidebarDirect();
        }

        // Function to update cart sidebar directly with data from addToCart response
        function updateCartSidebarDirect(cartData) {
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

        document.querySelectorAll('.btn-add-cart').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const originalHTML = this.innerHTML;

                this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Ajout...';
                this.disabled = true;

                setTimeout(() => {
                    this.innerHTML = '<i class="fas fa-check"></i> Ajouté !';
                    this.style.background = '#28a745';

                    setTimeout(() => {
                        this.innerHTML = originalHTML;
                        this.style.background = '';
                        this.disabled = false;
                    }, 1500);
                }, 600);
            });
        });
        
        // Animation spinner
        const style = document.createElement('style');
        style.textContent = `
            @keyframes spin {
                to { transform: rotate(360deg); }
            }
            .fa-spinner {
                animation: spin 1s linear infinite;
            }
        `;
        document.head.appendChild(style);

        // Carousel functionality for popular products
        document.addEventListener('DOMContentLoaded', function() {
            const carousel = document.getElementById('productsCarousel');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');

            if (carousel && prevBtn && nextBtn) {
                const scrollAmount = 220; // Product card width + gap
                let autoScrollInterval;

                // Function to update button visibility
                function updateButtons() {
                    const maxScrollLeft = carousel.scrollWidth - carousel.clientWidth;
                    prevBtn.style.opacity = carousel.scrollLeft > 0 ? '1' : '0.5';
                    nextBtn.style.opacity = carousel.scrollLeft < maxScrollLeft ? '1' : '0.5';
                }

                // Function to scroll next
                function scrollNext() {
                    const maxScrollLeft = carousel.scrollWidth - carousel.clientWidth;
                    if (carousel.scrollLeft >= maxScrollLeft) {
                        // Reset to beginning if at end
                        carousel.scrollTo({
                            left: 0,
                            behavior: 'smooth'
                        });
                    } else {
                        carousel.scrollBy({
                            left: scrollAmount,
                            behavior: 'smooth'
                        });
                    }
                    setTimeout(updateButtons, 300);
                }

                // Next button click
                nextBtn.addEventListener('click', function() {
                    scrollNext();
                    resetAutoScroll();
                });

                // Previous button click
                prevBtn.addEventListener('click', function() {
                    carousel.scrollBy({
                        left: -scrollAmount,
                        behavior: 'smooth'
                    });
                    setTimeout(updateButtons, 300);
                    resetAutoScroll();
                });

                // Update buttons on scroll
                carousel.addEventListener('scroll', updateButtons);

                // Touch/swipe support for mobile
                let startX;
                let scrollLeft;

                carousel.addEventListener('touchstart', function(e) {
                    startX = e.touches[0].pageX - carousel.offsetLeft;
                    scrollLeft = carousel.scrollLeft;
                });

                carousel.addEventListener('touchmove', function(e) {
                    if (!startX) return;
                    e.preventDefault();
                    const x = e.touches[0].pageX - carousel.offsetLeft;
                    const walk = (x - startX) * 2;
                    carousel.scrollLeft = scrollLeft - walk;
                });

                carousel.addEventListener('touchend', function() {
                    startX = null;
                    updateButtons();
                    resetAutoScroll();
                });

                // Auto-scroll function
                function startAutoScroll() {
                    autoScrollInterval = setInterval(scrollNext, 2000); // Auto-scroll every 2 seconds (modifiez cette valeur pour changer la vitesse)
                }

                function resetAutoScroll() {
                    clearInterval(autoScrollInterval);
                    startAutoScroll();
                }

                // Start auto-scrolling
                startAutoScroll();

                // Pause on hover
                const carouselContainer = document.querySelector('.carousel-container');
                carouselContainer.addEventListener('mouseenter', () => {
                    clearInterval(autoScrollInterval);
                });

                carouselContainer.addEventListener('mouseleave', () => {
                    startAutoScroll();
                });

                // Initialize button states
                updateButtons();
            }
        });

        // Toggle "Voir plus" functionality
        $(document).ready(function() {
            // On s'assure que le contenu supplémentaire est caché au départ
            $('#more-description').hide();
            
            $('#toggle-button-nad').click(function(e) {
                e.preventDefault();
                var moreDescription = $('#more-description');
                if (moreDescription.is(':hidden')) {
                    moreDescription.slideDown(300);
                    $(this).text('Voir moins');
                } else {
                    moreDescription.slideUp(300);
                    $(this).text('Voir plus');
                }
            });
        });
    </script>
 
</body>
</html>