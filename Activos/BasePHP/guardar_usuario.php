<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'conexion.php';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encriptar contraseña

$sql = "INSERT INTO usuario (Usua_Nombre, Usua_Apellido, Usua_Email, Usua_Contraseña) 
        VALUES ('$nombre', '$apellido', '$email', '$password')";

if ($conn->query($sql)) {
    // Obtener el ID del nuevo usuario
    $nuevo_id = $conn->insert_id;

    // Iniciar sesión automáticamente
    session_start();
    $_SESSION['usuario_id'] = $nuevo_id;
    $_SESSION['usuario_nombre'] = $nombre;
    $_SESSION['usuario_apellido'] = $apellido;

    // Incluir envio_correo.php para enviar un correo al nuevo usuario
    include '../../envio_correo.php';

    // Redirigir al index
    header("Location: ../../Index.html");
    exit();
} else {
    echo "Error al registrar usuario: " . $conn->error;
}
