const header = document.querySelector("header");
const footer = document.querySelector("footer");

header.innerHTML = 
    `
    <nav class="Menu">
        
        <ul>
            <div class="logo-container"> 
                <a href="#Inicio"><img src="Activos/Imagenes/icono_barra.png" alt="Logo" width="40px"></a>
                <h2 class="Nombre_pagina">PetClub</h2>
            </div>
            <li><a href="index.html">Inicio</a></li>
            <li><a href="#Indice">Indice</a></li>
            <li><a href="Login.html">Iniciar sesión</a></li>
            <li><a href="Contacto.html">Contacto</a></li>
            <div class="conten_input">
                <input type="text" id="buscador" placeholder="Buscar...">
                <button id="botonBuscar"><img src="Activos/Imagenes/lupa.svg" alt="Buscar"></button>
            </div>
        </ul>
    </nav>
    `;

footer.innerHTML =
    `
    <footer class="Pie_pagina">
        <div class="pie_1">
            <h3>¿Qué hacemos?</h3>
            <a href="">Recetas de postres<br></a>
            <a href="">Tienda online<br></a>
            <a href="">Marketing digital <br></a>
            <a href="">Servicios web <br></a>
        </div>

        <div class="pie_2">
            <h3>Siguenos en nuestras redes sociales</h3>
            <div class="conten_image">
                <img src="Activos/Imagenes/redes_sociales/instagram.png" loading="lazy" alt="instagram">
                <img src="Activos/Imagenes/redes_sociales/whatsapp.png" loading="lazy" alt="whatsapp">
                <img src="Activos/Imagenes/redes_sociales/facebook-logo.png" loading="lazy" alt="facebook">
                <img src="Activos/Imagenes/redes_sociales/twitter.png" loading="lazy" alt="x/twitter">
            </div>
        </div>
        <div class="pie_3">
            <h3>¿Quiénes somos?</h3>
            <a href="">Aviso legal <br></a>
            <a href="">Política de privacidad <br></a>
            <a href="">Política de cookies <br></a>
            <a href="">Contacto <br></a>   
        </div>
        <div class="pie_3">
            <h3>¿Dónde estamos?</h3>
            <p>Calle 123, Colonia X, Ciudad Y, Estado Z, México <br></p>
            <p href="">Teléfono: 9612215796 <br></p>
            <p href="">Correo: rubenclemente221@gmail.com</p>
        </div>

        <p class="Texto_centrado">© 2025 Cocina Fácil. Todos los derechos reservados.</p>
    </footer>`  ;
