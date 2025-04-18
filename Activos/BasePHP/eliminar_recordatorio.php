<?php
session_start();

// Verificar que el usuario ha iniciado sesión
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../../Login.php");
    exit();
}

include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
    $recordatorio_id = intval($_POST['id']);
    $usuario_id = $_SESSION['usuario_id'];

    // Eliminar solo si pertenece al usuario autenticado
    $sql = "DELETE r FROM recordatorio r
            INNER JOIN mascota m ON r.Recor_Mascota = m.Masc_Id
            WHERE r.Recor_Id = $recordatorio_id AND m.Masc_Dueno = $usuario_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: recordatorios.php");
        exit();
    } else {
        echo "Error al eliminar el recordatorio: " . $conn->error;
    }
} else {
    echo "Solicitud no válida.";
}
?>
