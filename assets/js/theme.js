'use strict';

/* ==================================================
   IronDesign Theme
================================================== */

const IronDesign = {

    init() {

        this.cache();

        this.bind();

        this.stickyHeader();

        this.scrollReveal();

        this.smoothScroll();

    },

    cache() {

        this.header = document.querySelector('.site-header');

        this.mobileToggle = document.querySelector('.mobile-toggle');

        this.navigation = document.querySelector('.primary-navigation');

        this.revealElements = document.querySelectorAll('.fade-up');

    },

    bind() {

        window.addEventListener(
            'scroll',
            this.stickyHeader.bind(this),
            {
                passive: true
            }
        );

        window.addEventListener(
            'resize',
            this.closeMobile.bind(this)
        );

        if (this.mobileToggle) {

            this.mobileToggle.addEventListener(
                'click',
                this.toggleMobile.bind(this)
            );

        }

    },

    /* ==========================================
       Sticky Header
    ========================================== */

    stickyHeader() {

        if (!this.header) return;

        if (window.scrollY > 60) {

            this.header.classList.add('scrolled');

        } else {

            this.header.classList.remove('scrolled');

        }

    },

    /* ==========================================
       Mobile Navigation
    ========================================== */

    toggleMobile() {

        document.body.classList.toggle('menu-open');

        this.mobileToggle.classList.toggle('active');

        this.navigation.classList.toggle('active');

    },

    closeMobile() {

        if (window.innerWidth > 992) {

            document.body.classList.remove('menu-open');

            this.mobileToggle?.classList.remove('active');

            this.navigation?.classList.remove('active');

        }

    },

    /* ==========================================
       Reveal Animation
    ========================================== */

    scrollReveal() {

        if (!this.revealElements.length) return;

        const observer = new IntersectionObserver(

            entries => {

                entries.forEach(entry => {

                    if (entry.isIntersecting) {

                        entry.target.classList.add('active');

                    }

                });

            },

            {

                threshold: .15,

                rootMargin: '0px 0px -50px 0px'

            }

        );

        this.revealElements.forEach(element => {

            observer.observe(element);

        });

    },

    /* ==========================================
       Smooth Scroll
    ========================================== */

    smoothScroll() {

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {

            anchor.addEventListener('click', e => {

                const target = document.querySelector(

                    anchor.getAttribute('href')

                );

                if (!target) return;

                e.preventDefault();

                target.scrollIntoView({

                    behavior: 'smooth',

                    block: 'start'

                });

            });

        });

    }

};

document.addEventListener(

    'DOMContentLoaded',

    () => {

        IronDesign.init();

    }

);
/* ==================================================
   Hero Parallax
================================================== */

IronDesign.heroParallax = function () {

    const hero = document.querySelector('.hero');

    if (!hero) return;

    window.addEventListener(

        'scroll',

        () => {

            const y = window.scrollY;

            hero.style.transform =
                `translateY(${y * 0.18}px)`;

        },

        { passive:true }

    );

};

/* ==================================================
   Mouse Glow
================================================== */

IronDesign.mouseGlow = function(){

    const cards = document.querySelectorAll(

        '.card,.product-card,.glass-card'

    );

    cards.forEach(card=>{

        card.addEventListener('mousemove',e=>{

            const rect=card.getBoundingClientRect();

            const x=e.clientX-rect.left;

            const y=e.clientY-rect.top;

            card.style.setProperty('--mouse-x',`${x}px`);

            card.style.setProperty('--mouse-y',`${y}px`);

        });

    });

};

/* ==================================================
   Counter Animation
================================================== */

IronDesign.counter=function(){

    const counters=document.querySelectorAll('[data-counter]');

    if(!counters.length) return;

    const observer=new IntersectionObserver(entries=>{

        entries.forEach(entry=>{

            if(!entry.isIntersecting) return;

            const el=entry.target;

            const target=parseInt(

                el.dataset.counter,

                10

            );

            let current=0;

            const step=Math.max(1,target/120);

            const timer=setInterval(()=>{

                current+=step;

                if(current>=target){

                    current=target;

                    clearInterval(timer);

                }

                el.textContent=Math.floor(current);

            },16);

            observer.unobserve(el);

        });

    });

    counters.forEach(counter=>{

        observer.observe(counter);

    });

};

/* ==================================================
   Back To Top
================================================== */

IronDesign.backToTop=function(){

    const button=document.querySelector(

        '.back-to-top'

    );

    if(!button) return;

    window.addEventListener(

        'scroll',

        ()=>{

            if(window.scrollY>500){

                button.classList.add('visible');

            }else{

                button.classList.remove('visible');

            }

        },

        {passive:true}

    );

    button.addEventListener('click',()=>{

        window.scrollTo({

            top:0,

            behavior:'smooth'

        });

    });

};

