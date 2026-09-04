

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
                //const topPos = targetElement.offsetTop - container.offsetTop;
                const topPos = targetElement.offsetTop - container.offsetTop - 20; // -20 le da un respiro arriba
                container.scrollTo({
                    top: topPos,
                    behavior: 'smooth'
                });
            }
        });
    });
});


// index.js: Aplica el efecto de electricidad cada 2 segundos a las imágenes superiores
setInterval(() => {
    // Selecciona todas las imágenes dentro de las tarjetas con el gráfico arriba
    const imagenes = document.querySelectorAll('.data-card.card-top-img .subportada-img');
    
    imagenes.forEach(img => {
        // Añade la clase de animación CSS
        img.classList.add('animar-electricidad');
        
        // Quita la clase tras 400ms para permitir que se vuelva a disparar en el siguiente ciclo
        setTimeout(() => {
            img.classList.remove('animar-electricidad');
        }, 200);
    });
}, 5000); // Intervalo de repetición: cada 2 segundos