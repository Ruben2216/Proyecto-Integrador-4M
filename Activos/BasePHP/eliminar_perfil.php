<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../../Login.php");
    exit();
}

include 'conexion.php';

$usuario_id = $_SESSION['usuario_id'];
$conn->query("DELETE FROM recordatorio WHERE Recor_Mascota IN (SELECT Masc_Id FROM mascota WHERE Masc_Dueno = $usuario_id)");
$conn->query("DELETE FROM mascota WHERE Masc_Dueno = $usuario_id");
$conn->query("DELETE FROM usuario WHERE Usua_Id = $usuario_id");

// Cerrar sesión
session_destroy();

// Redirigir al index
header("Location: ../../Index.php");
exit();
