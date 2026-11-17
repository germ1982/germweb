// presupuesto.js: Presupuestador online de G.E.R.M.
// ------------------------------------------------------------------
//  PRECIOS: editá solo esta parte. Valores en dólares (USD), solo mano de obra.
//  "desde: true" = precio mínimo, el valor final se confirma al cotizar.
// ------------------------------------------------------------------

const PRESU_CONFIG = {
    whatsapp: '5492994658199',
    // Se toma la cotización (venta) más alta del día entre estas casas de dolarapi.com
    casas: ['blue', 'bolsa', 'contadoconliqui', 'cripto'],
    // Valor de respaldo si no se puede consultar la cotización
    dolarRespaldo: 1700,
    // Redondeo de los montos en pesos (siempre hacia arriba)
    redondeo: 500
};

const PRESU_CATEGORIAS = [
    {
        titulo: '🔌 Conectividad & Seguridad',
        items: [
            { id: 'red-punto',      nombre: 'Punto de red con cableado estructurado',                     unidad: 'por punto',      usd: 20 },
            { id: 'red-router',     nombre: 'Configuración de router / punto de acceso WiFi',            unidad: 'por equipo',     usd: 15 },
            { id: 'red-mesh',       nombre: 'Instalación de repetidor o nodo mesh',                       unidad: 'por nodo',       usd: 12 },
            { id: 'red-optimizar',  nombre: 'Optimización y segmentación de red',                         unidad: 'por servicio',   usd: 30 },
            { id: 'cam-instalar',   nombre: 'Instalación de cámara de seguridad',                         unidad: 'por cámara',     usd: 25 },
            { id: 'cam-dvr',        nombre: 'Configuración de DVR/NVR + acceso remoto desde el celular', unidad: 'por sistema',    usd: 25 },
            { id: 'alarma-base',    nombre: 'Instalación de alarma (central, sirena y 2 sensores)',       unidad: 'por sistema',    usd: 60 },
            { id: 'alarma-sensor',  nombre: 'Sensor de alarma adicional',                                 unidad: 'por sensor',     usd: 10 }
        ]
    },
    {
        titulo: '🛠️ Soporte Hardware & Software',
        items: [
            { id: 'sop-diagnostico', nombre: 'Diagnóstico (se descuenta si se realiza el trabajo)',      unidad: 'por equipo',     usd: 10 },
            { id: 'sop-formateo',    nombre: 'Formateo + instalación de sistema operativo y drivers',    unidad: 'por equipo',     usd: 60 },
            { id: 'sop-backup',      nombre: 'Respaldo de datos previo al formateo',                      unidad: 'por equipo',     usd: 10 },
            { id: 'sop-software',    nombre: 'Instalación de software / programas',                       unidad: 'por programa',   usd: 5 },
            { id: 'sop-componente',  nombre: 'Instalación de componente (RAM, SSD, fuente)',              unidad: 'por componente', usd: 10 },
            { id: 'sop-clonado',     nombre: 'Clonado de disco a SSD (sin reinstalar)',                   unidad: 'por equipo',     usd: 20 },
            { id: 'sop-pantalla',    nombre: 'Cambio de pantalla de notebook',                            unidad: 'por equipo',     usd: 25 },
            { id: 'sop-limpieza-pc', nombre: 'Limpieza física profunda de PC de escritorio',              unidad: 'por equipo',     usd: 20 },
            { id: 'sop-limpieza-nb', nombre: 'Limpieza de notebook + cambio de pasta térmica',            unidad: 'por equipo',     usd: 30 },
            { id: 'sop-virus',       nombre: 'Eliminación de virus/malware + configuración de antivirus', unidad: 'por equipo',     usd: 20 },
            { id: 'sop-optimizar',   nombre: 'Optimización de rendimiento',                               unidad: 'por equipo',     usd: 15 },
            { id: 'sop-visita',      nombre: 'Visita a domicilio (Neuquén capital)',                      unidad: 'por visita',     usd: 10 },
            { id: 'sop-remoto',      nombre: 'Soporte remoto',                                            unidad: 'por hora',       usd: 12 }
        ]
    },
    {
        titulo: '🤖 Contenido con IA',
        items: [
            { id: 'ia-video',        nombre: 'Video dinámico para redes (hasta 60 s)',                    unidad: 'por video',      usd: 30 },
            { id: 'ia-flyer',        nombre: 'Flyer / pieza gráfica para redes',                          unidad: 'por pieza',      usd: 12 },
            { id: 'ia-video-fotos',  nombre: 'Video emotivo o comercial con tus fotos',                   unidad: 'por video',      usd: 40 },
            { id: 'ia-restauracion', nombre: 'Restauración de foto antigua',                              unidad: 'por foto',       usd: 6 },
            { id: 'ia-escaneo',      nombre: 'Escaneo + mejora de calidad (upscaling)',                   unidad: 'por foto',       usd: 3 },
            { id: 'ia-pack',         nombre: 'Pack mensual de contenido para redes (8 piezas)',           unidad: 'por mes',        usd: 80 }
        ]
    },
    {
        titulo: '💻 Desarrollo de Software',
        items: [
            { id: 'dev-landing',     nombre: 'Página web institucional / landing',                        unidad: 'proyecto',       usd: 200, desde: true },
            { id: 'dev-catalogo',    nombre: 'Catálogo online',                                           unidad: 'proyecto',       usd: 300, desde: true },
            { id: 'dev-plataforma',  nombre: 'Plataforma de gestión a medida',                            unidad: 'proyecto',       usd: 600, desde: true },
            { id: 'dev-api',         nombre: 'Integración con API (WhatsApp, redes, pagos)',              unidad: 'por integración', usd: 100, desde: true },
            { id: 'dev-hora',        nombre: 'Hora de desarrollo / automatización',                       unidad: 'por hora',       usd: 18 },
            { id: 'dev-hosting',     nombre: 'Hosting + mantenimiento mensual',                           unidad: 'por mes',        usd: 30 }
        ]
    }
];

