<?php
include 'Activos\BasePHP\conexion.php';
session_start();


// genera un id random para un dato curioso random
$random_id = rand(1,30);

$sql = "SELECT * FROM curiosidades WHERE Curi_Id = $random_id";
$resultado = $conn->query($sql);

// Asigna el valor de curiosidad, OJO, debe haber datos en la base de datos si no caña
$curiosidad_row = $resultado->fetch_assoc();
$curiosidad = $curiosidad_row['Curi_Texto'];

// Consulta para obtener el nombre de la especie al igual que la curiosidad de antes
$id_especie = $curiosidad_row['Curi_Especie'];
$sql_esp = "SELECT Esp_Nombre FROM especie WHERE Esp_Id = $id_especie";
$res_esp = $conn->query($sql_esp);

// Asigna el valor de especie si existe algún resultado
$esp_valor = $res_esp->fetch_assoc();
$especie = $esp_valor['Esp_Nombre'];

if ($especie == "Husky Siberiano") {
    $perro_icono = "Activos/Imagenes/iconos_mascotas/husky.png";
    // Aquí puedes usar $husky como recurso para la imagen
} else if ($especie == "Labrador Retriever") {
    $perro_icono = "Activos/Imagenes/iconos_mascotas/Labrador-Retriever.png";
} else if ($especie == "Pastor Alemán") {
    $perro_icono = "Activos/Imagenes/iconos_mascotas/pastor-aleman.png";
} else if ($especie == "Bulldog Inglés") {
    $perro_icono = "Activos/Imagenes/iconos_mascotas/bulldog-ingles.png";
} else if ($especie == "Poodle (Caniche)") {
    $perro_icono = "Activos/Imagenes/iconos_mascotas/caniche.png";
} else if ($especie == "Chihuahua") {
    $perro_icono = "Activos/Imagenes/iconos_mascotas/Chihuahua.png";
} else if ($especie == "Golden Retriever") {
    $perro_icono = "Activos/Imagenes/iconos_mascotas/golden-retriever.png";
} else if ($especie == "Dálmata") {
    $perro_icono = "Activos/Imagenes/iconos_mascotas/dalmata.png";
} else if ($especie == "Beagle") {
    $perro_icono = "Activos/Imagenes/iconos_mascotas/beagle.png";
} else if ($especie == "Shih Tzu") {
    $perro_icono = "Activos/Imagenes/iconos_mascotas/shih-tzu.png";
} else if ($especie == "Boxer") {
    $perro_icono = "Activos/Imagenes/iconos_mascotas/boxer.png";
} else if ($especie == "Rottweiler") {
    $perro_icono = "Activos/Imagenes/iconos_mascotas/rottweiler.png";
} else if ($especie == "Border Collie") {
    $perro_icono = "Activos/Imagenes/iconos_mascotas/border-collie.png";
} else if ($especie == "Cocker Spaniel") {
    $perro_icono = "Activos/Imagenes/iconos_mascotas/cocker-spaniel.png";
} else if ($especie == "Doberman") {
    $perro_icono = "Activos/Imagenes/iconos_mascotas/doberman.png";
} else if ($especie == "Pug") {
    $perro_icono = "Activos/Imagenes/iconos_mascotas/pug.png";
} else if ($especie == "Maltés") {
    $perro_icono = "Activos/Imagenes/iconos_mascotas/maltes.png";
} else if ($especie == "San Bernardo") {
    $perro_icono = "Activos/Imagenes/iconos_mascotas/san-bernardo.png";
} else if ($especie == "Akita Inu") {
    $perro_icono = "Activos/Imagenes/iconos_mascotas/akita-inu.png";
} else {
    $perro_icono = "Activos/Imagenes/iconos_mascotas/dog.png";
}
//guardar ruta de img en una variable

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Activos/Imagenes/icono_web.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gravitas+One&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Activos/css/estilo_main.css">
    <link rel="stylesheet" href="Activos/css/nav.css">
    <link rel="stylesheet" href="Activos/css/footer.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" /> <!-- PARA EL MAPA, EXTERNO-->

    <title>PetClub</title>
