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

    <!-- Estilos -->
    <link rel="stylesheet" href="../css/mis_mascotas.css"> <!-- reutilizamos -->
    <link rel="stylesheet" href="../css/nav.css">

    <!-- Para que el contenido no se esconda debajo del nav -->
    <style>
        main {
            margin-top: 4.5rem;
        }
    </style>
</head>
<body>
    <!-- Barra de navegación dinámica -->
    <header></header>

    <!-- Contenido principal -->
    <main>
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
        </div>
    </main>

    <!-- Script que carga la barra de navegación (sin footer) -->
    <script src="../javascript/Accesos_permanentes.js"></script>
</body>
</html>
