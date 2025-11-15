/**
 * Animasi untuk halaman index Dinas PUPR
 * Menangani smooth scroll dan animasi layanan
 */

document.addEventListener('DOMContentLoaded', function() {
    // Smooth scroll untuk navigasi layanan
    const layananLink = document.querySelector('a[href="#layanan-kami"]');
    if (layananLink) {
        layananLink.addEventListener('click', function(e) {
            e.preventDefault();
            const targetSection = document.getElementById('layanan-kami');
            if (targetSection) {
                const offsetTop = targetSection.offsetTop - 100; // Offset untuk navbar
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    }

    // Intersection Observer untuk animasi scroll
    const serviceCards = document.querySelectorAll('.service-card');
    const serviceHeader = document.querySelector('.service-header');
    
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Tambahkan delay bertahap untuk kartu layanan
                if (entry.target.classList.contains('service-card')) {
                    const cards = Array.from(document.querySelectorAll('.service-card'));
                    const index = cards.indexOf(entry.target);
                    setTimeout(() => {
                        entry.target.classList.add('animate');
                    }, index * 100); // Delay 100ms per kartu
                } else {
                    entry.target.classList.add('animate');
                }
            } else {
                // Hapus animasi saat keluar dari viewport (untuk scroll ke atas)
                entry.target.classList.remove('animate');
            }
        });
    }, observerOptions);

    // Observe semua elemen
    serviceCards.forEach(card => {
        observer.observe(card);
    });
    
    if (serviceHeader) {
        observer.observe(serviceHeader);
    }
});











