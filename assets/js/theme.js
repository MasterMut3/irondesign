/**
 * IronDesign Theme - Main JavaScript
 * @package IronDesign
 */

(function() {
    'use strict';

    // ============================================================
    // DOM Ready
    // ============================================================

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

    function init() {
        initMobileMenu();
        initHeaderScroll();
        initAnimations();
        initCartCount();
        initSearchToggle();
    }

    // ============================================================
    // Mobile Menu
    // ============================================================

    function initMobileMenu() {
        const toggle = document.querySelector('.mobile-toggle');
        const nav = document.querySelector('.primary-navigation');
        const header = document.querySelector('.site-header');

        if (!toggle || !nav) return;

        // Create overlay
        const overlay = document.createElement('div');
        overlay.className = 'menu-overlay';
        overlay.style.cssText = `
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 9998;
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
        `;
        document.body.appendChild(overlay);

        function toggleMenu() {
            const isOpen = nav.classList.toggle('active');
            toggle.classList.toggle('active');
            overlay.style.display = isOpen ? 'block' : 'none';
            document.body.classList.toggle('menu-open');
            document.body.style.overflow = isOpen ? 'hidden' : '';
        }

        // Toggle on button click
        toggle.addEventListener('click', toggleMenu);

        // Close on overlay click
        overlay.addEventListener('click', toggleMenu);

        // Close on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && nav.classList.contains('active')) {
                toggleMenu();
            }
        });

        // Close on window resize (if going back to desktop)
        let resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                if (window.innerWidth > 991 && nav.classList.contains('active')) {
                    toggleMenu();
                }
            }, 250);
        });
    }

    // ============================================================
    // Header Scroll Effect
    // ============================================================

    function initHeaderScroll() {
        const header = document.querySelector('.site-header');
        if (!header) return;

        let isScrolling = false;

        window.addEventListener('scroll', function() {
            if (!isScrolling) {
                window.requestAnimationFrame(function() {
                    const scrollY = window.scrollY || window.pageYOffset;

                    if (scrollY > 50) {
                        header.classList.add('scrolled');
                    } else {
                        header.classList.remove('scrolled');
                    }

                    isScrolling = false;
                });
                isScrolling = true;
            }
        }, { passive: true });

        // Initial check
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        }
    }

    // ============================================================
    // Scroll Animations (fade-up)
    // ============================================================

    function initAnimations() {
        const elements = document.querySelectorAll('.fade-up');

        if (!elements.length) return;

        // Use Intersection Observer
        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('active');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });

            elements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback: show all if no IntersectionObserver
            elements.forEach(function(el) {
                el.classList.add('active');
            });
        }
    }

    // ============================================================
    // Cart Count AJAX Update
    // ============================================================

    function initCartCount() {
        const cartCount = document.querySelector('.cart-count');
        if (!cartCount) return;

        // Update cart count via AJAX
        function updateCartCount() {
            // Check if WooCommerce is available
            if (typeof wc_cart_params !== 'undefined' && wc_cart_params.ajax_url) {
                fetch(wc_cart_params.ajax_url + '?action=irondesign_get_cart_count', {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(function(response) {
                    if (!response.ok) throw new Error('Network error');
                    return response.json();
                })
                .then(function(data) {
                    if (data && data.count !== undefined) {
                        cartCount.textContent = data.count;
                    }
                })
                .catch(function() {
                    // Silent fail - keep existing count
                });
            }
        }

        // Listen for WooCommerce AJAX events (if jQuery is available)
        if (typeof jQuery !== 'undefined') {
            jQuery(document).on('added_to_cart removed_from_cart', function() {
                setTimeout(updateCartCount, 300);
            });
        }

        // Also listen for our own custom events
        document.addEventListener('irondesign_cart_update', updateCartCount);

        // Initial update after page load
        setTimeout(updateCartCount, 500);
    }

    // ============================================================
    // Search Toggle (Optional)
    // ============================================================

    function initSearchToggle() {
        const searchIcon = document.querySelector('.header-icon[href*="search"]');
        if (!searchIcon) return;

        searchIcon.addEventListener('click', function(e) {
            e.preventDefault();
            // You can implement search overlay here
            // For now, just redirect to search page
            window.location.href = this.getAttribute('href');
        });
    }

    // ============================================================
    // Lazy Load Images (Optional)
    // ============================================================

    function initLazyLoad() {
        const images = document.querySelectorAll('img[loading="lazy"]');
        if (!images.length) return;

        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        const src = img.dataset.src || img.getAttribute('data-src');
                        if (src) {
                            img.src = src;
                            img.removeAttribute('data-src');
                        }
                        observer.unobserve(img);
                    }
                });
            });

            images.forEach(function(img) {
                observer.observe(img);
            });
        }
    }

})();