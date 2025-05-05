<?php
require_once __DIR__ . '/../../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Cargar variables de entorno desde el archivo .env
$dotenv->load();

// Configurar la zona horaria
date_default_timezone_set('America/Mexico_City');

// Crear una nueva instancia de PHPMailer
$mail = new PHPMailer(true);

// Conexión a la base de datos
require_once __DIR__ . '/conexion.php';

try {
    // Obtener la fecha y hora actuales
    $fechaActual = date('Y-m-d');
    $horaActual = date('H:i:s');

    // Registrar en el log para depuración
    error_log("Fecha actual: $fechaActual, Hora actual: $horaActual");

    // Consultar recordatorios programados para la fecha y hora actuales
    $query = "SELECT r.Recor_Titulo AS titulo, r.Recor_Descripcion AS descripcion, r.Recor_Fecha AS fecha, r.Recor_Hora AS hora, m.Masc_Nombre AS mascota, u.Usua_Email AS email, u.Usua_Nombre AS usuario_nombre, u.Usua_Apellido AS usuario_apellido
                FROM recordatorio r
                JOIN mascota m ON r.Recor_Mascota = m.Masc_Id
                JOIN usuario u ON m.Masc_Dueno = u.Usua_Id
                WHERE r.Recor_Fecha = ? AND r.Recor_Hora = ? AND r.estado = 'pendiente' AND r.visible = 1";

    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $fechaActual, $horaActual);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si hay resultados
    if ($result->num_rows === 0) {
        error_log("No se encontraron recordatorios para la fecha y hora actuales.");
    } else {
        error_log("Se encontraron recordatorios para procesar.");
    }

    while ($row = $result->fetch_assoc()) {
        // Registrar en el log los datos del recordatorio
        error_log("Procesando recordatorio: " . json_encode($row));

        // Configuración del servidor SMTP usando variables del .env
        $mail->isSMTP();
        $mail->Host = $_ENV['MAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['MAIL_USERNAME'];
        $mail->Password = $_ENV['MAIL_PASSWORD'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = $_ENV['MAIL_PORT'];

        // Datos del correo
        $userEmail = $row['email'];
        $nombreUsuario = $row['usuario_nombre'] . ' ' . $row['usuario_apellido'];
        $titulo = $row['titulo'];
        $descripcion = $row['descripcion'];
        $fecha = $row['fecha'];
        $hora = $row['hora'];
        $mascota = $row['mascota'];

        // Mensaje en formato HTML
        $mensaje = "<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
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
    <div class='header'>
        <h1>Recordatorio de <strong>PetClub</strong></h1>
    </div>
    <div class='content'>
        <p>Hola <strong>$nombreUsuario</strong>,</p>
        <p>Este es un recordatorio para tu mascota <strong>$mascota</strong>:</p>
        <p><strong>Título:</strong> $titulo</p>
        <p><strong>Descripción:</strong> $descripcion</p>
        <p><strong>Fecha:</strong> $fecha</p>
        <p><strong>Hora:</strong> $hora</p>
        <p>¡Esperamos que este recordatorio sea útil para ti y tu mascota!</p>
    </div>
    <div class='footer'>
        <p>Este correo fue enviado automáticamente, por favor no respondas a este mensaje.</p>
        <p>&copy; 2025 PetClub. Todos los derechos reservados.</p>
    </div>
</body>
</html>";

        // Configuración del correo
        $mail->setFrom($_ENV['MAIL_USERNAME'], $_ENV['MAIL_FROM_NAME']);
        $mail->addAddress($userEmail);
        $mail->isHTML(true);
        $mail->Subject = "Recordatorio: $titulo";
        $mail->Body = $mensaje;

        // Enviar el correo
        $mail->send();
    }
} catch (Exception $e) {
    error_log("Error al enviar el correo: " . $mail->ErrorInfo);
}