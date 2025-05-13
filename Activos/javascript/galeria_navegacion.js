const cardsWrapper = document.getElementById('cardsWrapper');
const leftButton = document.getElementById('leftButton');
const rightButton = document.getElementById('rightButton');

// Pool de contenido para las tarjetas
const cardContent = [
    { href: 'consejo1.html', imageUrl:'Activos/Imagenes/consejos/como-saber-si-mi-cachorro-tiene-fiebre.jpg', text: 'Cómo saber si mi cachorro tiene fiebre: Guía para detectar síntomas y...' },
    { href: 'consejo2.html', imageUrl: 'Activos/Imagenes/consejos/Mi-perro-tiene-una-herida-en-carne-viva-que-hago.jpg', text: 'Mi perro tiene una herida en carne viva ¿cómo proceder?' },
    { href: 'consejo3.html', imageUrl: 'Activos/Imagenes/consejos/perro-temblando.jpeg', text: 'Mi perro tiembla: Causas más comunes' },
    { href: 'consejo4.html', imageUrl: 'Activos//Imagenes/consejos/perro-noble-mirando-otro-lado-espacio-copia_23-2148366957.avif', text: 'Guía definitiva para cuidar las articulaciones de un perro' },
    { href: '', imageUrl: 'https://www.laclinicaveterinaria.com/wp-content/uploads/2022/02/Captura-de-pantalla-2022-02-02-a-las-13.49.23_resultado-scaled.webp', text: 'Entendiendo el comportamiento de tu gato' },
    { href: '', imageUrl: 'Activos/Imagenes/consejos/vacunas-para-perros-768x512.jpg', text: 'La importancia de la vacunación en mascotas' },
    { href: '', imageUrl: 'Activos/Imagenes/consejos/primeros-auxilios-perros.jpg', text: 'Primeros auxilios para mascotas' },
    { href: '', imageUrl: 'Activos/Imagenes/consejos/nutricion-del-perro.jpg', text: 'Alimentación saludable para perros' },
    { href: '', imageUrl: 'Activos/Imagenes/consejos/como_educar_a_un_cachorro_21092_orig.jpg.webp', text: 'Cómo entrenar a tu cachorro' },
    { href: '', imageUrl: 'Activos/Imagenes/consejos/pet-adoption.jpg', text: 'Beneficios de adoptar una mascota' },
];

let currentIndex = 0; // Índice del primer elemento visible en el pool de contenido
const cardsToShow = 4; // Número de tarjetas visibles a la vez
const totalCardsInDOM = 6; // Número total de elementos <a> en el DOM (para permitir la transición)

// Función para crear un elemento de tarjeta (<a>) con la nueva estructura
function createCardElement(content) {
    const a = document.createElement('a');
    a.href = content.href;
    a.classList.add('tarjeta');

    const imagenDiv = document.createElement('div');
    imagenDiv.classList.add('tarjeta__imagen');

    const img = document.createElement('img');
    img.src = content.imageUrl;
    img.alt = content.text;

    imagenDiv.appendChild(img);

    const tituloH3 = document.createElement('h3');
    tituloH3.classList.add('tarjeta__titulo');
    tituloH3.textContent = content.text;

    a.appendChild(imagenDiv);
    a.appendChild(tituloH3);

    return a;
}

// Función para inicializar los elementos de tarjeta en el DOM (se llama solo al inicio)
function initializeCards() {
    cardsWrapper.innerHTML = ''; // Limpiar el contenedor actual

    // Crear y añadir los 6 elementos de tarjeta iniciales al DOM
    for (let i = 0; i < totalCardsInDOM; i++) {
        const card = createCardElement({ href: '#', imageUrl: '', text: '' }); // Crear elementos vacíos inicialmente
        cardsWrapper.appendChild(card);
    }
    // Actualizar el contenido de estos elementos con los datos iniciales
    updateCardContent();

    // Ajustar el scroll inicial para mostrar las 4 tarjetas centrales
    requestAnimationFrame(() => {
        const cards = cardsWrapper.querySelectorAll('.tarjeta');
        if (cards.length >= totalCardsInDOM) {
            const cardWidth = cards[0].offsetWidth + (parseFloat(getComputedStyle(cards[0]).marginLeft) + parseFloat(getComputedStyle(cards[0]).marginRight));
            cardsWrapper.scrollLeft = cardWidth * Math.floor((totalCardsInDOM - cardsToShow) / 2);
        }
    });
}

// Función para actualizar SOLO el contenido de los elementos de tarjeta existentes
function updateCardContent() {
    const cards = cardsWrapper.querySelectorAll('.tarjeta');
    // Calcular los índices del contenido a mostrar en los 6 elementos del DOM
    const contentIndices = [];
    for (let i = 0; i < totalCardsInDOM; i++) {
        let index = (currentIndex + i - Math.floor((totalCardsInDOM - cardsToShow) / 2) + cardContent.length) % cardContent.length;
        if (index < 0) {
            index += cardContent.length;
        }
        contentIndices.push(cardContent[index]);
    }

    // Actualizar el contenido de cada elemento de tarjeta existente
    cards.forEach((card, i) => {
        const content = contentIndices[i];
        card.href = content.href;
        card.querySelector('.tarjeta__imagen img').src = content.imageUrl;
        card.querySelector('.tarjeta__imagen img').alt = content.text;
        card.querySelector('.tarjeta__titulo').textContent = content.text;
    });
}

