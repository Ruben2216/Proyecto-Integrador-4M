// Ajustar la lógica para manejar la visibilidad de las secciones
const contenedor = document.querySelector('.transicion');
const botonRegistro = document.querySelector('.crear-cuenta');
const botonLogin = document.querySelector('.volver-login__enlace');

const passwordInput = document.getElementById('password');
const passwordInput2 = document.getElementById('password2');
const verContraseña = document.querySelector('.ver_contraseña-login');

verContraseña.addEventListener('click', function() {
    if (passwordInput.type === 'password' || passwordInput2.type === 'password') {
        passwordInput.type = 'text';
        passwordInput2.type = 'text';
        verContraseña.textContent = '👀'; 
    } else {
        passwordInput.type = 'password';
        passwordInput2.type = 'password';
        verContraseña.textContent = '🙈'; 
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
