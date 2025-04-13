const header = document.querySelector("header");
const footer = document.querySelector("footer");

header.innerHTML = 
    `
   <!-- Estructura en HTML -->
<nav class="Menu">
    <!-- Checkbox oculto para controlar el menú -->
    <input type="checkbox" id="menu-toggle-checkbox" class="menu-checkbox">
    <label for="menu-toggle-checkbox" class="menu-toggle">
        <img src="Activos/Imagenes/barra_nav/barra-de-menus.png" alt="Menú" class="menu-icon">
        <img src="Activos/Imagenes/barra_nav/barra-de-menu-x.png" alt="Cerrar" class="close-icon" width="32px">
    </label>
    
    <ul>
        <div class="logo-container"> 
            <a href="#Inicio"><img src="Activos/Imagenes/barra_nav/icono_barra.png" alt="Logo" width="40px"></a>
            <h2 class="Nombre_pagina">PetClub</h2>
        </div>
        <div class="contenedor_nav"><li><a href="index.html">Inicio</a></li></div>
        <div class="contenedor_nav"><li><a href="#MisMascotas">Mis Mascotas</a></li></div>
        <div class="contenedor_nav"><li><a href="#Recordatorios">Recordatorios</a></li></div>
        <div class="contenedor_nav"><li><a href="#Veterinarias">Veterinarias</a></li></div>
        <div class="contenedor_nav"><li><a href="#Consejos">Consejos</a></li></div>
        <div class="contenedor_nav"><li><a href="Login.html">Perfil</a></li></div>
        <div class="conten_input">
            <input type="text" id="buscador" placeholder="Buscar...">
            <button id="botonBuscar"><img src="Activos/Imagenes/barra_nav/lupa.svg" alt="Buscar"></button>
        </div>
    </ul>
</nav>
    `;

    footer.innerHTML =
    `
    <div class="Pie_pagina">
        <div class="pie_1">
            <h3>¿Qué ofrecemos?</h3>
            <a href="">Adopción de mascotas<br></a>
            <a href="">Tienda de accesorios<br></a>
            <a href="">Servicios veterinarios<br></a>
            <a href="">Consejos de cuidado<br></a>
        </div>

        <div class="pie_2">
            <h3>Síguenos en nuestras redes sociales</h3>
            <div class="conten_image">
                <img src="Activos/Imagenes/redes_sociales/logotipo-de-instagram.png" loading="lazy" alt="instagram">
                <img src="Activos/Imagenes/redes_sociales/logotipo-de-whatsapp.png" loading="lazy" alt="whatsapp">
                <img src="Activos/Imagenes/redes_sociales/facebook.png" loading="lazy" alt="facebook">
                <img src="Activos/Imagenes/redes_sociales/tik-tok.png" loading="lazy" alt="tiktok">
            </div>
        </div>
        <div class="pie_3">
            <h3>¿Quiénes somos?</h3>
            <a href="">Aviso legal<br></a>
            <a href="">Política de privacidad<br></a>
            <a href="">Política de cookies<br></a>
            <a href="">Contacto<br></a>   
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

