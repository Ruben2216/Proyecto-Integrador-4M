// Ajustar la lógica para manejar la visibilidad de las secciones
var contenedor = document.querySelector('.contenedor_transicion');
var botonRegistro = document.querySelector('.create-account');
var botonLogin = document.querySelector('.seccion_login.derecha .login-button');

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