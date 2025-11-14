/**
 * News Slider untuk halaman index Dinas PUPR
 * Menangani slider berita dengan navigasi panah
 */

document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('newsSliderContainer');
    const prevBtn = document.getElementById('newsSliderPrev');
    const nextBtn = document.getElementById('newsSliderNext');
    
    // Cek apakah elemen slider ada
    if (!container || !prevBtn || !nextBtn) return;
    
    let currentPosition = 0;
    
    function getCardWidth() {
        const firstCard = container.querySelector('div');
        return firstCard ? firstCard.offsetWidth + 24 : 0; // 24 is gap
    }
    
    function updateSlider() {
        container.style.transform = `translateX(-${currentPosition}px)`;
    }
    
    // Next button event listener
    nextBtn.addEventListener('click', function() {
        const cardWidth = getCardWidth();
        const maxScroll = container.scrollWidth - container.parentElement.offsetWidth;
        
        if (currentPosition < maxScroll) {
            currentPosition += cardWidth;
            if (currentPosition > maxScroll) currentPosition = maxScroll;
            updateSlider();
        }
    });
    
    // Previous button event listener
    prevBtn.addEventListener('click', function() {
        const cardWidth = getCardWidth();
        
        if (currentPosition > 0) {
            currentPosition -= cardWidth;
            if (currentPosition < 0) currentPosition = 0;
            updateSlider();
        }
    });
    
    // Handle window resize
    let resizeTimeout;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
            // Reset position if needed
            const maxScroll = container.scrollWidth - container.parentElement.offsetWidth;
            if (currentPosition > maxScroll) {
                currentPosition = maxScroll;
                updateSlider();
            }
        }, 150);
    });
});