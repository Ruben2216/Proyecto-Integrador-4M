// Ajustar la lógica para manejar la visibilidad de las secciones
const contenedor = document.querySelector('.transicion');
const botonRegistro = document.querySelector('.crear-cuenta');
const botonLogin = document.querySelector('.volver-login__enlace');

if (botonRegistro) {
    botonRegistro.addEventListener('click', function (e) {
        e.preventDefault();
        contenedor.classList.add('activar');
    });
}

if (botonLogin) {
    botonLogin.addEventListener('click', function (e) {
        e.preventDefault();
        contenedor.classList.remove('activar');
    });
}
