document.addEventListener('DOMContentLoaded', () => {
    const contenedor = document.querySelector('.galeria-contenedor');
    const items = document.querySelectorAll('.galeria-item');
    const anchoItem = items[0].offsetWidth + 24; // Ancho + gap
    
    // Clonar elementos para efecto infinito
    const clonesInicio = Array.from(items).slice(0, 2).map(item => item.cloneNode(true)); //(0, 2) es para los dos primeros elementos el 0 es el primero y el 1 es el segundo
    const clonesFinal = Array.from(items).slice(-2).map(item => item.cloneNode(true));
    
    contenedor.prepend(...clonesFinal); 
    contenedor.append(...clonesInicio);
    
    let indiceActual = 2;
    const velocidadCambio = 1500; // 3 segundos para la animacion de cambio de iamgenes
    let intervaloAnimacion;
    
    // Verificar el tamaño de la pantalla y ajustar el cálculo de itemActivo
    function obtenerItemActivo() {
        if (window.innerWidth <= 900) {
            return contenedor.children[indiceActual];
        } else {
            return contenedor.children[indiceActual + 2];
        }
    }

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
        const itemActivo = obtenerItemActivo();
        document.querySelectorAll('.galeria-item').forEach(item => item.classList.remove('active'));
        if(itemActivo) itemActivo.classList.add('active');
        
        indiceActual++;
    }
//LA INTENCION ES DE QUE SI EL MAUSE ESTA ARRIBA SE DETENGA LA ANIMACION
    function iniciarAnimacion() {
        intervaloAnimacion = setInterval(actualizarGaleria, velocidadCambio);
    }

    function detenerAnimacion() {
        clearInterval(intervaloAnimacion);
    }
    
    // Iniciar animación de cambio de imágenes cada x segundos
    iniciarAnimacion();

    // Detener animación al pasar el mouse sobre el contenedor
    contenedor.addEventListener('mouseenter', detenerAnimacion);

    // Reanudar animación al sacar el mouse del contenedor
    contenedor.addEventListener('mouseleave', iniciarAnimacion);
    
    // Soporte para dispositivos táctiles
    contenedor.addEventListener('touchstart', detenerAnimacion);
    contenedor.addEventListener('touchend', iniciarAnimacion);
    
    // Centrar inicialmente el primer elemento
    contenedor.style.transform = `translateX(-${2 * anchoItem}px)`;
});