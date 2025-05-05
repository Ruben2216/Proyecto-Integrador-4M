const header = document.querySelector("header");
const footer = document.querySelector("footer");
let boton = document.querySelector("#bienvenida-btn");

// Disparar un evento personalizado cuando el menú se haya cargado
const menuCargadoEvent = new Event('menuCargado');

fetch('/Proyecto-Integrador-4M/Activos/BasePHP/estado_sesion.php')
    .then(res => res.json())
    .then(data => {
        let perfilBtn = '';
        let cerrarBtn = '';
        let mascotasBtn = '';

        // Detectar ruta actual
        let currentPath = window.location.pathname;
        let hash = window.location.hash;

        let activeClass = "style='text-decoration: underline; text-underline-offset: 6px; text-decoration-thickness: 3px;'";

        let inicioClass = currentPath.includes("Index.php") ? activeClass : "";
        let mascotasClass = currentPath.includes("mis_mascotas.php") || currentPath.includes("registrar_mascota.php") ? activeClass : "";
        let perfilClass = currentPath.includes("perfil.php") ? activeClass : "";
        let recordatoriosClass = currentPath.includes("recordatorios") || currentPath.includes("editar_recordatorio.php") || currentPath.includes("nuevo_recordatorio.php") || currentPath.includes("actividades.php") ? activeClass : "";

        // detectar los consejos en la nav
        let consejoClass = (
            currentPath.includes("consejos") ||
            currentPath.includes("consejo1.html") ||
            currentPath.includes("consejo2.html") ||
            currentPath.includes("consejo3.html") ||
            currentPath.includes("consejo4.html") ||
            (currentPath.includes("Index.php") && hash === "#consejos")
        ) ? activeClass : "";

        if (data.autenticado) {
            perfilBtn = `<div class="contenedor-nav"><li><a href="/Proyecto-Integrador-4M/Activos/BasePHP/perfil.php" ${perfilClass}>Yo (${data.nombre})</a></li></div>`;
            cerrarBtn = `<div class="contenedor-nav"><li><a href="/Proyecto-Integrador-4M/Activos/BasePHP/logout.php">Cerrar sesión</a></li></div>`;
            mascotasBtn = `<div class="contenedor-nav"><li><a href="/Proyecto-Integrador-4M/Activos/BasePHP/mis_mascotas.php" ${mascotasClass}>Mis Mascotas</a></li></div>`;

            if (document.getElementById("nombre-usuario")) {
                document.getElementById("nombre-usuario").innerHTML = "Hola, " + 
                    `<span style='color: green; font-weight: bold;'>${data.nombre}</span>` +
                    "<br>¡Bienvenido a PetClub! 🐾✨¡Estamos felices de tenerte aquí! 🐶";
            }

            if (boton) {
                boton.disabled = false;
                boton.click(); // abre
                setTimeout(() => boton.click(), 2000); // cierra
            }
        } else {
            perfilBtn = `<div class="contenedor-nav contenedor-nav__login"><li><a href="/Proyecto-Integrador-4M/Login.php">Login</a></li></div>`;
            mascotasBtn = `<div class="contenedor-nav"><li><a href="/Proyecto-Integrador-4M/Login.php?redirect_to=Activos/BasePHP/mis_mascotas.php">Mis Mascotas</a></li></div>`;
        }

        header.innerHTML = 
        `
        <nav class="Menu">
            <input type="checkbox" id="menu-toggle-checkbox" class="menu-checkbox">
            <label for="menu-toggle-checkbox" class="menu-toggle">
                <img src="/Proyecto-Integrador-4M/Activos/Imagenes/barra_nav/barra-de-menus.png" alt="Menú" class="menu-icon">
                <img src="/Proyecto-Integrador-4M/Activos/Imagenes/barra_nav/barra-de-menu-x.png" alt="Cerrar" class="close-icon" width="32px">
            </label>
            <ul>
                <div class="logo-container"> 
                    <a href="/Proyecto-Integrador-4M/Index.php"><img src="/Proyecto-Integrador-4M/Activos/Imagenes/barra_nav/icono_barra.png" alt="Logo" width="40px"></a>
                    <h2 class="Nombre_pagina">PetClub</h2>
                </div>
                <div class="contenedor-nav"><li><a href="/Proyecto-Integrador-4M/Index.php" ${inicioClass}>Inicio</a></li></div> 
                ${mascotasBtn}
                <div class="contenedor-nav"><li><a href="/Proyecto-Integrador-4M/Activos/BasePHP/recordatorios.php" ${recordatoriosClass}>Recordatorios</a></li></div>
                <div class="contenedor-nav"><li><a href="/Proyecto-Integrador-4M/Index.php#mapa__titulo">Veterinarias</a></li></div>
                <div class="contenedor-nav"><li><a href="/Proyecto-Integrador-4M/Index.php#consejos" ${consejoClass}>Consejos</a></li></div>
                ${perfilBtn}
                ${cerrarBtn}
                <div class="conten-input">
                    <div class="conten-input__hijo">
                        <input type="text" id="buscador" placeholder="Buscar...">
                        <button id="botonBuscar">
                            <img src="/Proyecto-Integrador-4M/Activos/Imagenes/barra_nav/lupa.svg" alt="Buscar">
                        </button>
                    </div>
                </div>
            </ul>
        </nav>
        `;

        // Disparar el evento personalizado
        document.dispatchEvent(menuCargadoEvent);
    });

