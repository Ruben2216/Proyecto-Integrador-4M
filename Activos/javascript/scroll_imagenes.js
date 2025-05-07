document.addEventListener('DOMContentLoaded', () => { 
    const contenedor = document.querySelector('.galeria__contenedor'); 
    const items = document.querySelectorAll('.galeria__item'); 
    const gap = 24; // El mismo espacio (gap) entre ítems usado en el CSS
    let anchoItem = items[0].offsetWidth + gap; // Ancho + gap

    const numClones = 3; // Número de clones que se crean a cada lado para lograr el efecto infinito

    // Clonar los primeros y últimos elementos para permitir desplazamiento infinito
    const clonesInicio = Array.from(items).slice(0, numClones).map(item => item.cloneNode(true));
    const clonesFinal = Array.from(items).slice(-numClones).map(item => item.cloneNode(true));

    contenedor.prepend(...clonesFinal); 
    contenedor.append(...clonesInicio); 

    let indiceActual = numClones; 
    const velocidadCambio = 1500; 
    let intervaloAnimacion;
    const todosLosItems = contenedor.children; 

    function obtenerOffset() {
        return (window.innerWidth / 2) - (anchoItem / 2); 
    }

    function moverGaleria() {
        const offset = obtenerOffset();
        contenedor.style.transform = `translateX(${-indiceActual * anchoItem + offset}px)`; 
    }

    function actualizarClaseActiva() {
        Array.from(todosLosItems).forEach(item => item.classList.remove('active')); 
        if (todosLosItems[indiceActual]) {
            todosLosItems[indiceActual].classList.add('active'); 
        }
    }

    function actualizarGaleria() {
        const offset = obtenerOffset();
        contenedor.style.transition = 'transform 0.5s ease-in-out'; 
        indiceActual++; 
        contenedor.style.transform = `translateX(${-indiceActual * anchoItem + offset}px)`; 
        actualizarClaseActiva(); 

        if (indiceActual === items.length + numClones) {
            setTimeout(() => {
                contenedor.style.transition = 'none'; 
                indiceActual = numClones; 
                moverGaleria(); 
                actualizarClaseActiva(); 
            }, 500); 
        }
    }

    function iniciarAnimacion() {
        intervaloAnimacion = setInterval(actualizarGaleria, velocidadCambio); 
    }

    function detenerAnimacion() {
        clearInterval(intervaloAnimacion); 
    }

    // Hover individual por cada tarjeta
    Array.from(todosLosItems).forEach((item) => {
        item.addEventListener('mouseenter', () => {
            detenerAnimacion();
            Array.from(todosLosItems).forEach(it => it.classList.remove('active'));
            item.classList.add('active');
        });

        item.addEventListener('mouseleave', () => {
            Array.from(todosLosItems).forEach(it => it.classList.remove('active'));
            actualizarClaseActiva(); 
            iniciarAnimacion();
        });
    });

    // Iniciar animación y centrar al cargar
    moverGaleria(); 
    iniciarAnimacion(); 

    window.addEventListener('resize', () => {
        anchoItem = items[0].offsetWidth + gap; 
        contenedor.style.transition = 'none'; 
        moverGaleria(); 
    });
});
