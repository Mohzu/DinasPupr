document.addEventListener('DOMContentLoaded', function() {
            const slides = document.querySelectorAll('.news-slide');
            const dots = document.querySelectorAll('.dot');
            const prevBtn = document.getElementById('prevSlide');
            const nextBtn = document.getElementById('nextSlide');
            const currentSlideSpan = document.getElementById('currentSlide');
            
            // Exit if no slides found
            if (!slides.length) return;
            
            let currentSlide = 0;
            
            // Function to show specific slide (Manual only - no auto-play)
            function showSlide(index) {
                // Hide all slides
                slides.forEach((slide, i) => {
                    slide.classList.remove('active', 'opacity-100');
                    slide.classList.add('opacity-0');
                    
                    if (i === index) {
                        slide.classList.remove('translate-x-full', 'opacity-0');
                        slide.classList.add('active', 'opacity-100');
                    } else if (i < index) {
                        slide.classList.remove('translate-x-full');
                        slide.classList.add('-translate-x-full');
                    } else {
                        slide.classList.remove('-translate-x-full');
                        slide.classList.add('translate-x-full');
                    }
                });
                
                // Update dots
                dots.forEach((dot, i) => {
                    if (i === index) {
                        dot.classList.remove('bg-white/40');
                        dot.classList.add('bg-white', 'scale-125');
                    } else {
                        dot.classList.remove('bg-white', 'scale-125');
                        dot.classList.add('bg-white/40');
                    }
                });
                
                // Update current slide number
                if (currentSlideSpan) {
                    currentSlideSpan.textContent = index + 1;
                }
                currentSlide = index;
            }
            
            // Function to go to next slide
            function nextSlide() {
                const next = (currentSlide + 1) % slides.length;
                showSlide(next);
            }
            
            // Function to go to previous slide
            function prevSlide() {
                const prev = (currentSlide - 1 + slides.length) % slides.length;
                showSlide(prev);
            }
            
            // Event listeners for navigation buttons
            if (nextBtn) {
                nextBtn.addEventListener('click', nextSlide);
            }
            
            if (prevBtn) {
                prevBtn.addEventListener('click', prevSlide);
            }
            
            // Dot navigation event listeners
            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    showSlide(index);
                });
            });
            
            // Initialize slider
            if (slides.length > 0) {
                showSlide(0); // Show first slide
            }
            
            // Handle window resize
            window.addEventListener('resize', () => {
                // Refresh current slide position on resize
                showSlide(currentSlide);
            });
        });