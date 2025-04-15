const header = document.querySelector("header");
const footer = document.querySelector("footer");
let boton =document.querySelector("#bienvenida-btn");

// Obtener el estado de la sesión
fetch('/Proyecto-Integrador-4M/Activos/BasePHP/estado_sesion.php')

   

    .then(res => res.json())
    .then(data => {
       
        let perfilBtn = '';
        let cerrarBtn = '';

        if (data.autenticado) { 

            perfilBtn = `<div class="contenedor_nav"><li><a href="/Proyecto-Integrador-4M/Activos/BasePHP/perfil.php">Yo (${data.nombre})</a></li></div>`;
            cerrarBtn = `<div class="contenedor_nav"><li><a href="/Proyecto-Integrador-4M/Activos/BasePHP/logout.php">Cerrar sesión</a></li></div>`;

            document.getElementById("nombre-usuario").innerHTML = "Hola, " + "<span style='color: green; font-weight: bold;'>" + data.nombre + "</span>" + "<br>" + "¡Bienvenido a PetClub! 🐾✨¡Estamos felices de tenerte aquí! 💖";
            if (boton) {
                boton.disabled = false;
                boton.click(); // Esto activa el popover inmediatamente
                console.log("Botón de bienvenida activado y clic simulado");

                //simulacion de tiempo despues del clic
                const tiempo = 2000;
                setTimeout(function() {
                    boton.click();
                }, tiempo);
            }

        } else {
            perfilBtn = `<div class="contenedor_nav"><li><a href="/Proyecto-Integrador-4M/Login.php">Login</a></li></div>`;
        }

        header.innerHTML = 
        `
        <!-- Estructura en HTML -->
        <nav class="Menu">
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
                <div class="contenedor_nav"><li><a href="Index.html">Inicio</a></li></div> 
                <div class="contenedor_nav"><li><a href="#MisMascotas">Mis Mascotas</a></li></div>
                <div class="contenedor_nav"><li><a href="#Recordatorios">Recordatorios</a></li></div>
                <div class="contenedor_nav"><li><a href="#mapa__titulo">Veterinarias</a></li></div>
                <div class="contenedor_nav"><li><a href="#Consejos">Consejos</a></li></div>
                ${perfilBtn}
                ${cerrarBtn}
                <div class="conten_input">
                    <input type="text" id="buscador" placeholder="Buscar...">
                    <button id="botonBuscar"><img src="Activos/Imagenes/barra_nav/lupa.svg" alt="Buscar"></button>
                </div>
            </ul>
        </nav>
        `;
    });

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

