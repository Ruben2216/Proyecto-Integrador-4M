<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../../Login.php");
    exit();
}

include 'conexion.php';

// Capturar los datos del formulario
$mascota = $_POST['Recor_Mascota'];
$titulo = $_POST['Recor_Titulo'];
$descripcion = $_POST['Recor_Descripcion'];
$fecha = $_POST['Recor_Fecha'];
$hora = $_POST['Recor_Hora']; // Ahora capturamos la hora en lugar de frecuencia

$sql = "INSERT INTO recordatorio (Recor_Mascota, Recor_Titulo, Recor_Descripcion, Recor_Fecha, Recor_Hora) 
        VALUES ('$mascota', '$titulo', '$descripcion', '$fecha', '$hora')";

if ($conn->query($sql)) {
    header("Location: recordatorios.php");
    exit();
} else {
    echo "Error al guardar recordatorio: " . $conn->error;
}
?>
