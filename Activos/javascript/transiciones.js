// Ajustar la lógica para manejar la visibilidad de las secciones
var contenedor = document.querySelector('.transicion');
var botonRegistro = document.querySelector('.crear-cuenta');
var botonLogin = document.querySelector('.seccion.seccion--derecha .login-button');

if (botonRegistro) {
    botonRegistro.addEventListener('click', function() {
        contenedor.classList.add('activar');
    });
}

if (botonLogin) {
    botonLogin.addEventListener('click', function() {
        contenedor.classList.remove('activar');
    });
}