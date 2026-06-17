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