</head>
<body>
    <header class="header"></header>
    <div class="portada">
        <div id="Inicio" class="portada__contenido">
            <h1><strong>Pet</strong>Club</h1>
                <p>Bienvenido a PetClub, el lugar donde el cuidado de tu mascota es nuestra prioridad.</p>
                <p>Registra su información, agenda recordatorios y encuentra servicios cercanos. Todo lo que necesitas, en un solo lugar.</p>
            <div class="portada__boton">
                <div>
                    <a href="#curiosidad">Leer mas</a>
                </div>
            </div>
        </div>
    </div>
    <main class="principal_contenido">
        <section class="curiosidad" id="curiosidad">
            <div class="curiosidad__icono">
                <div>
                    <!-- <img src="Activos/Imagenes/iconos_mascotas/dog.png" alt="Icono de perro" class="icono-imagen" loading="lazy"> -->
                    <img src= "<?php echo $perro_icono;?>" alt="Icono de perro" class="icono-imagen" loading="lazy">
                </div>
            </div>
            <div class="curiosidad__contenedor" >
                <span class="curiosidad__date">📅 <?php echo date("d-m-Y"); ?></span>
                <h2 >🐾 Dato Curioso del Día</h2>
                <p>
                    <?php if ($curiosidad !== null) { echo '"' . $curiosidad . '"'; } else { echo $curiosidad_error; } ?>   
                </p>
                <span class="curiosidad__etiqueta">Raza: <?php echo $especie; ?></span>
            </div>
        </section>


                    
        <section class="galeria">
            <h2>Conoce las diferentes razas</h2>
            <div class="galeria__contenedor">
                <article class="galeria__item active">
                    <img src="Activos/Imagenes/fotos_mascotas/Labrador Retriever.jpg" alt="Labrador Retriever" loading="lazy">
                    <div class="galeria__overlay">
                        <div class="galeria__text-item">Amigable, inteligente y buen compañero familiar.</div>
                        <div class="galeria__name-pet">Labrador Retriever</div>
                    </div>
                </article>
                <article class="galeria__item">
                    <img src="Activos/Imagenes/fotos_mascotas/Pastor Aleman.avif" alt="Pastor Alemán" loading="lazy">
                    <div class="galeria__overlay">
                        <div class="galeria__text-item">Leal, protector     y fácil de entrenar.</div>
                        <div class="galeria__name-pet">Pastor Alemán</div>
                    </div>
                </article>
                <article class="galeria__item">
                    <img src="Activos/Imagenes/fotos_mascotas/Bulldog Inglés.avif" alt="Bulldog Inglés" loading="lazy">
                    <div class="galeria__overlay">
                        <div class="galeria__text-item">Tranquilo, robusto y cariñoso.</div>
                        <div class="galeria__name-pet">Bulldog Inglés</div>
                    </div>
                </article>
                <article class="galeria__item">
                    <img src="Activos/Imagenes/fotos_mascotas/Poodle(Caniche).avif" alt="Poodle(Caniche)" loading="lazy">
                    <div class="galeria__overlay">
                        <div class="galeria__text-item"> Muy inteligente, obediente y elegante</div>
                        <div class="galeria__name-pet">Poodle(Caniche)</div>
                    </div>
                </article>
                <article class="galeria__item">
                    <img src="Activos/Imagenes/fotos_mascotas/Chihuahua.avif" alt="Chihuahua" loading="lazy">
                    <div class="galeria__overlay">
                        <div class="galeria__text-item">Pequeño, valiente y muy apegado a su dueño.</div>
                        <div class="galeria__name-pet">Chihuahua</div>
                    </div>
                </article>
                <article class="galeria__item">
                    <img src="Activos/Imagenes/fotos_mascotas/Golden Retriever.avif" alt="Golden Retriever" loading="lazy">
                    <div class="galeria__overlay">
                        <div class="galeria__text-item">Dulce, paciente y excelente con niños.</div>
                        <div class="galeria__name-pet">Golden Retriever</div>
                    </div>
                </article>
                <article class="galeria__item">
                    <img src="Activos/Imagenes/fotos_mascotas/Husky Siberiano.avif" alt="Husky Siberiano" loading="lazy">
                    <div class="galeria__overlay">
                        <div class="galeria__text-item">Energético, sociable y de apariencia lobuna.</div>
                        <div class="galeria__name-pet">Husky Siberiano</div>
                    </div>
                </article>
                <article class="galeria__item">
                    <img src="Activos/Imagenes/fotos_mascotas/Dalmata.avif" alt="Dálmata" loading="lazy">
                    <div class="galeria__overlay">
                        <div class="galeria__text-item">Activo, juguetón y con manchas únicas.</div>
                        <div class="galeria__name-pet">Dálmata</div>
                    </div>
                </article>
                <article class="galeria__item">
                    <img src="Activos/Imagenes/fotos_mascotas/Beagle.avif" alt="Beagle" loading="lazy">
                    <div class="galeria__overlay">
                        <div class="galeria__text-item">Curioso, amigable y excelente olfato.</div>
                        <div class="galeria__name-pet">Beagle</div>
                    </div>
                </article>
                <article class="galeria__item">
                    <img src="Activos/Imagenes/fotos_mascotas/Shih Tzu.avif" alt="Shih Tzu" loading="lazy">
                    <div class="galeria__overlay">
                        <div class="galeria__text-item">Cariñoso, dócil y con pelaje largo y hermoso.</div>
                        <div class="galeria__name-pet">Shih Tzu</div>
                    </div>
                </article>
                <article class="galeria__item">
                    <img src="Activos/Imagenes/fotos_mascotas/Boxer.avif" alt="Boxer" loading="lazy">
                    <div class="galeria__overlay">
                        <div class="galeria__text-item">Enérgico, juguetón y cariñoso.</div>
                        <div class="galeria__name-pet">Boxer</div>
                    </div>
                </article>
                <article class="galeria__item">
                    <img src="Activos/Imagenes/fotos_mascotas/Rottweiler.avif" alt="Rottweiler" loading="lazy">
                    <div class="galeria__overlay">
                        <div class="galeria__text-item">Fuerte, protector y muy leal.</div>
                        <div class="galeria__name-pet">Rottweiler</div>
                    </div>
                </article>
                <article class="galeria__item">
                    <img src="Activos/Imagenes/fotos_mascotas/Border Collie.jpg" alt="Border Collie" loading="lazy">
                    <div class="galeria__overlay">
                        <div class="galeria__text-item">Extremadamente inteligente y trabajador.</div>
                        <div class="galeria__name-pet">Border Collie</div>
                    </div>
                </article>
                <article class="galeria__item">
                    <img src="Activos/Imagenes/fotos_mascotas/Cocker Spaniel.jpg" alt="Cocker Spaniel" loading="lazy">
                    <div class="galeria__overlay">
                        <div class="galeria__text-item">Dulce, activo y de orejas largas.</div>
                        <div class="galeria__name-pet">Cocker Spaniel</div>
                    </div>
                </article>
                <article class="galeria__item">
                    <img src="Activos/Imagenes/fotos_mascotas/Doberman.avif" alt="Doberman" loading="lazy">
                    <div class="galeria__overlay">
                        <div class="galeria__text-item">Elegante, vigilante y muy obediente.</div>
                        <div class="galeria__name-pet">Doberman</div>
                    </div>
                </article>
                <article class="galeria__item">
                    <img src="Activos/Imagenes/fotos_mascotas/Pug.avif" alt="Pug" loading="lazy">
                    <div class="galeria__overlay">
                        <div class="galeria__text-item">Divertido, sociable y con cara arrugada.</div>
                        <div class="galeria__name-pet">Pug</div>
                    </div>
                </article>
                <article class="galeria__item">
                    <img src="Activos/Imagenes/fotos_mascotas/Maltes.jpg" alt="Maltes" loading="lazy">
                    <div class="galeria__overlay">
                        <div class="galeria__text-item"> Pequeño, tierno y de pelo blanco sedoso.</div>
                        <div class="galeria__name-pet">Maltes</div>
                    </div>
                </article>
                <article class="galeria__item">
                    <img src="Activos/Imagenes/fotos_mascotas/San Bernardo.jpg" alt="San Bernardo" loading="lazy">
                    <div class="galeria__overlay">
                        <div class="galeria__text-item">Gigante, amable y paciente.</div>
                        <div class="galeria__name-pet">San Bernardo</div>
                    </div>
                </article>
                <article class="galeria__item">
                    <img src="Activos/Imagenes/fotos_mascotas/Akita Inuavif.avif" alt="Akita Inu" loading="lazy">
                    <div class="galeria__overlay">
                        <div class="galeria__text-item">Reservado, valiente y muy fiel.</div>
                        <div class="galeria__name-pet">Akita Inu</div>
                    </div>
                </article>
            </div>
        </section>

        <section id="mapa__titulo" class="mapa">
            <h2  class="mapa__titulo">Veterinarias cerca de ti</h2>
            <div class="mapa__contenedor">
                
                <div id="map" class="mapa__contenedor-mapa" ></div>
                <div  class="mapa__texto">
                    <p>¿Cómo funciona el mapa?📌 <br></p>
                    <p>
                            1. Encuentra clínicas cercanas <br>
                            2. Haz clic en el marcador para ver detalles<br>
                            4. Haz dos clic en el marcador para ir a google maps <br>
                            3. Llama o agenda tu cita
                    </p>
                </div>
        </div>

            
        </section>
        <button id="bienvenida-btn" popovertarget="bienvenida-msg" popovertargetaction="toogle" disabled>

            Mostrar
        </button>

        <div id="bienvenida-msg" popover>
            <div class="popover mostrar-popover">
            <p id="nombre-usuario"></p>
            </div>
        </div>
        <section class="preguntas_frecuentes">
    <h2>Preguntas Frecuentes</h2>

    <details>
      <summary>Registro y Cuenta</summary>
      <div class="content">
        <p><strong>¿Cómo me registro en PetClub?</strong><br>
           Puedes registrarte haciendo clic en "Registrarse" en la esquina superior derecha o desde el botón en la página principal. Solo necesitas un correo electrónico y una contraseña.</p>
        <p><strong>¿Es gratuito el servicio?</strong><br>
           Sí, PetClub es completamente gratuito. No tenemos planes de pago ni suscripciones premium.</p>
        <p><strong>¿Puedo tener más de una mascota registrada?</strong><br>
           ¡Claro! Puedes registrar todas las mascotas que desees y gestionar sus perfiles de manera individual.</p>
      </div>
    </details>

    <details>
      <summary>Funcionalidades</summary>
      <div class="content">
        <p><strong>¿Cómo funcionan los recordatorios?</strong><br>
           Puedes programar recordatorios para vacunas, citas veterinarias, horarios de alimentación y más. Recibirás notificaciones en la web.</p>
        <p><strong>¿PetClub envía recordatorios por correo o SMS?</strong><br>
           Actualmente, las notificaciones son dentro de la plataforma y por correo electrónico. No contamos con envío de SMS.</p>
        <p><strong>¿Cómo funciona la búsqueda de veterinarias cercanas?</strong><br>
           Usamos geolocalización para mostrarte clínicas veterinarias cerca de tu ubicación. También puedes buscar manualmente por ciudad o nombre.</p>
      </div>
    </details>

    <details>
      <summary>Seguridad y Privacidad</summary>
      <div class="content">
        <p><strong>¿Cómo protegen mis datos y los de mi mascota?</strong><br>
           Utilizamos cifrado de datos y cumplimos con normativas de privacidad. Tu información no se comparte con terceros sin tu consentimiento.</p>
        <p><strong>¿Puedo eliminar mi cuenta?</strong><br>
           Sí, en la sección "Configuración de cuenta" puedes eliminar tu perfil y todos los datos asociados.</p>
      </div>
    </details>

    <details>
      <summary>Problemas Técnicos</summary>
      <div class="content">
        <p><strong>No recibo notificaciones, ¿qué hago?</strong><br>
           Asegúrate de que tu navegador permita alertas.</p>
        <p><strong>La página no carga correctamente, ¿cómo lo soluciono?</strong><br>
           Prueba limpiar la caché de tu navegador o acceder desde otro dispositivo. Si el problema persiste, contáctanos.</p>
      </div>
    </details>

    <details>
      <summary>Otras Consultas</summary>
      <div class="content">
        <p><strong>¿PetClub tiene aplicación móvil?</strong><br>
           Por ahora solo está disponible como plataforma web, pero estamos trabajando en una app para dispositivos móviles.</p>
        <p><strong>¿Puedo compartir el perfil de mi mascota con otros usuarios?</strong><br>
           Actualmente no, pero en futuras actualizaciones incluiremos opciones de compartir con familiares o veterinarios.</p>
        <p><strong>¿Dónde puedo enviar sugerencias o reportar errores?</strong><br>
           Puedes escribirnos a soporte@petclub.com o usar el formulario de contacto en la sección "Ayuda".</p>
      </div>
    </details>

  </section>
  
    </main>
    <footer class="footer"></footer>
    <script src="Activos/javascript/Accesos_permanentes.js"></script>
    <script src="Activos/javascript/scroll_imagenes.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="Activos/javascript/mapa_veterinarias.js"></script>

</body>
</html>