// ------------------------------------------------------------------
//  LÓGICA (no hace falta tocar nada de acá para abajo)
// ------------------------------------------------------------------

(function () {
    const lista = document.getElementById('presu-lista');
    if (!lista) return;

    const elDolar = document.getElementById('presu-dolar');
    const elResumen = document.getElementById('presu-resumen');
    const seleccion = new Map(); // id -> cantidad
    const itemsPorId = new Map();
    let dolar = PRESU_CONFIG.dolarRespaldo;
    let dolarFecha = null;

    const fmtARS = new Intl.NumberFormat('es-AR', { style: 'currency', currency: 'ARS', maximumFractionDigits: 0 });
    const fmtUSD = n => 'USD ' + new Intl.NumberFormat('es-AR', { maximumFractionDigits: 2 }).format(n);
    const aPesos = usd => Math.ceil((usd * dolar) / PRESU_CONFIG.redondeo) * PRESU_CONFIG.redondeo;

    // --- Armado de la lista ---
    PRESU_CATEGORIAS.forEach((cat, i) => {
        const det = document.createElement('details');
        det.className = 'presu-cat';
        if (i === 0) det.open = true;

        const sum = document.createElement('summary');
        sum.innerHTML = `<span>${cat.titulo}</span><span class="presu-cat-count" data-cat="${i}"></span>`;
        det.appendChild(sum);

        cat.items.forEach(item => {
            itemsPorId.set(item.id, { ...item, cat: i });
            const fila = document.createElement('div');
            fila.className = 'presu-item';
            fila.innerHTML = `
                <label class="presu-check">
                    <input type="checkbox" data-id="${item.id}">
                    <span class="presu-nombre">${item.nombre}<small>${item.unidad}</small></span>
                </label>
                <label class="presu-cant-wrap">
                    <span>Cant.</span>
                    <input type="number" class="presu-cant" data-id="${item.id}" min="1" max="99" value="1" disabled aria-label="Cantidad">
                </label>
                <span class="presu-precio" data-id="${item.id}"></span>`;
            det.appendChild(fila);
        });
        lista.appendChild(det);
    });

    // --- Eventos ---
    lista.addEventListener('change', e => {
        const id = e.target.dataset.id;
        if (!id) return;
        const cant = lista.querySelector(`.presu-cant[data-id="${id}"]`);
        if (e.target.type === 'checkbox') {
            cant.disabled = !e.target.checked;
            e.target.closest('.presu-item').classList.toggle('activo', e.target.checked);
            if (e.target.checked) seleccion.set(id, leerCantidad(cant));
            else seleccion.delete(id);
        } else if (seleccion.has(id)) {
            seleccion.set(id, leerCantidad(cant));
        }
        actualizar();
    });

    lista.addEventListener('input', e => {
        if (e.target.classList.contains('presu-cant') && seleccion.has(e.target.dataset.id)) {
            seleccion.set(e.target.dataset.id, leerCantidad(e.target, false));
            actualizar();
        }
    });

    function leerCantidad(input, corregir = true) {
        let n = parseInt(input.value, 10);
        if (!Number.isFinite(n) || n < 1) n = 1;
        if (n > 99) n = 99;
        if (corregir) input.value = n;
        return n;
    }

    // --- Cálculo y resumen ---
    function actualizar() {
        // Precios unitarios de cada ítem
        itemsPorId.forEach((item, id) => {
            const el = lista.querySelector(`.presu-precio[data-id="${id}"]`);
            el.innerHTML = `${item.desde ? '<em>desde</em> ' : ''}${fmtUSD(item.usd)}<b>${fmtARS.format(aPesos(item.usd))}</b>`;
        });

        // Contador por categoría
        const porCat = {};
        seleccion.forEach((_, id) => { const c = itemsPorId.get(id).cat; porCat[c] = (porCat[c] || 0) + 1; });
        lista.querySelectorAll('.presu-cat-count').forEach(el => {
            const n = porCat[el.dataset.cat] || 0;
            el.textContent = n ? `${n} seleccionado${n > 1 ? 's' : ''}` : '';
        });

        // Totales
        let totalUSD = 0, totalARS = 0, hayDesde = false;
        const lineas = [];
        seleccion.forEach((cant, id) => {
            const item = itemsPorId.get(id);
            const usd = item.usd * cant;
            const ars = aPesos(item.usd) * cant;
            totalUSD += usd;
            totalARS += ars;
            if (item.desde) hayDesde = true;
            lineas.push(`• ${item.nombre} x${cant}${item.desde ? ' (desde)' : ''}: ${fmtUSD(usd)} / ${fmtARS.format(ars)}`);
        });

        if (!seleccion.size) {
            elResumen.innerHTML = `<p class="presu-vacio">Marcá los trabajos que necesitás para ver el total estimado.</p>`;
            return;
        }

        elResumen.innerHTML = `
            <div class="presu-totales">
                <div><span>Trabajos</span><strong>${seleccion.size}</strong></div>
                <div><span>Total en dólares</span><strong>${hayDesde ? 'desde ' : ''}${fmtUSD(totalUSD)}</strong></div>
                <div class="presu-total-ars"><span>Total en pesos</span><strong>${hayDesde ? 'desde ' : ''}${fmtARS.format(totalARS)}</strong></div>
            </div>
            ${hayDesde ? '<p class="presu-nota">Incluye proyectos "desde": el total es un valor mínimo a confirmar.</p>' : ''}
            <div class="presu-acciones">
                <a class="portfolio-btn presu-wsp" target="_blank" rel="noopener">💬 Pedir este presupuesto por WhatsApp</a>
                <button type="button" class="presu-limpiar">Limpiar</button>
            </div>`;

        const fecha = (dolarFecha || new Date()).toLocaleDateString('es-AR');
        const msg = `¡Hola G.E.R.M.! Quiero pedir un presupuesto:\n\n${lineas.join('\n')}\n\n` +
            `Total estimado: ${hayDesde ? 'desde ' : ''}${fmtUSD(totalUSD)} / ${fmtARS.format(totalARS)}\n` +
            `(Cotización US$1 = ${fmtARS.format(dolar)} del ${fecha})`;
        elResumen.querySelector('.presu-wsp').href = `https://wa.me/${PRESU_CONFIG.whatsapp}?text=${encodeURIComponent(msg)}`;
        elResumen.querySelector('.presu-limpiar').addEventListener('click', limpiar);
    }

    function limpiar() {
        seleccion.clear();
        lista.querySelectorAll('input[type="checkbox"]').forEach(c => { c.checked = false; });
        lista.querySelectorAll('.presu-cant').forEach(c => { c.value = 1; c.disabled = true; });
        lista.querySelectorAll('.presu-item.activo').forEach(f => f.classList.remove('activo'));
        actualizar();
    }

    function mostrarDolar(respaldo) {
        const fecha = dolarFecha ? ` · actualizada ${dolarFecha.toLocaleDateString('es-AR')} ${dolarFecha.toLocaleTimeString('es-AR', { hour: '2-digit', minute: '2-digit' })}` : '';
        elDolar.innerHTML = respaldo
            ? `💵 Cotización de referencia: US$1 = <strong>${fmtARS.format(dolar)}</strong>`
            : `💵 Cotización del día: US$1 = <strong>${fmtARS.format(dolar)}</strong>${fecha}`;
    }

    // --- Cotización del día ---
    actualizar();
    mostrarDolar(true);

    fetch('https://dolarapi.com/v1/dolares')
        .then(r => { if (!r.ok) throw new Error(r.status); return r.json(); })
        .then(datos => {
            const validas = datos.filter(d => PRESU_CONFIG.casas.includes(d.casa) && d.venta > 0);
            if (!validas.length) throw new Error('sin cotizaciones');
            const mejor = validas.reduce((a, b) => (b.venta > a.venta ? b : a));
            dolar = mejor.venta;
            dolarFecha = new Date(mejor.fechaActualizacion);
            mostrarDolar(false);
            actualizar();
        })
        .catch(() => mostrarDolar(true));
})();
