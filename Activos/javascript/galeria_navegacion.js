    const cardsWrapper = document.getElementById('cardsWrapper');
            const leftButton = document.getElementById('leftButton');
            const rightButton = document.getElementById('rightButton');

            // Pool de contenido para las tarjetas
            const cardContent = [
                { href: 'consejo1.html', imageUrl:'https://www.clinicaveterinariaaguilar.es/wp-content/uploads/2020/01/cachorro.jpg', text: 'Cómo saber si mi cachorro tiene fiebre: Guía para detectar síntomas y...' },
                { href: 'consejo2.html', imageUrl: 'Activos/Imagenes/consejos/Mi-perro-tiene-una-herida-en-carne-viva-que-hago.jpg', text: 'Mi perro tiene una herida en carne viva ¿cómo proceder?' },
                { href: 'consejo3.html', imageUrl: 'Activos/Imagenes/consejos/perro-temblando.jpeg', text: 'Mi perro tiembla: Causas más comunes' },
                { href: 'consejo4.html', imageUrl: 'https://www.laclinicaveterinaria.com/wp-content/uploads/2022/02/Captura-de-pantalla-2022-02-02-a-las-13.49.23_resultado-scaled.webp', text: 'Guía definitiva para cuidar las articulaciones de un perro' },
                { href: 'consejo5.html', imageUrl: 'https://www.laclinicaveterinaria.com/wp-content/uploads/2022/02/Captura-de-pantalla-2022-02-02-a-las-13.49.23_resultado-scaled.webp', text: 'Entendiendo el comportamiento de tu gato' },
                { href: 'consejo6.html', imageUrl: 'https://www.laclinicaveterinaria.com/wp-content/uploads/2022/02/Captura-de-pantalla-2022-02-02-a-las-13.49.23_resultado-scaled.webp', text: 'La importancia de la vacunación en mascotas' },
                { href: 'consejo7.html', imageUrl: 'https://www.laclinicaveterinaria.com/wp-content/uploads/2022/02/Captura-de-pantalla-2022-02-02-a-las-13.49.23_resultado-scaled.webp.jpeg', text: 'Primeros auxilios para mascotas' },
                { href: 'consejo8.html', imageUrl: 'https://www.laclinicaveterinaria.com/wp-content/uploads/2022/02/Captura-de-pantalla-2022-02-02-a-las-13.49.23_resultado-scaled.webp.jpeg', text: 'Alimentación saludable para perros' },
                { href: 'consejo9.html', imageUrl: 'https://www.laclinicaveterinaria.com/wp-content/uploads/2022/02/Captura-de-pantalla-2022-02-02-a-las-13.49.23_resultado-scaled.webp', text: 'Cómo entrenar a tu cachorro' },
                { href: 'consejo10.html', imageUrl: 'https://www.laclinicaveterinaria.com/wp-content/uploads/2022/02/Captura-de-pantalla-2022-02-02-a-las-13.49.23_resultado-scaled.webp', text: 'Beneficios de adoptar una mascota' },
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


            // Inicializar las tarjetas al cargar la página
            initializeCards();

            // Event Listener para el botón derecho
            rightButton.addEventListener('click', () => {
                // Deshabilitar botones temporalmente durante la animación
                leftButton.disabled = true;
                rightButton.disabled = true;

                const cards = cardsWrapper.querySelectorAll('.tarjeta');
                const cardWidth = cards[0].offsetWidth + (parseFloat(getComputedStyle(cards[0]).marginLeft) + parseFloat(getComputedStyle(cards[0]).marginRight));
                const cardCount = cardContent.length;

                // Identificar la tarjeta que saldrá de la vista (la primera)
                const cardToMove = cards[0];

                // Calcular el índice del contenido que debe ir en esta tarjeta cuando se mueva al final
                const nextContentIndex = (currentIndex + cardsToShow) % cardCount;
                const nextContent = cardContent[nextContentIndex];

                // Actualizar el contenido de la tarjeta ANTES de moverla y scrollear
                cardToMove.href = nextContent.href;
                cardToMove.querySelector('.tarjeta__imagen img').src = nextContent.imageUrl;
                cardToMove.querySelector('.tarjeta__imagen img').alt = nextContent.text;
                cardToMove.querySelector('.tarjeta__titulo').textContent = nextContent.text;

                // Mover la tarjeta al final del contenedor
                cardsWrapper.appendChild(cardToMove);

                // Ajustar instantáneamente el scroll hacia atrás por el ancho de una tarjeta
                // Esto prepara el contenedor para la animación de scroll suave hacia adelante
                cardsWrapper.scrollLeft -= cardWidth;


                // Desplazar el scroll suavemente hacia adelante por el ancho de una tarjeta
                requestAnimationFrame(() => {
                    cardsWrapper.scrollLeft += cardWidth;
                });


                // Después de que termine el scroll, actualizar el currentIndex
                setTimeout(() => {
                    currentIndex = (currentIndex + 1) % cardContent.length;
                    // Habilitar botones
                    leftButton.disabled = false;
                    rightButton.disabled = false;
                }, 600); // Ajusta este tiempo si la transición de scroll es más larga o corta

            });

            // Event Listener para el botón izquierdo
            leftButton.addEventListener('click', () => {
                // Deshabilitar botones temporalmente durante la animación
                leftButton.disabled = true;
                rightButton.disabled = true;

                const cards = cardsWrapper.querySelectorAll('.tarjeta');
                const cardWidth = cards[0].offsetWidth + (parseFloat(getComputedStyle(cards[0]).marginLeft) + parseFloat(getComputedStyle(cards[0]).marginRight));
                const cardCount = cardContent.length;

                // Identificar la tarjeta que saldrá de la vista (la última)
                const cardToMove = cards[totalCardsInDOM - 1]; // Índice 5

                // Calcular el índice del contenido que debe ir en esta tarjeta cuando se mueva al principio
                const prevContentIndex = (currentIndex - 1 + cardCount) % cardCount;
                const prevContent = cardContent[prevContentIndex];

                // Actualizar el contenido de la tarjeta ANTES de moverla y scrollear
                cardToMove.href = prevContent.href;
                cardToMove.querySelector('.tarjeta__imagen img').src = prevContent.imageUrl;
                cardToMove.querySelector('.tarjeta__imagen img').alt = prevContent.text;
                cardToMove.querySelector('.tarjeta__titulo').textContent = prevContent.text;

                // Mover la tarjeta al principio del contenedor
                cardsWrapper.prepend(cardToMove);

                // Ajustar instantáneamente el scroll hacia adelante por el ancho de una tarjeta
                // Esto prepara el contenedor para la animación de scroll suave hacia atrás
                cardsWrapper.scrollLeft += cardWidth;


                // Desplazar el scroll suavemente hacia atrás por el ancho de una tarjeta
                requestAnimationFrame(() => {
                    cardsWrapper.scrollLeft -= cardWidth;
                });


                // Después de que termine el scroll, actualizar el currentIndex
                setTimeout(() => {
                    currentIndex = (currentIndex - 1 + cardContent.length) % cardContent.length;
                    // Habilitar botones
                    leftButton.disabled = false;
                    rightButton.disabled = false;
                }, 600); // Ajusta este tiempo

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