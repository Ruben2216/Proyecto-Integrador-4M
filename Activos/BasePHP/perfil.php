<?php
session_start();

// Si no hay sesión, redirige al login
if (!isset($_SESSION['usuario_id'])) {
    header("Location: Login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Perfil</title>
    <link rel="stylesheet" href="Activos/css/estilo_login.css"> 
</head>
<body>
    <a href="/Proyecto-Integrador-4M/Index.html">← Volver al inicio</a>

    <div class="perfil">
        <h1>Mi Perfil</h1>
        <p><strong>Nombre:</strong> <?php echo $_SESSION['usuario_nombre']; ?></p>
        <p><strong>ID de Usuario:</strong> <?php echo $_SESSION['usuario_id']; ?></p>
        <br>
        <a href="logout.php">Cerrar sesión</a>
    </div>
</body>
</html>
