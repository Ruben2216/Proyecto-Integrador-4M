// Ajustar la lógica para manejar la visibilidad de las secciones
const contenedor = document.querySelector('.transicion');
const botonRegistro = document.querySelector('.crear-cuenta');
const botonLogin = document.querySelector('.volver-login__enlace');

const passwordInput = document.getElementById('password');
const passwordInput2 = document.getElementById('password2');
const verContraseña = document.querySelector('.ver_contraseña-login');
const verContraseña2 = document.querySelector('.ver_contraseña-registro');

verContraseña.addEventListener('click', function() {
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        verContraseña.textContent = '👀'; 
    } else {
        passwordInput.type = 'password';
        verContraseña.textContent = '🙈'; 
    }
});

verContraseña2.addEventListener('click', function() {
    if (passwordInput2.type === 'password') {
        passwordInput2.type = 'text';
        verContraseña2.textContent = '👀'; 
    } else {
        passwordInput2.type = 'password';
        verContraseña2.textContent = '🙈'; 
    }
});

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