/* ==================================================
   Lazy Images
================================================== */

IronDesign.lazyImages=function(){

    const images=document.querySelectorAll(

        'img[data-src]'

    );

    if(!images.length) return;

    const observer=new IntersectionObserver(

        entries=>{

            entries.forEach(entry=>{

                if(!entry.isIntersecting) return;

                const img=entry.target;

                img.src=img.dataset.src;

                img.removeAttribute('data-src');

                observer.unobserve(img);

            });

        },

        {

            rootMargin:'100px'

        }

    );

    images.forEach(img=>{

        observer.observe(img);

    });

};

/* ==================================================
   Debounce
================================================== */

IronDesign.debounce=function(fn,delay){

    let timeout;

    return(...args)=>{

        clearTimeout(timeout);

        timeout=setTimeout(()=>{

            fn(...args);

        },delay);

    };

};

/* ==================================================
   Throttle
================================================== */

IronDesign.throttle=function(fn,wait){

    let waiting=false;

    return(...args)=>{

        if(waiting) return;

        fn(...args);

        waiting=true;

        setTimeout(()=>{

            waiting=false;

        },wait);

    };

};

/* ==================================================
   Initialize Part 2
================================================== */

document.addEventListener(

    'DOMContentLoaded',

    ()=>{

        IronDesign.heroParallax();

        IronDesign.mouseGlow();

        IronDesign.counter();

        IronDesign.backToTop();

        IronDesign.lazyImages();

    }

);
/* ==================================================
   Mobile Navigation Animation
================================================== */

IronDesign.mobileNavigation = function () {

    const toggle = document.querySelector('.mobile-toggle');
    const nav = document.querySelector('.primary-navigation');

    if (!toggle || !nav) return;

    toggle.addEventListener('click', () => {

        nav.classList.toggle('open');

        toggle.classList.toggle('active');

        document.body.classList.toggle('menu-open');

    });

};

/* ==================================================
   Dropdown Navigation
================================================== */

IronDesign.dropdownNavigation = function () {

    document.querySelectorAll('.menu-item-has-children')

    .forEach(item => {

        const link = item.querySelector('a');

        if (!link) return;

        link.addEventListener('click', e => {

            if (window.innerWidth > 992) return;

            e.preventDefault();

            item.classList.toggle('expanded');

        });

    });

};

/* ==================================================
   Search Modal
================================================== */

IronDesign.searchModal = function () {

    const modal = document.querySelector('.search-modal');

    const open = document.querySelector('.search-trigger');

    const close = document.querySelector('.search-close');

    if (!modal) return;

    open?.addEventListener('click', () => {

        modal.classList.add('active');

        document.body.classList.add('menu-open');

        modal.querySelector('input')?.focus();

    });

    close?.addEventListener('click', () => {

        modal.classList.remove('active');

        document.body.classList.remove('menu-open');

    });

    document.addEventListener('keydown', e => {

        if (e.key === 'Escape') {

            modal.classList.remove('active');

            document.body.classList.remove('menu-open');

        }

    });

};

/* ==================================================
   Loading Overlay
================================================== */

IronDesign.loading = {

    element: null,

    create() {

        if (this.element) return;

        this.element = document.createElement('div');

        this.element.className = 'loading-screen';

        this.element.innerHTML = `

            <div class="loading-spinner"></div>

        `;

        document.body.appendChild(this.element);

    },

    show() {

        this.create();

        this.element.classList.add('visible');

    },

    hide() {

        this.element?.classList.remove('visible');

    }

};

/* ==================================================
   Toast Notification
================================================== */

IronDesign.toast = function (

    message,

    type = 'success'

) {

    const toast = document.createElement('div');

    toast.className = `toast ${type}`;

    toast.innerHTML = message;

    document.body.appendChild(toast);

    requestAnimationFrame(() => {

        toast.classList.add('show');

    });

    setTimeout(() => {

        toast.classList.remove('show');

        setTimeout(() => {

            toast.remove();

        }, 350);

    }, 3500);

};

/* ==================================================
   AJAX Helper
================================================== */

IronDesign.ajax = async function (

    action,

    data = {}

) {

    const body = new FormData();

    body.append(

        'action',

        action

    );

    body.append(

        'nonce',

        IronDesignData.nonce

    );

    Object.keys(data).forEach(key => {

        body.append(

            key,

            data[key]

        );

    });

    try {

        IronDesign.loading.show();

        const response = await fetch(

            IronDesignData.ajaxUrl,

            {

                method: 'POST',

                body

            }

        );

        return await response.json();

    }

    catch (error) {

        console.error(error);

        IronDesign.toast(

            'Unexpected error.',

            'error'

        );

    }

    finally {

        IronDesign.loading.hide();

    }

};