// Ajustar la lógica para evitar duplicaciones al mover tarjetas
function moveCardToEnd(card, nextContent) {
    // Verificar si ya existe una tarjeta con el mismo texto en el DOM
    const existingCard = Array.from(cardsWrapper.children).find(
        (child) => child.querySelector('.tarjeta__titulo').textContent === nextContent.text
    );

    if (existingCard) {
        return; // Evitar duplicación si ya existe
    }

    // Eliminar la tarjeta del inicio antes de moverla al final
    cardsWrapper.removeChild(card);

    // Actualizar el contenido de la tarjeta
    card.href = nextContent.href;
    card.querySelector('.tarjeta__imagen img').src = nextContent.imageUrl;
    card.querySelector('.tarjeta__imagen img').alt = nextContent.text;
    card.querySelector('.tarjeta__titulo').textContent = nextContent.text;

    // Añadir la tarjeta al final del contenedor
    cardsWrapper.appendChild(card);
}

function moveCardToStart(card, prevContent) {
    // Verificar si ya existe una tarjeta con el mismo texto en el DOM
    const existingCard = Array.from(cardsWrapper.children).find(
        (child) => child.querySelector('.tarjeta__titulo').textContent === prevContent.text
    );

    if (existingCard) {
        return; // Evitar duplicación si ya existe
    }

    // Eliminar la tarjeta del final antes de moverla al inicio
    cardsWrapper.removeChild(card);

    // Actualizar el contenido de la tarjeta
    card.href = prevContent.href;
    card.querySelector('.tarjeta__imagen img').src = prevContent.imageUrl;
    card.querySelector('.tarjeta__imagen img').alt = prevContent.text;
    card.querySelector('.tarjeta__titulo').textContent = prevContent.text;

    // Añadir la tarjeta al inicio del contenedor
    cardsWrapper.prepend(card);
}

// Agregar una clase CSS para la transición suave
cardsWrapper.style.scrollBehavior = 'smooth';

// Inicializar las tarjetas al cargar la página
initializeCards();

// Modificar la lógica para animar la transición de las tarjetas
rightButton.addEventListener('click', () => {
    leftButton.disabled = true;
    rightButton.disabled = true;

    const cards = cardsWrapper.querySelectorAll('.tarjeta');
    const cardWidth = cards[0].offsetWidth + (parseFloat(getComputedStyle(cards[0]).marginLeft) + parseFloat(getComputedStyle(cards[0]).marginRight));

    // Aplicar una clase temporal para animar el desplazamiento
    cardsWrapper.style.transition = 'transform 0.6s ease';
    cardsWrapper.style.transform = `translateX(-${cardWidth}px)`;

    setTimeout(() => {
        cardsWrapper.style.transition = '';
        cardsWrapper.style.transform = '';

        const cardToMove = cards[0];
        const nextContentIndex = (currentIndex + cardsToShow) % cardContent.length;
        const nextContent = cardContent[nextContentIndex];

        moveCardToEnd(cardToMove, nextContent);
        currentIndex = (currentIndex + 1) % cardContent.length;

        leftButton.disabled = false;
        rightButton.disabled = false;
    }, 600); // Tiempo de la transición
});

leftButton.addEventListener('click', () => {
    leftButton.disabled = true;
    rightButton.disabled = true;

    const cards = cardsWrapper.querySelectorAll('.tarjeta');
    const cardWidth = cards[0].offsetWidth + (parseFloat(getComputedStyle(cards[0]).marginLeft) + parseFloat(getComputedStyle(cards[0]).marginRight));

    // Aplicar una clase temporal para animar el desplazamiento
    cardsWrapper.style.transition = 'transform 0.6s ease';
    cardsWrapper.style.transform = `translateX(${cardWidth}px)`;

    setTimeout(() => {
        cardsWrapper.style.transition = '';
        cardsWrapper.style.transform = '';

        const cardToMove = cards[totalCardsInDOM - 1];
        const prevContentIndex = (currentIndex - 1 + cardContent.length) % cardContent.length;
        const prevContent = cardContent[prevContentIndex];

        moveCardToStart(cardToMove, prevContent);
        currentIndex = (currentIndex - 1 + cardContent.length) % cardContent.length;

        leftButton.disabled = false;
        rightButton.disabled = false;
    }, 600); // Tiempo de la transición
});

// Asegurar que el scroll inicial se ajuste al redimensionar la ventana
window.addEventListener('resize', () => {
    // Re-ajustar el scroll inicial sin cambiar el contenido
    const cards = cardsWrapper.querySelectorAll('.tarjeta');
    if (cards.length >= totalCardsInDOM) {
        const cardWidth = cards[0].offsetWidth + (parseFloat(getComputedStyle(cards[0]).marginLeft) + parseFloat(getComputedStyle(cards[0]).marginRight));
        cardsWrapper.scrollLeft = cardWidth * Math.floor((totalCardsInDOM - cardsToShow) / 2);
    }
});