<?php
//TODO ESTO ES SACADO DE LA DOCUMENTACIOND DE PHPMailer, TAMBIEN SE PUEDEN AGREGAR ARCHIVOS PERO NA 
// Cargar el autoload de Composer
require __DIR__ . '/vendor/autoload.php';

// Importar PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Crear una nueva instancia de PHPMailer
$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; 
    $mail->SMTPAuth = true;
    $mail->Username = 'rubenclemente221@gmail.com'; // CORREO PERSONAL X 
    $mail->Password = 'olrf zqrm vobc bjsz'; //NO MOVER
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Configuración del correo
    $userEmail = $_POST['email']; // Correo del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $bienvenidaUsuario = "Bienvenido " . $nombre . " " . $apellido;
    $mensaje = '<html> 
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        strong {
            color: #5e6a3a;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .content {
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 0.9em;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>¡Bienvenido a <strong>PetClub!</strong></h1>
    </div>
    <div class="content">
        <p>¡Gracias por registrarte en <strong>PetClub</strong>! Estamos emocionados de tenerte con nosotros. Aquí podrás encontrar todo lo que necesitas para cuidar y consentir a tu mascota.</p>
        <p>En PetClub, nos esforzamos por ofrecerte los mejores servicios y productos para tus amigos peludos. No olvides explorar nuestras secciones de adopción, veterinarias cercanas y consejos para el cuidado de tus mascotas.</p>
        <p>Si tienes alguna pregunta o necesitas ayuda, no dudes en contactarnos. Estamos aquí para ti y tu mascota.</p>
        <p>¡Esperamos que disfrutes de tu experiencia en PetClub!</p>
        <img src="https://www.marthadebayle.com/wp-content/uploads/2024/05/senales-de-que-tu-perro-es-feliz.jpg" alt="Bienvenido a PetClub" style="display: block; margin: 20px auto; max-width: 100%; border-radius: 10px;">
    </div>
    <div class="footer">
        <p>Este correo fue enviado automáticamente, por favor no respondas a este mensaje.</p>
        <p>&copy; 2025 PetClub. Todos los derechos reservados.</p>
    </div>
</body>
</html>';

    $mail->setFrom('rubenclemente221@gmail.com', 'PetClub!');
    $mail->addAddress($userEmail); // Destinatario
    $mail->isHTML(true);
    $mail->Subject = $bienvenidaUsuario;
    $mail->Body = $mensaje;

    // Enviar el correo
    $mail->send();
    echo 'El mensaje ha sido enviado correctamente'; //para probar si si jala o que pedo PTM!
} catch (Exception $e) {
    echo "El mensaje no pudo ser enviado. Error: {$mail->ErrorInfo}";
}

?>