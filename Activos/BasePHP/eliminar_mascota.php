<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../../Login.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
$mascota_id = $_POST['mascota_id'];

// Verifica que la mascota sea del usuario
$sql = "DELETE FROM mascota WHERE Masc_Id = $mascota_id AND Masc_Dueno = $usuario_id";

if ($conn->query($sql)) {
    header("Location: mis_mascotas.php");
} else {
    echo "Error al eliminar la mascota.";
}
?>
