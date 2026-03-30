/**
 * Script principal pour le site de vente de produits électroniques 2NCORPORATE
 * Gère les interactions utilisateur comme le menu mobile, les témoignages, etc.
 */

// Attendre que le DOM soit chargé
document.addEventListener("DOMContentLoaded", function () {
    // Initialisation des différentes fonctionnalités
    initMobileMenu();
    initWishlistButtons();
    initPriceRangeSlider();
    initTestimonialSlider();
    initAddToCartButtons();
});

/**
 * Initialise le menu mobile
 */
function initMobileMenu() {
    const menuToggle = document.getElementById("menuToggle");
    const mobileMenu = document.getElementById("mobileMenu");

    if (!menuToggle || !mobileMenu) return;

    menuToggle.addEventListener("click", function () {
        menuToggle.classList.toggle("active");
        mobileMenu.classList.toggle("active");
    });
}

/**
 * Initialise les boutons de favoris sur les cartes produits
 */
function initWishlistButtons() {
    const wishlistButtons = document.querySelectorAll(".wishlist-button");

    wishlistButtons.forEach((button) => {
        button.addEventListener("click", function (e) {
            e.preventDefault();
            this.classList.toggle("active");

            // Changer le contenu du SVG pour montrer que le produit est en favoris
            const path = this.querySelector("path");
            if (this.classList.contains("active")) {
                path.setAttribute("fill", "currentColor");
            } else {
                path.setAttribute("fill", "none");
            }
        });
    });
}

/**
 * Initialise le slider de prix dans les filtres
 */
function initPriceRangeSlider() {
    const priceRange = document.getElementById("priceRange");
    const priceValue = document.getElementById("priceValue");

    if (!priceRange || !priceValue) return;

    // Afficher la valeur initiale
    priceValue.textContent = priceRange.value;

    // Mettre à jour la valeur quand le slider change
    priceRange.addEventListener("input", function () {
        priceValue.textContent = this.value;
    });
}

/**
 * Initialise le slider de témoignages
 */
function initTestimonialSlider() {
    const slides = document.querySelectorAll(".testimonial-slide");
    const dots = document.querySelectorAll(".dot");
    const prevButton = document.querySelector(".prev-testimonial");
    const nextButton = document.querySelector(".next-testimonial");

    if (slides.length === 0) return;

    let currentIndex = 0;

    // Fonction pour afficher un témoignage spécifique
    function showSlide(index) {
        if (index < 0) index = slides.length - 1;
        if (index >= slides.length) index = 0;

        // Masquer tous les slides et désactiver les dots
        slides.forEach((slide) => slide.classList.remove("active"));
        dots.forEach((dot) => dot.classList.remove("active"));

        // Afficher le slide actif et activer le dot correspondant
        slides[index].classList.add("active");
        dots[index].classList.add("active");

        currentIndex = index;
    }

    // Écouteurs d'événements pour les boutons et les dots
    if (prevButton) {
        prevButton.addEventListener("click", () => {
            showSlide(currentIndex - 1);
        });
    }

    if (nextButton) {
        nextButton.addEventListener("click", () => {
            showSlide(currentIndex + 1);
        });
    }

    dots.forEach((dot, index) => {
        dot.addEventListener("click", () => {
            showSlide(index);
        });
    });

    // Démarrer le slider automatique
    let interval = setInterval(() => {
        showSlide(currentIndex + 1);
    }, 5000);

    // Arrêter le slider automatique lorsque l'utilisateur interagit avec les témoignages
    const testimonialSlider = document.querySelector(".testimonial-slider");
    if (testimonialSlider) {
        testimonialSlider.addEventListener("mouseenter", () => {
            clearInterval(interval);
        });

        testimonialSlider.addEventListener("mouseleave", () => {
            interval = setInterval(() => {
                showSlide(currentIndex + 1);
            }, 5000);
        });
    }
}

/**
 * Initialise les boutons "Ajouter au panier"
 */
function initAddToCartButtons() {
    const addToCartButtons = document.querySelectorAll(".add-to-cart");
    const cartCount = document.querySelector(".cart-count");

    if (!cartCount) return;

    let count = 0;

    addToCartButtons.forEach((button) => {
        button.addEventListener("click", function () {
            count++;
            cartCount.textContent = count;

            // Animation de transition
            cartCount.animate(
                [
                    { transform: "scale(1)" },
                    { transform: "scale(1.3)" },
                    { transform: "scale(1)" },
                ],
                {
                    duration: 300,
                    easing: "ease-out",
                }
            );

            // Notification pour l'utilisateur (à améliorer avec un système de toast)
            const productName =
                this.closest(".product-card").querySelector("h3").textContent;
            console.log(`"${productName}" ajouté au panier !`);

            // Vous pourriez ajouter ici une notification visuelle (toast)
        });
    });
}