// Mostrar footer solo en páginas permitidas
if (
    !window.location.pathname.includes("mis_mascotas.php") &&
    !window.location.pathname.includes("perfil.php") &&
    !window.location.pathname.includes("recordatorios.php") &&
    !window.location.pathname.includes("actividades.php") &&
    !window.location.pathname.includes("registrar_mascota.php")
) {
    footer.innerHTML = `
    <div class="Pie_pagina">
        <div class="pie_1">
            <h3>¿Qué ofrecemos?</h3>
            <a href="pagina_404.html">Adopción de mascotas<br></a>
            <a href="pagina_404.html">Tienda de accesorios<br></a>
            <a href="pagina_404.html">Servicios veterinarios<br></a>
            <a href="pagina_404.html">Consejos de cuidado<br></a>
        </div>
        <div class="pie_2">
            <h3>Síguenos en nuestras redes sociales</h3>
            <div class="conten_image">
                <img src="/Proyecto-Integrador-4M/Activos/Imagenes/redes_sociales/logotipo-de-instagram.png" alt="instagram">
                <img src="/Proyecto-Integrador-4M/Activos/Imagenes/redes_sociales/logotipo-de-whatsapp.png" alt="whatsapp">
                <img src="/Proyecto-Integrador-4M/Activos/Imagenes/redes_sociales/facebook.png" alt="facebook">
                <img src="/Proyecto-Integrador-4M/Activos/Imagenes/redes_sociales/tik-tok.png" alt="tiktok">
            </div>
        </div>
        <div class="pie_3">
            <h3>¿Quiénes somos?</h3>
            <a href="pagina_404.html">Aviso legal<br></a>
            <a href="pagina_404.html">Política de privacidad<br></a>
            <a href="pagina_404.html">Política de cookies<br></a>
            <a href="pagina_404.html">Contacto<br></a>   
        </div>
        <div class="pie_3">
            <h3>¿Dónde estamos?</h3>
            <p>Calle 456, Colonia Mascotas, Ciudad Animal, Estado Z, México<br></p>
            <p>Teléfono: 9611234567<br></p>
            <p>Correo: contacto@mascotasfelices.com</p>
        </div>
        <p class="Texto_centrado">© 2025 Mascotas Felices. Todos los derechos reservados.</p>
    </div>
    `;
}
