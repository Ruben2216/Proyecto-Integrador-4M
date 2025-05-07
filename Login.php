<?php
session_start();

// Guardar a donde quería ir el usuario antes de iniciar sesión
if (isset($_GET['redirect_to'])) {
    $_SESSION['redireccion'] = $_GET['redirect_to'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Activos/Imagenes/icono_web.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gravitas+One&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Activos/css/estilo_login.css">
    <title>PetClub</title>
</head>
<body>
    <a href="Index.php" class="boton-regresar">
        &larr; <strong>Regresar</strong>
    </a>        
    <div class="contenedor">
        <div class="envoltura">
            <div class="contenido">
                <header></header>
                <div class="transicion">
                    <!-- FORMULARIO DE INICIO DE SESIÓN -->
                    <section class="seccion seccion--izquierda">
                        <div class="sign-in">
                            <h1>¡Hola!</h1>
                            <p>Bienvenido de vuelta</p>
                            <form action="Activos/BasePHP/validar_login.php" method="POST">
                                <label for="email">Correo electrónico</label>
                                <input type="email" id="email" name="email" placeholder="Ingresa tu correo" required>
                                <br>
                                <label for="password">Contraseña</label>
                                <input type="password" id="password" name="password" placeholder="Contraseña" required>
                                <span class="ver_contraseña ver_contraseña-login">🙈</span>
                                <a href="pagina_404.html" class="recuperar">Recuperar Contraseña</a>
                                <br>
                                <button class="boton" type="submit">Iniciar sesión</button>
                            </form>
                            <p>¿No tienes cuenta? <a href="pagina_404.html" class="crear-cuenta">Crea una</a></p>
                            <p>O continua con</p>
                            <div class="sign-up__social-img">
                                <a href="Activos/BasePHP/Inicio_sesion_google/google.php"  aria-label="Iniciar sesión con Google">
                                    <img src="Activos/Imagenes/login/icon-google.svg" alt="Google">
                                </a>
                                <a href="pagina_404.html" aria-label="Iniciar sesión con Facebook">
                                    <img src="Activos/Imagenes/login/icon-facebook.svg" alt="Facebook">
                                </a>
                            </div>
                        </div>
                    </section>

                    <!-- FORMULARIO DE REGISTRO -->
                    <section class="seccion seccion--derecha">
                        <div class="sign-up">
                            <h1>Crea tu cuenta</h1>
                            <br>
                            <form action="Activos/BasePHP/guardar_usuario.php" method="POST">
                              <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>

                                <label for="apellido">Apellido</label>
                                <input type="text" name="apellido" id="apellido" placeholder="Apellido" required>
                                
                                <label for="email">Correo</label>
                                <input type="email" name="email" id="email" placeholder="Correo electrónico" required>

                                <label for="password">Contraseña</label>
                                <input type="password" id="password2" name="password"  placeholder="Contraseña" minlength="8" required>
                                <span class="ver_contraseña2 ver_contraseña-registro">🙈</span>

                                <button class="boton boton--crear" type="submit" id="derecha">Crear cuenta</button>
                            </form>

                            <p class="sign-up__volver-login">
                                ¿Ya tienes una cuenta? <a href="pagina_404.html" class="volver-login__enlace">Inicia sesión</a>
                            </p>
                            <p>O continua con</p>
                            <div class="sign-up__social-img sign-up--imgs">
                                <a href="Activos/BasePHP/Inicio_sesion_google/google.php" aria-label="Iniciar sesión con Google">
                                    <img src="Activos/Imagenes/login/icon-google.svg" alt="Google">
                                </a>
                                <a href="pagina_404.html" aria-label="Iniciar sesión con Facebook">
                                    <img src="Activos/Imagenes/login/icon-facebook.svg" alt="Facebook">
                                </a>
                            </div>                            
                        </div>
                    </section>

                    <section class="imagen">
                        <div>
                            <img src="https://img.freepik.com/foto-gratis/disparo-vertical-lindo-perro-labrador-sentado-montana-puesta-sol_181624-43911.jpg?semt=ais_country_boost&w=740" alt="Perro_logo">
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <script> //ECHO POR FABI
    document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form[action="Activos/BasePHP/guardar_usuario.php"]');
    const nombreInput = document.getElementById('nombre');
    const apellidoInput = document.getElementById('apellido');

    // Crear y añadir el mensaje de error debajo de los campos 
    function crearSpanError(input, id) {
        if (!document.getElementById(id)) {
            const span = document.createElement('span');
            span.id = id;
            span.style.color = 'red';
            span.style.fontSize = '14px';
            input.insertAdjacentElement('afterend', span);
        }
    }

        crearSpanError(nombreInput, 'error-nombre');
        crearSpanError(apellidoInput, 'error-apellido');

        const errorNombre = document.getElementById('error-nombre');
        const errorApellido = document.getElementById('error-apellido');

        form.addEventListener('submit', function (e) {
            let valid = true;
            const regex = /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/;

            if (!regex.test(nombreInput.value.trim())) {
                errorNombre.textContent = "Datos invalidos (Intentelo de nuevo)";
                valid = false;
            } else {
                errorNombre.textContent = "";
            }

            if (!regex.test(apellidoInput.value.trim())) {
                errorApellido.textContent = "Datos Invalidos (Intentelo de nuevo).";
                valid = false;
            } else {
                errorApellido.textContent = "";
            }

            if (!valid) {
                e.preventDefault(); // Evita que se envíe el formulario si hay errores
            }
        });
    });
    
</script>

    <script src="Activos/javascript/transiciones.js"></script>
</body>
</html>
