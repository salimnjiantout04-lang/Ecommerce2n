// Header JavaScript functionality
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu functionality
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const navLinks = document.getElementById('navLinks');

    if (mobileMenuToggle && navLinks) {
        mobileMenuToggle.addEventListener('click', function() {
            navLinks.classList.toggle('active');
        });
    }

    const mobileMenuClose = document.getElementById('mobileMenuClose');
    const mobileMenu = document.getElementById('mobileMenu');

    if (mobileMenuClose && mobileMenu) {
        mobileMenuClose.addEventListener('click', function() {
            mobileMenu.classList.remove('active');
        });
    }

    // Mega menu functionality
    const catalogueMenu = document.getElementById('catalogueMenu');
    const catalogueDropdown = document.getElementById('catalogueDropdown');

    if (catalogueMenu && catalogueDropdown) {
        catalogueMenu.addEventListener('mouseenter', function() {
            catalogueDropdown.classList.add('active');
        });

        catalogueMenu.addEventListener('mouseleave', function() {
            catalogueDropdown.classList.remove('active');
        });
    }

    // Auth dropdown
    const authToggle = document.getElementById('authToggle');
    const authDropdown = document.getElementById('authDropdown');

    if (authToggle && authDropdown) {
        authToggle.addEventListener('click', function(e) {
            e.stopPropagation();
            authDropdown.classList.toggle('show');
        });
    }

    // Wishlist functionality
    const wishlistBtn = document.getElementById('wishlistBtn');
    if (wishlistBtn) {
        wishlistBtn.addEventListener('click', function(e) {
            e.preventDefault();
            // Add wishlist functionality here
            console.log('Wishlist clicked');
            // You can implement wishlist toggle logic
        });
    }

    // Close dropdowns when clicking outside
    document.addEventListener('click', function(event) {
        // Close auth dropdown
        if (authDropdown && authToggle && !authToggle.contains(event.target) && !authDropdown.contains(event.target)) {
            authDropdown.classList.remove('show');
        }

        // Close mega menu
        if (catalogueDropdown && catalogueMenu && !catalogueMenu.contains(event.target) && !catalogueDropdown.contains(event.target)) {
            catalogueDropdown.classList.remove('active');
        }

        // Close mobile menu
        if (navLinks && mobileMenuToggle && !mobileMenuToggle.contains(event.target) && !navLinks.contains(event.target)) {
            navLinks.classList.remove('active');
        }

        // Close search results
        const searchResults = document.getElementById('searchResultsContainer');
        const searchInput = document.getElementById('searchInput');
        if (searchResults && searchInput && !searchInput.contains(event.target) && !searchResults.contains(event.target)) {
            searchResults.style.display = 'none';
        }
    });

    // Search functionality with loading indicator
    let searchTimeout;
    const searchInput = document.getElementById('searchInput');
    const searchLoading = document.getElementById('searchLoading');

    if (searchInput) {
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(searchProducts, 300);
        });
    }

    function searchProducts() {
        const query = searchInput.value.trim();
        const resultsContainer = document.getElementById('searchResultsContainer');
        const resultsBox = document.getElementById('searchResults');

        if (!resultsContainer || !resultsBox) return;

        if (query.length < 2) {
            resultsBox.innerHTML = "";
            resultsContainer.style.display = "none";
            if (searchLoading) searchLoading.classList.remove('show');
            return;
        }

        // Show loading indicator
        if (searchLoading) searchLoading.classList.add('show');
        resultsContainer.style.display = "block";

        fetch(`/search-products?query=${encodeURIComponent(query)}`)
            .then(res => res.json())
            .then(data => {
                // Hide loading indicator
                if (searchLoading) searchLoading.classList.remove('show');

                let html = "";

                if (data.length > 0) {
                    data.forEach(product => {
                        const image = product.images?.[0]?.nom
                            ? `/photos/${product.images[0].nom}`
                            : "/default-placeholder.png";

                        html += `
                            <a href="/detailprod/${product.id}" class="result-item">
                                <img src="${image}" alt="${product.libelle}">
                                <div class="result-info">
                                    <div class="result-title">${product.libelle}</div>
                                    <div class="result-category">${product.categorie?.nomCat || 'Non catégorisé'}</div>
                                    <div class="result-price">${new Intl.NumberFormat().format(product.prix)} FCFA</div>
                                </div>
                            </a>
                        `;
                    });
                } else {
                    html = `<div class="result-item"><div class="text-center w-100">Aucun produit trouvé</div></div>`;
                }

                resultsBox.innerHTML = html;
            })
            .catch(err => {
                console.error("Search error:", err);
                if (searchLoading) searchLoading.classList.remove('show');
                resultsBox.innerHTML = `<div class="result-item"><div class="text-center w-100">Erreur lors de la recherche</div></div>`;
                resultsContainer.style.display = "block";
            });
    }

    // Navbar scroll effect
    const navbar = document.querySelector('.navbar');
    if (navbar) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    }

    // Prevent search form submission if input is empty
    const searchForm = document.getElementById('searchForm');
    if (searchForm) {
        searchForm.addEventListener('submit', function(e) {
            if (!searchInput.value.trim()) {
                e.preventDefault();
                searchInput.focus();
            }
        });
    }

    // Cart functionality
    function updateCartCount(count) {
        const cartCount = document.querySelector('.cart-count');
        if (cartCount) {
            cartCount.textContent = count;
            cartCount.classList.add('updated');
            setTimeout(() => cartCount.classList.remove('updated'), 300);
        }
    }

    // Listen for cart updates
    document.addEventListener('cartUpdated', function(e) {
        updateCartCount(e.detail.count);
    });

    // Update cart count from AJAX responses
    $(document).ajaxComplete(function(event, xhr, settings) {
        if (xhr.responseJSON && xhr.responseJSON.cartQuantity !== undefined) {
            updateCartCount(xhr.responseJSON.cartQuantity);
        }
    });

    // Close mobile menu when clicking on link
    const mobileNavLinks = document.querySelectorAll('.mobile-nav .nav-link');
    mobileNavLinks.forEach(link => {
        link.addEventListener('click', () => {
            if (mobileMenu) mobileMenu.classList.remove('active');
        });
    });

    // Keyboard navigation improvements
    document.addEventListener('keydown', function(e) {
        // Close dropdowns with Escape key
        if (e.key === 'Escape') {
            if (authDropdown) authDropdown.classList.remove('show');
            if (catalogueDropdown) catalogueDropdown.classList.remove('active');
            if (navLinks) navLinks.classList.remove('active');
            const searchResults = document.getElementById('searchResultsContainer');
            if (searchResults) searchResults.style.display = 'none';
        }
    });

    // Focus management for accessibility
    const focusableElements = document.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');

    focusableElements.forEach(element => {
        element.addEventListener('focus', function() {
            // Add focus styles if needed
        });
    });

    // Initialize cart count on page load
    const initialCartCount = document.querySelector('.cart-count')?.textContent || 0;
    updateCartCount(initialCartCount);

    // Wishlist count update (if you have wishlist functionality)
    function updateWishlistCount(count) {
        const wishlistCount = document.querySelector('.wishlist-count');
        if (wishlistCount) {
            wishlistCount.textContent = count;
            if (count === 0) {
                wishlistCount.style.display = 'none';
            } else {
                wishlistCount.style.display = 'flex';
            }
        }
    }

    // Initialize wishlist count (you can modify this based on your backend)
    updateWishlistCount(0); // Default to 0, update based on user data
});
