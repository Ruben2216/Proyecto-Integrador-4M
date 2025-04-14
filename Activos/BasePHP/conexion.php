<?php
$host = "localhost";
$usuario = "root";
$contrasena = "";
$basededatos = "PetClub";

$conn = new mysqli($host, $usuario, $contrasena, $basededatos);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
