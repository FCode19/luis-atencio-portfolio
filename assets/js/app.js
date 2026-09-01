document.addEventListener('DOMContentLoaded', () => {
    const navbar = document.querySelector('.portfolio-nav');
    const updateNavbar = () => {
        if (!navbar) return;
        navbar.classList.toggle('shadow-sm', window.scrollY > 20);
    };
    updateNavbar();
    window.addEventListener('scroll', updateNavbar, { passive: true });
});
