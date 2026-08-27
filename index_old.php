<!DOCTYPE html>
<html lang="es">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soporte Informático - Tu Solución Tecnológica</title>
    <style>
        /* Estilos CSS */

        
        .neon {
            /* border: 2px solid #00f0ff; */
            /* borde base azul */
            border-radius: 10px;
            /* opcional, bordes redondeados */
            box-shadow:
                0 0 5px #00f0ff,
                0 0 10px #00f0ff,
                0 0 15px #00f0ff,
                0 0 20px #00f0ff;
        }

        .neon-video {
            border: 3px solid #00f0ff;
            border-radius: 10px;
            box-shadow:
                0 0 5px #00f0ff,
                0 0 10px #00f0ff,
                0 0 20px #00f0ff,
                0 0 40px #00f0ff;
            animation: neon-flicker 1.5s infinite alternate;
        }

        /* Animación de parpadeo */
        @keyframes neon-flicker {
            0% {
                box-shadow:
                    0 0 5px #00f0ff,
                    0 0 10px #00f0ff,
                    0 0 20px #00f0ff,
                    0 0 40px #00f0ff;
            }

            25% {
                box-shadow:
                    0 0 2px #00f0ff,
                    0 0 5px #00f0ff,
                    0 0 10px #00f0ff,
                    0 0 20px #00f0ff;
            }

            50% {
                box-shadow:
                    0 0 8px #00f0ff,
                    0 0 16px #00f0ff,
                    0 0 30px #00f0ff,
                    0 0 60px #00f0ff;
            }

            75% {
                box-shadow:
                    0 0 3px #00f0ff,
                    0 0 7px #00f0ff,
                    0 0 15px #00f0ff,
                    0 0 30px #00f0ff;
            }

            100% {
                box-shadow:
                    0 0 5px #00f0ff,
                    0 0 10px #00f0ff,
                    0 0 20px #00f0ff,
                    0 0 40px #00f0ff;
            }
        }


        body {

            margin: 0;
            padding: 0;
            background-color: #e0f2f7;
            /* Azul muy claro para el fondo */
            color: #333;
            line-height: 1.6;
            font-family: 'Roboto', sans-serif;
        }

        header {
            background-color: rgb(0, 0, 0);
            /* Azul primario */
            color: white;
            padding: 1rem 0;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        header h1 {
            margin: 0;
            font-size: 2.5em;
        }

        nav ul {
            list-style: none;
            padding: 0;
            text-align: center;
            background-color: #1976d2;
            /* Azul más oscuro para la navegación */
            margin: 0;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
            transition: background-color 0.3s ease;
        }

        nav ul li a:hover {
            background-color: #1565c0;
            /* Azul aún más oscuro al pasar el mouse */
        }

        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .section {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #c0d9e4;
            /* Azul grisáceo para los divisores */
        }

        .section:last-child {
            border-bottom: none;
        }

        h2 {
            color: #0d47a1;
            /* Azul muy oscuro para los títulos de sección */
            text-align: center;
            margin-bottom: 20px;
            font-size: 2.5em;
        }

        .titulo {
            color: rgb(49, 129, 248);
            /* Azul muy oscuro para los títulos de sección */
            text-align: center;
            font-size: 3.5em;
            font-family: 'Oblique', sans-serif;
            /* siempre conviene poner una alternativa */
            font-weight: bold;
            /* esto hace que el texto sea negrita */

        }

        .service-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }

        .service-item {
            background-color: #e3f2fd;
            /* Azul muy claro para los ítems de servicio */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .service-item h3 {
            color: #1e88e5;
            /* Azul medio para títulos de servicio */
            margin-top: 0;
        }

        .contact-info p {
            text-align: center;
            font-size: 1.1em;
            color: #0d47a1;
        }

        footer {
            background-color: #0d47a1;
            /* Azul más oscuro para el pie de página */
            color: white;
            text-align: center;
            padding: 1rem 0;
            margin-top: 30px;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.2);
        }

        .smoke {

            bottom: 0;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(0, 200, 255, 0.4) 0%, transparent 70%);
            border-radius: 50%;
            animation: rise 6s infinite;
            opacity: 0.6;
        }

        .smoke:nth-child(2) {
            left: 20%;
            animation-duration: 7s;
            opacity: 0.4;
        }

        .smoke:nth-child(3) {
            left: 50%;
            animation-duration: 8s;
            opacity: 0.5;
        }

        @keyframes rise {
            0% {
                transform: translateY(0) scale(0.5);
                opacity: 0.5;
            }

            50% {
                transform: translateY(-300px) scale(1);
                opacity: 0.7;
            }

            100% {
                transform: translateY(-600px) scale(1.2);
                opacity: 0;
            }
        }
    </style>
</head>

