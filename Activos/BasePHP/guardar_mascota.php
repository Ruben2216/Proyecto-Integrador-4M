<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../../Login.php");
    exit();
}

$nombre = $_POST['nombre'];
$raza = $_POST['raza'];
$nacimiento = $_POST['nacimiento'];
$usuario_id = $_SESSION['usuario_id'];

$sql = "INSERT INTO mascota (Masc_Nombre, Masc_Nacimiento, Masc_Especie, Masc_Dueno)
        VALUES ('$nombre', '$nacimiento', $raza, $usuario_id)";

if ($conn->query($sql)) {
    header("Location: mis_mascotas.php");
} else {
    echo "Error al guardar la mascota.";
}
?>
