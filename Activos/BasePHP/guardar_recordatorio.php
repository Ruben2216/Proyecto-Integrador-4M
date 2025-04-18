<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../../Login.php");
    exit();
}

include 'conexion.php';

$mascota = $_POST['Recor_Mascota'];
$titulo = $_POST['Recor_Titulo'];
$descripcion = $_POST['Recor_Descripcion'];
$fecha = $_POST['Recor_Fecha'];
$frecuencia = $_POST['Recor_Frecuencia'];

$sql = "INSERT INTO recordatorio (Recor_Mascota, Recor_Titulo, Recor_Descripcion, Recor_Fecha, Recor_Frecuencia) 
        VALUES ('$mascota', '$titulo', '$descripcion', '$fecha', '$frecuencia')";

if ($conn->query($sql)) {
    header("Location: recordatorios.php");
    exit();
} else {
    echo "Error al guardar recordatorio: " . $conn->error;
}
?>
