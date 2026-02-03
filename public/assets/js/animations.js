/**
 * Lightweight scroll animations for AFRICIA TECH homepage
 * Uses Intersection Observer API for performance
 */

(function() {
    'use strict';

    // Configuration
    const config = {
        // Animation classes
        fadeInClass: 'fade-in',
        slideUpClass: 'slide-up',
        parallaxClass: 'parallax',
        
        // Intersection Observer options
        observerOptions: {
            root: null,
            rootMargin: '0px 0px -100px 0px',
            threshold: 0.1
        },
        
        // Parallax speed (0.1 = slow, 0.5 = fast)
        parallaxSpeed: 0.3
    };

    // Initialize animations when DOM is ready
    function init() {
        initScrollReveal();
        initParallax();
        initCounterAnimation();
        initVideoPlayer();
    }

    /**
     * Scroll reveal animations using Intersection Observer
     */
    function initScrollReveal() {
        // Check if Intersection Observer is supported
        if (!('IntersectionObserver' in window)) {
            // Fallback: show all elements immediately
            document.querySelectorAll(`.${config.fadeInClass}, .${config.slideUpClass}`).forEach(el => {
                el.style.opacity = '1';
                el.style.transform = 'translateY(0)';
            });
            return;
        }

        // Create observer
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                    observer.unobserve(entry.target); // Only animate once
                }
            });
        }, config.observerOptions);

        // Observe all elements with animation classes
        document.querySelectorAll(`.${config.fadeInClass}, .${config.slideUpClass}`).forEach(el => {
            observer.observe(el);
        });
    }

    /**
     * Parallax effect for hero and background sections
     * Enhanced with better performance and video section support
     */
    function initParallax() {
        const parallaxElements = document.querySelectorAll(`.${config.parallaxClass}`);
        
        if (parallaxElements.length === 0) return;

        // Throttle scroll events for performance
        let ticking = false;
        let lastScrollY = window.pageYOffset;

        function updateParallax() {
            const currentScrollY = window.pageYOffset;
            
            parallaxElements.forEach(element => {
                const rect = element.getBoundingClientRect();
                const elementTop = rect.top + currentScrollY;
                const elementHeight = rect.height;
                const windowHeight = window.innerHeight;
                
                // Calculate if element is in viewport
                const scrolled = currentScrollY;
                const elementCenter = elementTop + (elementHeight / 2);
                const distanceFromCenter = scrolled + (windowHeight / 2) - elementCenter;
                
                // Only apply parallax if element is in viewport
                if (rect.bottom >= 0 && rect.top <= windowHeight) {
                    // More subtle parallax effect
                    const rate = distanceFromCenter * 0.15;
                    element.style.transform = `translateY(${rate}px)`;
                } else {
                    // Reset transform when out of viewport
                    element.style.transform = '';
                }
            });
            
            lastScrollY = currentScrollY;
            ticking = false;
        }

        function requestTick() {
            if (!ticking) {
                window.requestAnimationFrame(updateParallax);
                ticking = true;
            }
        }

        // Only enable parallax on desktop (disable on mobile for performance)
        if (window.innerWidth > 768) {
            window.addEventListener('scroll', requestTick, { passive: true });
            
            // Handle window resize
            let resizeTimer;
            window.addEventListener('resize', () => {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(() => {
                    if (window.innerWidth <= 768) {
                        parallaxElements.forEach(element => {
                            element.style.transform = '';
                        });
                    }
                }, 250);
            }, { passive: true });
        }
    }

    /**
     * Animate counters in statistics section
     */
    function initCounterAnimation() {
        const counters = document.querySelectorAll('[data-counter]');
        
        if (counters.length === 0) return;

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        counters.forEach(counter => observer.observe(counter));
    }

    function animateCounter(element) {
        const target = parseInt(element.getAttribute('data-counter'));
        const duration = 2000; // 2 seconds
        const increment = target / (duration / 16); // 60fps
        let current = 0;

        const updateCounter = () => {
            current += increment;
            if (current < target) {
                element.textContent = Math.floor(current) + (element.textContent.includes('+') ? '+' : '');
                requestAnimationFrame(updateCounter);
            } else {
                element.textContent = target + (element.textContent.includes('+') ? '+' : '');
            }
        };

        updateCounter();
    }

    /**
     * Video player functionality
     * Handles video play on click with lazy loading
     */
    function initVideoPlayer() {
        const videoContainer = document.getElementById('video-container');
        const videoIframe = document.getElementById('video-iframe');
        
        if (!videoContainer || !videoIframe) return;
        
        // Replace with your actual video URL (YouTube, Vimeo, etc.)
        // Example YouTube embed URL format: https://www.youtube.com/embed/VIDEO_ID
        // Example Vimeo embed URL format: https://player.vimeo.com/video/VIDEO_ID
        const videoUrl = 'https://www.youtube.com/embed/dQw4w9WgXcQ'; // Replace with your actual video ID
        
        videoContainer.addEventListener('click', () => {
            if (!videoIframe.src) {
                videoIframe.src = videoUrl + '?autoplay=1&rel=0';
                videoIframe.classList.remove('hidden');
                
                // Hide thumbnail and play button
                const thumbnail = videoContainer.querySelector('img');
                const playButton = videoContainer.querySelector('.relative.z-10');
                if (thumbnail) thumbnail.style.display = 'none';
                if (playButton) playButton.style.display = 'none';
            }
        }, { once: true }); // Only execute once
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
