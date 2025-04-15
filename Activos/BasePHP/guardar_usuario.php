<?php
include 'conexion.php';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encriptar contraseña

$sql = "INSERT INTO usuario (Usua_Nombre, Usua_Apellido, Usua_Email, Usua_Contraseña) 
        VALUES ('$nombre', '$apellido', '$email', '$password')";

if ($conn->query($sql)) {
    // se debw incluir el archivo correo.php para enviar el correo
    $_POST['email'] = $email;
    include '../../correo.php'; //enviar al php de correo el correo del usuario

    header("Location: ../../Index.html"); 
    exit();
} else {
    echo "Error al registrar usuario: " . $conn->error;
}
?>
