/**
 * IronDesign Theme - Main JavaScript
 * @package IronDesign
 */

(function() {
    'use strict';

    // Wait for DOM
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

    function init() {
        // Mobile Menu
        const toggle = document.querySelector('.mobile-toggle');
        const nav = document.querySelector('.primary-navigation');

        if (!toggle || !nav) return;

        // Create overlay
        const overlay = document.createElement('div');
        overlay.className = 'menu-overlay';
        document.body.appendChild(overlay);

        // Toggle menu
        function toggleMenu() {
            const isOpen = nav.classList.toggle('active');
            toggle.classList.toggle('active');
            overlay.classList.toggle('active');
            document.body.classList.toggle('menu-open');
            document.body.style.overflow = isOpen ? 'hidden' : '';
        }

        // Events
        toggle.addEventListener('click', toggleMenu);
        overlay.addEventListener('click', toggleMenu);

        // Close on Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && nav.classList.contains('active')) {
                toggleMenu();
            }
        });

        // Cart count update (AJAX)
        const cartCount = document.querySelector('.cart-count');
        if (cartCount && window.IronDesign) {
            // Optional: Update cart via AJAX on add/remove
            document.addEventListener('added_to_cart', function() {
                // Refresh cart count
                fetch(window.IronDesign.ajaxUrl + '?action=irondesign_get_cart_count')
                    .then(response => response.json())
                    .then(data => {
                        if (data.count !== undefined) {
                            cartCount.textContent = data.count;
                        }
                    })
                    .catch(() => {});
            });
        }
    }

})();