<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../../Login.php");
    exit();
}

include 'conexion.php';

$id_recordatorio = $_GET['id'] ?? null;
$usuario_id = $_SESSION['usuario_id'];

if (!$id_recordatorio) {
    echo "ID de recordatorio no proporcionado.";
    exit();
}

// Obtener datos del recordatorio
$sql = "SELECT * FROM recordatorio WHERE Recor_Id = $id_recordatorio";
$res = $conn->query($sql);
$recordatorio = $res->fetch_assoc();

// Obtener mascotas del usuario para el dropdown
$sql_mascotas = "SELECT Masc_Id, Masc_Nombre FROM mascota WHERE Masc_Dueno = $usuario_id";
$mascotas = $conn->query($sql_mascotas);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Recordatorio</title>
    <link rel="stylesheet" href="../css/recordatorios.css">
    <link rel="stylesheet" href="../css/nav.css">
</head>
<body>
    <!-- Header con navegación -->
    <header></header>

    <div class="contenedor-recordatorios" style="margin-top: 2rem;">
        <h1>Editar Recordatorio</h1>
        <form action="actualizar_recordatorio.php" method="POST" class="formulario-recordatorio">
            <input type="hidden" name="id" value="<?php echo $recordatorio['Recor_Id']; ?>">

            <label for="mascota">Mascota:</label>
            <select name="mascota" required>
                <option value="">--Selecciona--</option>
                <?php while ($m = $mascotas->fetch_assoc()): ?>
                    <option value="<?php echo $m['Masc_Id']; ?>"
                        <?php echo ($m['Masc_Id'] == $recordatorio['Recor_Mascota']) ? 'selected' : ''; ?>>
                        <?php echo $m['Masc_Nombre']; ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <label for="titulo">Título:</label>
            <input type="text" name="titulo" required value="<?php echo htmlspecialchars($recordatorio['Recor_Titulo']); ?>">

            <label for="descripcion">Descripción:</label>
            <input type="text" name="descripcion" required value="<?php echo htmlspecialchars($recordatorio['Recor_Descripcion']); ?>">

            <label for="fecha">Fecha:</label>
            <input type="date" name="fecha" required value="<?php echo date('Y-m-d', strtotime($recordatorio['Recor_Fecha'])); ?>">

            <label for="frecuencia">Frecuencia:</label>
            <select name="frecuencia" required>
                <option value="Diaria" <?php if ($recordatorio['Recor_Frecuencia'] === 'Diaria') echo 'selected'; ?>>Diaria</option>
                <option value="Semanal" <?php if ($recordatorio['Recor_Frecuencia'] === 'Semanal') echo 'selected'; ?>>Semanal</option>
            </select>

            <div class="btn-actualizar">
                <button type="submit">Guardar cambios</button>
                <a href="recordatorios.php" class="volver-link">&larr; Cancelar</a>
            </div>
        </form>
    </div>

    <!-- Carga de navegación -->
    <script src="../javascript/Accesos_permanentes.js"></script>
</body>
</html>
