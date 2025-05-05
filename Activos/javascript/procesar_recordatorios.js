// Función para realizar solicitudes periódicas al servidor
function ejecutarProcesarRecordatorios() {
    setInterval(function() {
        // Crear una solicitud AJAX para ejecutar el script de procesar recordatorios
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/Proyecto-Integrador-4M/Activos/BasePHP/procesar_recordatorios.php', true); 
        xhr.onload = function() {
            if (xhr.status === 200) {
                console.log('Recordatorios procesados correctamente: ' + xhr.responseText);
            } else {
                console.error('Error al procesar recordatorios: ' + xhr.status);
            }
        };
        xhr.onerror = function() {
            console.error('Error de conexión al servidor.');
        };
        xhr.send();
    }, 1000); // Ejecutar cada 1 segundo
}

// Llamar a la función al cargar la página
ejecutarProcesarRecordatorios();