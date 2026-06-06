document.addEventListener('DOMContentLoaded', () => {
    // Mobile Navigation Toggle
    const menuToggle = document.querySelector('.menu-toggle');
    const navLinks = document.querySelector('.nav-links');

    if (menuToggle && navLinks) {
        menuToggle.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });
    }

    // Add fade-in animation to main sections
    const sections = document.querySelectorAll('section, .glass-card');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    sections.forEach(section => {
        section.style.opacity = '0';
        observer.observe(section);
    });
});

// For Dashboard Acceptance (if used by inline onclick)
function acceptPickup(id) {
    if(confirm('Are you sure you want to accept this pickup?')) {
        window.location.href = `accept_pickup.php?id=${id}`;
    }
}
