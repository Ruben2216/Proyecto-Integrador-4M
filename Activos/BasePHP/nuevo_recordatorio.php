<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../../Login.php");
    exit();
}

include 'conexion.php';
$usuario_id = $_SESSION['usuario_id'];

// Obtener mascotas del usuario
$sql_mascotas = "SELECT * FROM mascota WHERE Masc_Dueno = $usuario_id";
$mascotas = $conn->query($sql_mascotas);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Recordatorio</title>
    <link rel="stylesheet" href="../css/recordatorios.css">
    <link rel="stylesheet" href="../css/nav.css">
</head>
<body>
    <!-- Header con navegación -->
    <header></header>

    <div class="contenedor-recordatorios" style="margin-top: 2rem;">
        <h1>Agregar Recordatorio</h1>

        <form action="guardar_recordatorio.php" method="POST" class="formulario-recordatorio">
            <label for="Recor_Mascota">Mascota:</label>
            <select name="Recor_Mascota" id="Recor_Mascota" required>
                <option value="">--Selecciona--</option>
                <?php while($row = $mascotas->fetch_assoc()): ?>
                    <option value="<?php echo $row['Masc_Id']; ?>"><?php echo htmlspecialchars($row['Masc_Nombre']); ?></option>
                <?php endwhile; ?>
            </select>

            <label for="Recor_Titulo">Título:</label>
            <input type="text" name="Recor_Titulo" id="Recor_Titulo" placeholder="Ej. Vacuna anual" required>

            <label for="Recor_Descripcion">Descripción:</label>
            <input type="text" name="Recor_Descripcion" id="Recor_Descripcion" placeholder="Detalles del recordatorio" required>

            <label for="Recor_Fecha">Fecha:</label>
            <input type="date" name="Recor_Fecha" id="Recor_Fecha" required>

            <label for="Recor_Hora">Hora:</label>
            <input type="time" name="Recor_Hora" id="Recor_Hora" required>

            <label for="regularidad">Regularidad:</label>
            <select id="regularidad" name="regularidad" required>
                <option value="unico">una vez</option>
                <option value="diario">Diario</option>
                <option value="semanal">Semanal</option>
                <option value="mensual">Mensual</option>
                <option value="anual">Anual</option>
            </select>

            <div class="btn-actualizar">
                <button type="submit">Guardar Recordatorio</button>
            </div>
        </form>
    </div>

    <!-- Script que carga el header dinámico -->
    <script src="../javascript/Accesos_permanentes.js"></script>
</body>
</html>
