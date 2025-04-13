document.addEventListener('DOMContentLoaded', () => { 
    const contenedor = document.querySelector('.galeria-contenedor'); 
    const items = document.querySelectorAll('.galeria-item'); 
    const gap = 24; // El mismo espacio (gap) entre ítems usado en el CSS
    let anchoItem = items[0].offsetWidth + gap; // Ancho + gap

    const numClones = 3; // Número de clones que se crean a cada lado para lograr el efecto infinito

    // Clonar los primeros y últimos elementos para permitir desplazamiento infinito
    const clonesInicio = Array.from(items).slice(0, numClones).map(item => item.cloneNode(true)); // Clona los primeros 3
    const clonesFinal = Array.from(items).slice(-numClones).map(item => item.cloneNode(true)); // Clona los últimos 3

    contenedor.prepend(...clonesFinal); 
    contenedor.append(...clonesInicio); 

    let indiceActual = numClones; // Comienza desde el primer ítem real (después de los clones del inicio)
    const velocidadCambio = 1500; // Intervalo de cambio automático en milisegundos (1.5s)
    let intervaloAnimacion;
    const todosLosItems = contenedor.children; 

    // Calcula el desplazamiento necesario para centrar el ítem activo
    function obtenerOffset() {
        return (window.innerWidth / 2) - (anchoItem / 2); // Centra en pantalla
    }

    // Mueve la galería hasta el ítem actual, manteniéndolo centrado
    function moverGaleria() {
        const offset = obtenerOffset();
        contenedor.style.transform = `translateX(${-indiceActual * anchoItem + offset}px)`; 
    }

    // Marca el ítem actual como activo (resalta)
    function actualizarClaseActiva() {
        Array.from(todosLosItems).forEach(item => item.classList.remove('active')); 
        if (todosLosItems[indiceActual]) {
            todosLosItems[indiceActual].classList.add('active'); 
        }
    }

    // Avanza la galería automáticamente
    function actualizarGaleria() {
        const offset = obtenerOffset();

        contenedor.style.transition = 'transform 0.5s ease-in-out'; // Aplica transición suave
        indiceActual++; // Avanza al siguiente ítem
        contenedor.style.transform = `translateX(${-indiceActual * anchoItem + offset}px)`; // Mueve a la nueva posición
        actualizarClaseActiva(); // Actualiza cuál está activo

        // Si llegamos al final de los ítems reales + clones
        if (indiceActual === items.length + numClones) {
            setTimeout(() => {
                contenedor.style.transition = 'none'; // Quitamos la transición para reposicionar sin que se note 
                indiceActual = numClones; // vuelve al primer item
                moverGaleria(); // se coloca en su sitio
                actualizarClaseActiva(); // marcamos como activo
            }, 500); // Se espera que termina la animacion
        }
    }

    // LA INTENCIÓN ES DE QUE SI EL MAUSE ESTÁ ARRIBA SE DETENGA LA ANIMACIÓN
    function iniciarAnimacion() {
        intervaloAnimacion = setInterval(actualizarGaleria, velocidadCambio); // Inicia el scroll automático
    }

    function detenerAnimacion() {
        clearInterval(intervaloAnimacion); // Detiene el scroll automático
    }

    // Pausar al pasar el mouse sobre la galería
    contenedor.addEventListener('mouseenter', detenerAnimacion);
    // Reanudar cuando el mouse sale
    contenedor.addEventListener('mouseleave', iniciarAnimacion);

    // Detener y reanudar en pantallas táctiles
    contenedor.addEventListener('touchstart', detenerAnimacion);
    contenedor.addEventListener('touchend', iniciarAnimacion);

    moverGaleria(); // Centrar la imagen inicial
    iniciarAnimacion(); // Iniciar animación automática

    // Si el usuario cambia el tamaño de la ventana, recalcular y centrar
    window.addEventListener('resize', () => {
        anchoItem = items[0].offsetWidth + gap; // Recalcular el ancho por si cambió
        contenedor.style.transition = 'none'; // Sin transición para evitar movimiento visual raro
        moverGaleria(); // Recentrar
    });
});
