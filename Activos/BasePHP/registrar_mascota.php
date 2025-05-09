<?php
date_default_timezone_set('America/Mexico_City'); // jalar la zona de aqui y no la del servidor de php
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
    <link rel="icon" href="/Proyecto-Integrador-4M/Activos/Imagenes/icono_web.png">

</head>
<body>
    <!-- Header dinámico -->
    <header></header>

    <div class="contenedor-mascotas" style="margin-top: 4rem;">
        <h1>Agregar Nueva Mascota</h1>
        <form action="guardar_mascota.php" method="POST" class="formulario-mascota">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required>
            <!-- Inicio Validación Nombre -->
            <span id="error-nombre" style="color: red; font-size: 0.9em; display: none;">Los numeros no estan permitidos (intentelo de nuevo).</span>
            <!-- Fin Validación Nombre -->

            <label for="raza">Raza:</label>
            <select name="raza" id="raza" required>
                <option value="">--Selecciona--</option>
                <?php while ($r = $razas->fetch_assoc()): ?>
                    <option value="<?= $r['Esp_Id'] ?>"><?= $r['Esp_Nombre'] ?></option>
                <?php endwhile; ?>
            </select>

            <label for="nacimiento">Fecha de nacimiento:</label>
            <input type="date" name="nacimiento" id="nacimiento" required min="2000-01-01" max="<?= date("Y-m-d") ?>">

            <div class="btn-actualizar">
                <button type="submit">Guardar Mascota</button>
            </div>
        </form>
    </div>

    <!-- Script que carga nav/footer -->
    <script src="../javascript/Accesos_permanentes.js"></script>

    <!-- Inicio Script Validación Nombre -->
    <script>
    document.querySelector('.formulario-mascota').addEventListener('submit', function(event) {
        const nombreInput = document.getElementById('nombre');
        const errorNombre = document.getElementById('error-nombre');
        const contieneNumeros = /\d/.test(nombreInput.value);

        if (contieneNumeros) {
            errorNombre.style.display = 'block';
            event.preventDefault(); // Evita que se envíe el formulario
        } else {
            errorNombre.style.display = 'none';
        }
    });
    </script>
    <!-- Fin Script Validación Nombre -->
</body>
</html>
