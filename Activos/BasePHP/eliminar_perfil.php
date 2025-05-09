<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../../Login.php");
    exit();
}

include 'conexion.php';

$usuario_id = $_SESSION['usuario_id'];

// Paso 1: Eliminar recordatorios asociados a las mascotas del usuario
$conn->query("DELETE FROM recordatorio WHERE Recor_Mascota IN (SELECT Masc_Id FROM mascota WHERE Masc_Dueno = $usuario_id)");

// Paso 2: Eliminar mascotas del usuario
$conn->query("DELETE FROM mascota WHERE Masc_Dueno = $usuario_id");

// Paso 3: Eliminar el usuario
$conn->query("DELETE FROM usuario WHERE Usua_Id = $usuario_id");

// Cerrar sesión
session_destroy();

// Redirigir al index
header("Location: ../../Index.php");
exit();
