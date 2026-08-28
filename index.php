<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G.E.R.M. Servicios en Informática</title>
    <!-- Hoja de estilos en CSS (Cascading Style Sheets) -->
    <link rel="stylesheet" href="index.css">
</head>

<body>

    <div id="intro-container" class="intro-container">
        <video id="intro-video" class="intro-video" autoplay muted playsinline>
            <source src="logo.mp4" type="video/mp4">
        </video>
    </div>

    <!-- Fondo de video cibernético -->
    <div class="video-background-container">
        <iframe

            <?php
            $seleccion = random_int(1, 2); // Devuelve un número entre 1 y 10
            switch ($seleccion) {
                case '1':
                    $video = "Wnagw1bEhBY";
                    break;
                case '2':
                    $video = "ooee9p4P_Eg";
                    //Blue Matrix Code Rain
                    break;
                case '3':
                    $video = "Tvo8tjPqVg0";
                    //Cyber Ambient for Deep Work | AI Systems Optimization Lab
                    break;
                case '4':
                    $video = "Spl_AtO4bho";
                    //Cyber Ambient for Deep Work | Data Fusion Center
                    break;
                case '5':
                    $video = "Okb1TjsZlm0";
                    //Network Connection Background Video, Plexus Dot Connection Background Loop
                    break;
                case '6':
                    $video = "qrs6PPQznaA";
                    //Stargate Atlantis Pegasus Gate Diagnostic
                    break;

                case '7':
                    $video = "Spl_AtO4bho";
                    //Sci- Fi Hacker Background Hud Blue 4K
                    break;

                case '8':
                    $video = "9HaU8NjH7bI";
                    //Background technology world loop
                    break;

                case '9':
                    $video = "s9xk77X4m5c";
                    //Greeny Plexus Background Loop Footage
                    break;

                case '10':
                    $video = "mbLbhWCYX3M";
                    //Greeny Plexus Background Loop Footage
                    break;
                case '11':
                    $video = "PqSq7tM-U0E";
                    //UNIDAD 09: SISTEMAS EN LÍNEA | Cyberpunk  Synthwave  Retrowave
                    break;
                case '12':
                    $video = "5jyGhAbudgw";
                    //Ecos de Mundos Distantes
                    break;
                case '13':
                    $video = "M8UdxpCgLys";
                    //Cinematic Journey to an Ocean Planet
                    break;
                default:
                    $video = "s9xk77X4m5c";
                    //Cyber Ambient for Deep Work | Data Fusion Center
            }

            $video = "Okb1TjsZlm0";


            ?>

            src="https://www.youtube.com/embed/<?= $video ?>?autoplay=1&mute=1&loop=1&playlist=<?= $video ?>&controls=0&showinfo=0&rel=0&modestbranding=1&iv_load_policy=3&vq=hd2160&start=8&end=1224"
            frameborder="0"
            allow="autoplay; encrypted-media"
            referrerpolicy="strict-origin-when-cross-origin"
            allowfullscreen>
        </iframe>
    </div>

    <div class="overlay-div-dashboard">

        <!-- Header superior -->

        <header class="dashboard-header-bar">
            <div class="header-content-wrapper">
                <img src="logo.png" alt="Logo G.E.R.M." class="header-logo">
                <div class="header-titles-container">
                    <h1 class="header-title">G.E.R.M. Servicios en Informática</h1>
                    <div class="header-breadcrumb">Neuquén y alrededores</div>
                </div>
            </div>
            <nav class="nav-links">
                <a href="#home">Inicio</a>
                <a href="#conectividad">Conectividad</a>
                <a href="#soporte">Soporte</a>
                <a href="#contenido-ia">Contenido IA</a>
                <a href="#desarrollo">Desarrollo</a>
                <a href="#contacto">Contacto</a>
            </nav>
        </header>

        <!-- Contenedor de tarjetas estilo dashboard -->
        <main class="dashboard-body-container">

            <section id="home" class="data-card home">

                <div class="card-content">

                <img src="banner.png" alt="Banner G.E.R.M." class="banner-img">

                                <h3 class="box-title">Soluciones tecnológicas integrales para potenciar tu operación.</h3>

                    <p>En G.E.R.M. Soluciones Informáticas nos especializamos en ofrecer soporte técnico y respuestas a medida para hogares y empresas en Neuquén. Nuestro compromiso es garantizar que cada dispositivo y sistema funcione con la máxima eficiencia, asegurando la continuidad de tus operaciones y la protección integral de tu información.

Contamos con amplia trayectoria en el sector, abarcando desde el mantenimiento de hardware y la implementación de redes seguras hasta el desarrollo de software personalizado. Cada proyecto se aborda con un enfoque riguroso, orientado a resultados y adaptado a los requerimientos específicos de cada cliente.

Nuestro objetivo es claro: que la tecnología trabaje a tu favor, ofreciendo la seguridad y tranquilidad necesarias para que puedas centrarte por completo en hacer crecer tu negocio o disfrutar de tu hogar.</p>

                </div>
            </section>

            <section id="conectividad" class="data-card">
                <h3 class="box-title">Conectividad & Seguridad</h3>
                <div class="card-content">
                    <p>📶 Instalación de redes WIFI (Wireless Fidelity) y LAN (Local Area Network).</p>
                    <p>📷 Instalación y configuración de cámaras de seguridad y sistemas de alarmas.</p>
                </div>
            </section>

            <section id="soporte" class="data-card">
                <h3 class="box-title">Soporte Hardware & Software</h3>
                <div class="card-content">
                    <p>🛠️ Reparación, actualización e instalación de Hardware y Software para PC (Personal Computer) y Notebooks.</p>
                    <p>🛡️ Mantenimiento preventivo y limpieza profunda de Virus / Antivirus.</p>
                </div>
            </section>

            <section id="contenido-ia" class="data-card">
                <h3 class="box-title">Creación de Contenido con IA (Inteligencia Artificial)</h3>
                <div class="card-content">
                    <p>🎬 Videos Dinámicos y edición profesional con IA (Inteligencia Artificial).</p>
                    <p>🎨 Diseño Gráfico: Flyers (Folletos digitales) y piezas publicitarias.</p>
                    <p>📸 Laboratorio Digital: Restauración de fotos y mejoras con IA (Inteligencia Artificial).</p>
                </div>
            </section>

            <section id="desarrollo" class="data-card">
                <h3 class="box-title">Desarrollo De Software</h3>
                <div class="card-content">
                    <p>🌐 Creación de páginas web y plataformas de gestión personalizadas.</p>
                    <p>📈 Desarrollo de sistemas a medida para optimizar tus procesos.</p>
                </div>
            </section>

            <section id="contacto" class="data-card">
                <h3 class="box-title">Contacto</h3>
                <div class="card-content">
                    <p>📍 Neuquén y alrededores.</p>
                    <p>📞 Contáctanos hoy mismo: <strong>2994658199</strong></p>
                </div>
            </section>

        </main>
    </div>


    <!-- Script en JS (JavaScript) -->
    <script src="index.js"></script>
</body>

</html>

<?php
// index.php: Estructura principal con la estética institucional de alta tecnología (High-Tech)


include('/_form.js');

?>