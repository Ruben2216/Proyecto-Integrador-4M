<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../../Login.php");
    exit();
}

include 'conexion.php';

// Obtener razas desde la tabla especie
$razas = $conn->query("SELECT * FROM especie");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Mascota</title>
    <link rel="stylesheet" href="../css/mis_mascotas.css"> <!-- reutilizamos -->
</head>
<body>
    <div class="contenedor-mascotas">
        <h1>Registrar Nueva Mascota</h1>

        <form action="guardar_mascota.php" method="POST" class="formulario-mascota">
            <label>Nombre:</label>
            <input type="text" name="nombre" required>

            <label>Raza:</label>
            <select name="raza" required>
                <option value="">--Selecciona--</option>
                <?php while ($r = $razas->fetch_assoc()): ?>
                    <option value="<?= $r['Esp_Id'] ?>"><?= $r['Esp_Nombre'] ?></option>
                <?php endwhile; ?>
            </select>

            <label>Fecha de nacimiento:</label>
            <input type="date" name="nacimiento" required>

            <button type="submit" class="btn-registrar">Guardar Mascota</button>
        </form>

        <br>
        <a href="mis_mascotas.php">← Volver a mis mascotas</a>
    </div>
</body>
</html>
