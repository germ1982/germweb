// index.js: Control del contenedor de presentación por tiempo fijo
document.addEventListener('DOMContentLoaded', () => {
    const introContainer = document.getElementById('intro-container');
    
    if (introContainer) {
        // Oculta el contenedor a los 6 segundos (6000 milisegundos)
        setTimeout(() => {
            introContainer.classList.add('hidden');
            setTimeout(() => {
                introContainer.remove();
            }, 600); // Tiempo de la transición CSS (Cascading Style Sheets)
        }, 6000);
    }

    // Desplazamiento suave para el menú
    const navLinks = document.querySelectorAll('.nav-links a');
    navLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const targetId = link.getAttribute('href');
            const targetSection = document.querySelector(targetId);
            
            if (targetSection) {
                targetSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }
        });
    });
});