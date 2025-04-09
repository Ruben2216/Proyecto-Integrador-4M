const header = document.querySelector("header");
const footer = document.querySelector("footer");

header.innerHTML = 
    `
   <!-- Estructura en HTML -->
<nav class="Menu">
    <!-- Checkbox oculto para controlar el menú -->
    <input type="checkbox" id="menu-toggle-checkbox" class="menu-checkbox">
    <label for="menu-toggle-checkbox" class="menu-toggle">
        <img src="Activos/Imagenes/barra-de-menus.png" alt="Menú" class="menu-icon">
        <img src="Activos/Imagenes/barra-de-menu-x.png" alt="Cerrar" class="close-icon" width="32px">
    </label>
    
    <ul>
        <div class="logo-container"> 
            <a href="#Inicio"><img src="Activos/Imagenes/icono_barra.png" alt="Logo" width="40px"></a>
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
            <button id="botonBuscar"><img src="Activos/Imagenes/lupa.svg" alt="Buscar"></button>
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

    document.addEventListener('DOMContentLoaded', () => {
        const contenedor = document.querySelector('.galeria-contenedor');
        const items = document.querySelectorAll('.galeria-item');
        const anchoItem = items[0].offsetWidth + 24; // Ancho + gap
        
        // Clonar elementos para efecto infinito
        const clonesInicio = Array.from(items).slice(0, 2).map(item => item.cloneNode(true)); //(0, 2) es para los dos primeros elementos el 0 es el primero y el 1 es el segundo
        const clonesFinal = Array.from(items).slice(-2).map(item => item.cloneNode(true));
        
        contenedor.prepend(...clonesFinal); // 
        contenedor.append(...clonesInicio);
        
        let indiceActual = 2;
        const velocidadCambio = 3000; // 3 segundos para la animacion de cambio de iamgenes
        
        function actualizarGaleria() {
            // Eliminar clones al final del array original para evitar que se repitan
            if(indiceActual >= items.length) { // Si el índice actual es mayor o igual al número de elementos originales
                indiceActual = 0;
                contenedor.style.transition = 'none'; // Sin transición para el reinicio
                contenedor.style.transform = `translateX(-${indiceActual * anchoItem}px)`;
                void contenedor.offsetWidth; // es para reiniciar la animación desde el principio
            }
            
            contenedor.style.transition = 'transform 0.5s ease-in-out';
            contenedor.style.transform = `translateX(-${indiceActual * anchoItem}px)`;
            
            // Actualizar clase activa
            const itemActivo = contenedor.children[indiceActual + 2];
            document.querySelectorAll('.galeria-item').forEach(item => item.classList.remove('active'));
            if(itemActivo) itemActivo.classList.add('active');
            
            indiceActual++;
        }
        
        // Iniciar animación de cambio de imágenes cada 3 segundos
        setInterval(actualizarGaleria, velocidadCambio);
        
        // Centrar inicialmente el primer elemento
        contenedor.style.transform = `translateX(-${2 * anchoItem}px)`;
    });