// Escuchar el evento personalizado 'menuCargado' para inicializar el buscador

document.addEventListener('menuCargado', function() {
    console.log('Menu cargado correctamente, inicializando buscador.');

    // Verificar si el input y el botón del buscador existen
    var inputBuscador = document.getElementById('buscador');
    var botonBuscar = document.getElementById('botonBuscar');
    var contenedorInput = document.querySelector('.conten-input__hijo');

    if (!inputBuscador || !botonBuscar || !contenedorInput) {
        console.warn('El buscador no está presente en esta página.');
        return;
    }

    // Mostrar en consola cuando se hace clic en el input
    inputBuscador.addEventListener('click', function() {
        console.log('Se hizo clic en el input del buscador.');
    });

    // Mostrar en consola cuando se hace clic en el botón de buscar
    botonBuscar.addEventListener('click', function() {
        console.log('Se hizo clic en el botón de buscar.');
    });

    // Crear el contenedor de resultados
    var contenedorResultados = document.createElement('div');
    contenedorResultados.className = 'conten-input__resultados';
    contenedorResultados.style.display = 'none';
    contenedorResultados.style.overflowY = 'auto';
    contenedorResultados.style.maxHeight = '200px';
    contenedorResultados.style.border = '1px solid #ccc';
    contenedorResultados.style.backgroundColor = '#fff';
    contenedorResultados.style.position = 'absolute';
    contenedorResultados.style.zIndex = '1000';
    contenedorResultados.style.width = '50rem';

    // Insertar el contenedor de resultados en el DOM
    contenedorInput.appendChild(contenedorResultados);

    // Agregar evento al botón de búsqueda
    botonBuscar.addEventListener('click', function() {
        var textoBusqueda = inputBuscador.value.trim().toLowerCase();
        contenedorResultados.innerHTML = '';

        if (textoBusqueda.length < 2) {
            contenedorResultados.style.display = 'none';
            return;
        }

        var elementos = document.querySelectorAll('body *');
        var resultados = [];

        elementos.forEach(function(elemento) {
            // Verificar si el elemento contiene texto coincidente y no tiene hijos con texto
            if (elemento.textContent.toLowerCase().includes(textoBusqueda)) {
                var hijosConTexto = Array.from(elemento.children).some(function(hijo) {
                    return hijo.textContent.trim() !== '';
                });

                if (!hijosConTexto) {
                    resultados.push(elemento);
                }
            }
        });

        if (resultados.length > 0) {
            resultados.forEach(function(resultado) {
                var itemResultado = document.createElement('div');
                itemResultado.className = 'conten-input__resultado-item';
                itemResultado.textContent = resultado.textContent.trim();
                itemResultado.style.padding = '10px';
                itemResultado.style.cursor = 'pointer';
                itemResultado.addEventListener('click', function() {
                    resultado.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    resultado.style.backgroundColor = '#efefdb';
                    setTimeout(function() {
                        resultado.style.backgroundColor = '';
                    }, 2000);
                });
                contenedorResultados.appendChild(itemResultado);
            });
            contenedorResultados.style.display = 'block';
        } else {
            contenedorResultados.style.display = 'none';
        }
    });

    // Agregar evento al input de búsqueda
    inputBuscador.addEventListener('input', function() {
        if (inputBuscador.value.trim().length < 2) {
            contenedorResultados.style.display = 'none';
        }
    });
});