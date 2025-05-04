document.addEventListener('DOMContentLoaded', function() {
    var inputBuscador = document.getElementById('buscador');
    var botonBuscar = document.getElementById('botonBuscar');
    var contenedorResultados = document.createElement('div');

    // Configuración del contenedor de resultados
    contenedorResultados.className = 'conten-input__resultados';
    contenedorResultados.style.display = 'none';
    contenedorResultados.style.overflowY = 'auto';
    contenedorResultados.style.maxHeight = '200px';
    contenedorResultados.style.border = '1px solid #ccc';
    contenedorResultados.style.backgroundColor = '#fff';
    contenedorResultados.style.position = 'absolute';
    contenedorResultados.style.zIndex = '1000';
    contenedorResultados.style.width = '100%';

    // Insertar el contenedor de resultados después del input
    var contenedorInput = document.querySelector('.conten-input__hijo');
    contenedorInput.appendChild(contenedorResultados);

    botonBuscar.addEventListener('click', function() {
        var textoBusqueda = inputBuscador.value.trim().toLowerCase();
        contenedorResultados.innerHTML = '';

        if (textoBusqueda.split(' ').length < 2) {
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
                    resultado.style.backgroundColor = 'yellow';
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

    inputBuscador.addEventListener('input', function() {
        if (inputBuscador.value.trim().split(' ').length < 2) {
            contenedorResultados.style.display = 'none';
        }
    });
});