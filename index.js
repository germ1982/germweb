// index.js: Control del menú desplazando solo el contenedor interno
document.addEventListener('DOMContentLoaded', () => {
    const introContainer = document.getElementById('intro-container');
    
    if (introContainer) {
        setTimeout(() => {
            introContainer.classList.add('hidden');
            setTimeout(() => {
                introContainer.remove();
            }, 600);
        }, 6000);
    }

    // Selecciona el contenedor con scroll y los enlaces del menú
    const container = document.querySelector('.dashboard-body-container');
    
    document.querySelectorAll('.nav-links a').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (container && targetElement) {
                // Calcula la posición exacta relativa al contenedor para evitar scroll global
                const topPos = targetElement.offsetTop - container.offsetTop;
                container.scrollTo({
                    top: topPos,
                    behavior: 'smooth'
                });
            }
        });
    });
});