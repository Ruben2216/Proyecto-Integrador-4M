<?php
$host = "localhost";
$usuario = "root";
$contrasena = "1234"; //cambiar si es diferente
$basededatos = "PetClub";
$puerto=3306; //cambiar si es diferente

$conn = new mysqli($host, $usuario, $contrasena, $basededatos, $puerto);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
} else {
    //imprimir en consola
    echo "<script>console.log('Conexión exitosa a la base de datos');</script>";
}
?>