/* ==================================================
   Keyboard Accessibility
================================================== */

IronDesign.accessibility = function () {

    document

    .querySelectorAll('button,a,input')

    .forEach(element => {

        element.addEventListener(

            'keyup',

            e => {

                if (e.key === 'Enter') {

                    element.click();

                }

            }

        );

    });

};

/* ==================================================
   Scroll Progress
================================================== */

IronDesign.scrollProgress = function () {

    const bar = document.querySelector(

        '.scroll-progress'

    );

    if (!bar) return;

    window.addEventListener(

        'scroll',

        () => {

            const height =

                document.documentElement.scrollHeight -

                window.innerHeight;

            const progress =

                window.scrollY /

                height *

                100;

            bar.style.width =

                progress + '%';

        },

        {

            passive: true

        }

    );

};

/* ==================================================
   Performance
================================================== */

IronDesign.performance = function () {

    if (

        !('PerformanceObserver' in window)

    ) return;

    const observer = new PerformanceObserver(() => {});

    observer.observe({

        entryTypes: [

            'paint',

            'largest-contentful-paint'

        ]

    });

};

/* ==================================================
   Final Init
================================================== */

document.addEventListener(

    'DOMContentLoaded',

    () => {

        IronDesign.mobileNavigation();

        IronDesign.dropdownNavigation();

        IronDesign.searchModal();

        IronDesign.accessibility();

        IronDesign.scrollProgress();

        IronDesign.performance();

    }

);
/**
 * IronDesign Theme - Main JavaScript
 * Clean version without errors
 */

