<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    $userEmail = $_POST['email']; //correo del formulario

    // Configuración del servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'rubenclemente221@gmail.com'; // Tu correo
    $mail->Password = 'olrf zqrm vobc bjsz'; // Tu contraseña
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Configuración del correo
    $mail->setFrom('rubenclemente221@gmail.com', 'PetClub');
    $mail->addAddress($userEmail); // Usar el correo del usuario como destinatario

    $mail->isHTML(true);
    $mail->Subject = 'Bienvenido a PetClub';
    $mail->Body = //LA NETA BIEN GEPETEADO, ME DIO WEBA HACER TODO EL HTML CON CSS EN LINEA
    '<html> 
    <head>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; }
            .header { text-align: center; margin-bottom: 20px; }
            .content { padding: 20px; background-color: #f9f9f9; border-radius: 10px; }
            .footer { margin-top: 20px; text-align: center; font-size: 0.9em; color: #555; }
        </style>
    </head>
    <body>
        <div class="header">
            <h1>¡Bienvenido a PetClub!</h1>
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

    // Enviar el correo
    $mail->send();
    echo "Correo enviado correctamente a $userEmail.";
} catch (Exception $e) { //POR SI ALGO SALE MAL QUE LO DUDO, FUE PARA VER LOS ERRORES CON $e
    echo "Error al enviar el correo: {$mail->ErrorInfo}";
}
?>