<body>

    <header>

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-2">
                <video class="neon" width="150" autoplay muted loop>
                    <source src="germ.mp4" type="video/mp4">
                    Tu navegador no soporta video.
                </video>
            </div>
            <div class="col-md-4">

                <div class="text-center">
                    <div class="titulo">G.E.R.M.</div>
                    <p>Soluciones En Informatica</p>
                </div>
            </div>
            <div class="col-md-2">
                <video class="neon" width="150" autoplay muted loop>
                    <source src="germ.mp4" type="video/mp4">
                    Tu navegador no soporta video.
                </video>
            </div>
            <div class="col-md-2"></div>
        </div>




    </header>

    <nav>
        <ul>
            <li><a href="#inicio">Inicio</a></li>
            <li><a href="#servicios">Servicios</a></li>
            <li><a href="#nosotros">Staff</a></li>
            <li><a href="#contacto">Contacto</a></li>
        </ul>
    </nav>

    <main class="container">
        <section id="inicio" class="section">
            <h2>¡Bienvenido a Tu Solución Tecnológica!</h2>
            <p>En G.E.R.M. Soluciones Informaticas, nos especializamos en ofrecer soluciones informáticas integrales para hogares y empresas en Neuquén. Nuestro compromiso es garantizar que cada sistema y dispositivo funcione de manera óptima, asegurando la continuidad de tus operaciones y la protección de tu información.</p>

            <p>Contamos con años de experiencia en el sector, brindando servicios que abarcan desde la reparación y mantenimiento de hardware, hasta el desarrollo de software a medida y la implementación de redes seguras y eficientes. Cada proyecto es abordado con profesionalismo, atención al detalle y un enfoque orientado a resultados, asegurando soluciones confiables y adaptadas a las necesidades de cada cliente.</p>

            <p>Nuestro objetivo es que la tecnología trabaje a tu favor, ofreciendo eficiencia, seguridad y tranquilidad, para que puedas centrarte en lo que realmente importa: tu negocio o tu hogar.</p>
        </section>

        <section id="servicios" class="section">
            <h2>Nuestros Servicios</h2>
            <div class="service-grid">
                <div class="service-item">
                    <h3>Reparación de PC y Notebooks</h3>
                    <p>Diagnóstico y reparación de problemas de hardware y software.</p>
                </div>
                <div class="service-item">
                    <h3>Mantenimiento Preventivo</h3>
                    <p>Optimización de sistemas, limpieza de virus y actualización de software.</p>
                </div>
                <div class="service-item">
                    <h3>Redes y Conectividad</h3>
                    <p>Instalación y configuración de redes cableadas e inalámbricas.</p>
                </div>
                <div class="service-item">
                    <h3>Recuperación de Datos</h3>
                    <p>Servicio especializado para recuperar información perdida o dañada.</p>
                </div>
                <div class="service-item">
                    <h3>Asesoramiento y Venta de Equipos</h3>
                    <p>Te ayudamos a elegir el equipo ideal y lo configuramos por ti.</p>
                </div>
                <div class="service-item">
                    <h3>Desarrollo Web y Software</h3>
                    <p>Creamos sitios web y aplicaciones a medida para tu negocio.</p>
                </div>
            </div>
        </section>

        <section id="nosotros" class="section">
            <h2>Conoceme</h2>

            <p>Soy Gastón Ernesto Ricardo Mena, Analista de Sistemas con una pasión por la tecnología aplicada a soluciones prácticas. A lo largo de mi carrera, he trabajado con clientes de distintos rubros, ofreciendo soporte técnico, optimización de sistemas y desarrollo de software a medida.</p>
            <p>Mi filosofía es simple: la tecnología debe simplificar, no complicar. Por eso, cada proyecto que asumo se centra en brindar soluciones claras, seguras y eficientes, adaptadas a las necesidades reales de cada usuario o empresa.</p>
            <p>Como profesional independiente, cada cliente recibe atención personalizada y directa. Esto me permite entender a fondo tus requerimientos y ofrecer un servicio ágil, confiable y de alta calidad. Mi objetivo es que puedas aprovechar la tecnología como una herramienta que potencia tu trabajo, tus proyectos y tu tranquilidad.</p>
        </section>

        <section id="contacto" class="section">
            <h2>Contáctanos</h2>
            <div class="contact-info">
                <p>¿Necesitas ayuda? ¡No dudes en contactarnos!</p>
                <p><strong>Teléfono:</strong> +54 9 299 123-4567</p>
                <p><strong>Email:</strong> info@tusoluciontecnologica.com.ar</p>
                <p><strong>Horario:</strong> Lunes a Viernes, de 9:00 a 18:00 hs.</p>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Soporte Informático - Tu Solución Tecnológica. Todos los derechos reservados.</p>
        <p>Ubicados en Neuquén, Neuquén, Argentina.</p>
    </footer>

</body>

</html>