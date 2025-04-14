<?php
include 'conexion.php';

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encriptar contraseña

$sql = "INSERT INTO usuario (Usua_Nombre, Usua_Email, Usua_Contraseña) 
        VALUES ('$nombre', '$email', '$password')";

if ($conn->query($sql)) {
    header("Location: ../../Index.html"); 
    exit();
} else {
    echo "Error al registrar usuario: " . $conn->error;
}
?>
