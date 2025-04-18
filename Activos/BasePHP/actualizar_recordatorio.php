<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../../Login.php");
    exit();
}

include 'conexion.php';

$id = $_POST['id'];
$mascota = $_POST['mascota'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$fecha = $_POST['fecha'];
$frecuencia = $_POST['frecuencia'];

// Validación básica
if (!$id || !$mascota || !$titulo || !$descripcion || !$fecha || !$frecuencia) {
    echo "Faltan campos obligatorios.";
    exit();
}

$sql = "UPDATE recordatorio 
        SET Recor_Mascota = ?, Recor_Titulo = ?, Recor_Descripcion = ?, Recor_Fecha = ?, Recor_Frecuencia = ?
        WHERE Recor_Id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("issssi", $mascota, $titulo, $descripcion, $fecha, $frecuencia, $id);

if ($stmt->execute()) {
    header("Location: recordatorios.php");
    exit();
} else {
    echo "Error al actualizar el recordatorio: " . $conn->error;
}
?>
