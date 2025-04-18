<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../../Login.php");
    exit();
}

include 'conexion.php';
$razas = $conn->query("SELECT * FROM especie");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Mascota</title>
    <link rel="stylesheet" href="../css/mis_mascotas.css">
    <link rel="stylesheet" href="../css/nav.css">
</head>
<body>
    <!-- Header dinámico -->
    <header></header>

    <div class="contenedor-mascotas" style="margin-top: 4rem;">
        <h1>Agregar Nueva Mascota</h1>
        <form action="guardar_mascota.php" method="POST" class="formulario-mascota">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required>

            <label for="raza">Raza:</label>
            <select name="raza" id="raza" required>
                <option value="">--Selecciona--</option>
                <?php while ($r = $razas->fetch_assoc()): ?>
                    <option value="<?= $r['Esp_Id'] ?>"><?= $r['Esp_Nombre'] ?></option>
                <?php endwhile; ?>
            </select>

            <label for="nacimiento">Fecha de nacimiento:</label>
            <input type="date" name="nacimiento" id="nacimiento" required>

            <div class="btn-actualizar">
                <button type="submit">Guardar Mascota</button>
            </div>
        </form>
    </div>

    <!-- Footer (opcional, se oculta por JS en esta página) -->
    <footer></footer>

    <!-- Script que carga nav/footer -->
    <script src="../javascript/Accesos_permanentes.js"></script>
</body>
</html>