(function($) {
    'use strict';

    // ============================================
    // 1. SINGLE PRODUCT GALLERY
    // ============================================
    
    function initProductGallery() {
        // Only run on single product pages
        if (!$('body.single-product').length) {
            return;
        }

        var $mainImage = $('#main-product-image');
        var $thumbnails = $('.irondesign-gallery-thumbnails');
        var $thumbs = $thumbnails.find('.gallery-thumb');
        var thumbCount = $thumbs.length;
        var currentIndex = 0;

        // No thumbnails? Exit
        if (thumbCount === 0) return;

        // ===== THUMBNAIL CLICK =====
        $thumbs.on('click', function() {
            var $this = $(this);
            var imageUrl = $this.data('image');
            var index = parseInt($this.data('index'));
            
            if (imageUrl && $mainImage.length) {
                // Change main image
                $mainImage.attr('src', imageUrl);
                
                // Update active state
                $thumbs.removeClass('active');
                $this.addClass('active');
                
                currentIndex = index;
                
                // Update slider position
                updateSliderPosition();
            }
        });

        // ===== SLIDER NAVIGATION =====
        function updateSliderPosition() {
            var $firstThumb = $thumbs.first();
            if (!$firstThumb.length) return;
            
            var thumbWidth = $firstThumb.outerWidth(true) || 80;
            var containerWidth = $thumbnails.width() || 300;
            var maxScroll = Math.max(0, (thumbWidth * thumbCount) - containerWidth);
            
            var scrollAmount = currentIndex * thumbWidth;
            var centerOffset = (containerWidth / 2) - (thumbWidth / 2);
            var finalScroll = Math.min(Math.max(0, scrollAmount - centerOffset + thumbWidth / 2), maxScroll);
            
            $thumbnails.animate({
                scrollLeft: finalScroll
            }, 300);
        }

        // ===== ARROW BUTTONS =====
        $('.slider-arrow.prev').on('click', function() {
            var newIndex = Math.max(0, currentIndex - 1);
            $thumbs.eq(newIndex).trigger('click');
        });

        $('.slider-arrow.next').on('click', function() {
            var newIndex = Math.min(thumbCount - 1, currentIndex + 1);
            $thumbs.eq(newIndex).trigger('click');
        });

        // ===== KEYBOARD NAVIGATION =====
        $(document).on('keydown', function(e) {
            if (!$(e.target).closest('.irondesign-gallery').length) return;
            
            if (e.key === 'ArrowRight') {
                e.preventDefault();
                $('.slider-arrow.next').trigger('click');
            } else if (e.key === 'ArrowLeft') {
                e.preventDefault();
                $('.slider-arrow.prev').trigger('click');
            }
        });

        // ===== TOUCH SWIPE SUPPORT =====
        var touchStartX = 0;
        var touchEndX = 0;
        
        $('.irondesign-gallery').on('touchstart', function(e) {
            touchStartX = e.originalEvent.changedTouches[0].screenX;
        });
        
        $('.irondesign-gallery').on('touchend', function(e) {
            touchEndX = e.originalEvent.changedTouches[0].screenX;
            var diff = touchStartX - touchEndX;
            var threshold = 50;
            
            if (Math.abs(diff) > threshold) {
                if (diff > 0) {
                    $('.slider-arrow.next').trigger('click');
                } else {
                    $('.slider-arrow.prev').trigger('click');
                }
            }
        });

        // ===== WINDOW RESIZE =====
        var resizeTimer;
        $(window).on('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                updateSliderPosition();
            }, 250);
        });

        // ===== INITIAL SETUP =====
        setTimeout(updateSliderPosition, 300);
    }

    // ============================================
    // 2. MOBILE MENU TOGGLE
    // ============================================
    
    function initMobileMenu() {
        var $toggle = $('.mobile-toggle');
        var $menu = $('#primary-navigation');
        
        if (!$toggle.length || !$menu.length) return;
        
        $toggle.on('click', function(e) {
            e.preventDefault();
            $menu.toggleClass('active');
            $toggle.toggleClass('active');
        });
    }

    // ============================================
    // 3. ADD TRUST BADGES (If not already in HTML)
    // ============================================
    
    function initTrustBadges() {
        // Only run on single product pages
        if (!$('body.single-product').length) return;
        
        // Check if trust badges already exist
        if ($('.product-trust-badges').length) return;
        
        // Check if we're in the right place
        var $summary = $('.single-product-summary');
        if (!$summary.length) return;
        
        // Trust badges HTML
        var trustBadges = `
            <div class="product-trust-badges">
                <div class="trust-badge">
                    <span class="trust-icon">🔨</span>
                    <span>صنایع دستی</span>
                </div>
                <div class="trust-badge">
                    <span class="trust-icon">🌳</span>
                    <span>چوب طبیعی</span>
                </div>
                <div class="trust-badge">
                    <span class="trust-icon">⚙️</span>
                    <span>استحکام آهن</span>
                </div>
            </div>
        `;
        
        $summary.append(trustBadges);
    }

    // ============================================
    // 4. QUANTITY BUTTONS (For add to cart)
    // ============================================
    
    function initQuantityButtons() {
        $('.quantity').each(function() {
            var $wrapper = $(this);
            var $input = $wrapper.find('.qty');
            
            // Skip if already wrapped
            if ($wrapper.closest('.quantity-wrapper').length) return;
            
            var min = parseInt($input.attr('min')) || 1;
            var max = parseInt($input.attr('max')) || 9999;
            
            // Wrap in container
            $wrapper.wrap('<div class="quantity-wrapper"></div>');
            
            // Add buttons
            $wrapper.before('<button type="button" class="qty-btn minus">−</button>');
            $wrapper.after('<button type="button" class="qty-btn plus">+</button>');
            
            // Minus button
            $wrapper.parent().find('.minus').on('click', function(e) {
                e.preventDefault();
                var val = parseInt($input.val()) || min;
                if (val > min) {
                    $input.val(val - 1).trigger('change');
                }
            });
            
            // Plus button
            $wrapper.parent().find('.plus').on('click', function(e) {
                e.preventDefault();
                var val = parseInt($input.val()) || min;
                if (val < max) {
                    $input.val(val + 1).trigger('change');
                }
            });
            
            // Validate on change
            $input.on('change', function() {
                var val = parseInt($(this).val()) || min;
                if (val < min) $(this).val(min);
                if (val > max) $(this).val(max);
            });
        });
    }

    // ============================================
    // 5. SOCIAL SHARE LINKS
    // ============================================
    
    function initSocialShare() {
        $('.share-link').on('click', function(e) {
            e.preventDefault();
            
            var social = $(this).data('social');
            var url = window.location.href;
            var title = document.title;
            var shareUrl = '';
            
            switch(social) {
                case 'whatsapp':
                    shareUrl = 'https://api.whatsapp.com/send?text=' + encodeURIComponent(title + ' - ' + url);
                    break;
                case 'telegram':
                    shareUrl = 'https://t.me/share/url?url=' + encodeURIComponent(url) + '&text=' + encodeURIComponent(title);
                    break;
                case 'twitter':
                    shareUrl = 'https://twitter.com/intent/tweet?url=' + encodeURIComponent(url) + '&text=' + encodeURIComponent(title);
                    break;
                case 'instagram':
                    alert('لطفاً لینک را کپی کرده و در اینستاگرام به اشتراک بگذارید:\n' + url);
                    return;
                default:
                    return;
            }
            
            if (shareUrl) {
                window.open(shareUrl, '_blank', 'width=600,height=400');
            }
        });
    }

    // ============================================
    // 6. INITIALIZE EVERYTHING
    // ============================================
    
    $(document).ready(function() {
        initProductGallery();
        initMobileMenu();
        initTrustBadges();
        initQuantityButtons();
        initSocialShare();
    });

    // Re-run gallery after any AJAX updates
    $(document).on('woocommerce_variation_has_changed', function() {
        setTimeout(initProductGallery, 500);
    });

})(jQuery);