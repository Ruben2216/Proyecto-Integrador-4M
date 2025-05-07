<?php
date_default_timezone_set('America/Mexico_City'); // jalar la zona de aqui y no la del servidor de php
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
    <link rel="icon" href="/Proyecto-Integrador-4M/Activos/Imagenes/icono_web.png">

</head>
<body>
    <!-- Header con navegación -->
    <header></header>

    <div class="contenedor-recordatorios" style="margin-top: 2rem;">
        <h1>Agregar Recordatorio</h1>

        <div class="btn-actualizar"><a href="recordatorios.php"><button >Regresar a recordatorios</button></a></div>
            
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
            
            <?php
            // Si hay día/mes/año en la URL, usamos esa fecha
            if (isset($_GET['anio'], $_GET['mes'], $_GET['dia'])) {
                $anio = (int)$_GET['anio'];
                $mes  = (int)$_GET['mes'];
                $dia  = (int)$_GET['dia'];

                // Aseguramos formato YYYY-MM-DD con ceros donde sea necesario
                $fecha_seleccionada = sprintf("%04d-%02d-%02d", $anio, $mes, $dia);
            } else {
                // Si no hay fecha en la URL, usamos la fecha actual
                $fecha_seleccionada = date("Y-m-d");
            }
            ?>
            <label for="Recor_Fecha">Fecha:</label>
            <input type="date" name="Recor_Fecha" id="Recor_Fecha" required value="<?php echo date("Y-m-d");?>" min="<?php echo date('Y-m-d'); ?>">

            <label for="Recor_Hora">Hora:</label>
            <input type="time" name="Recor_Hora" id="Recor_Hora" required>

            <div class="btn-actualizar">
                <button type="submit">Guardar Recordatorio</button>
            </div>
        </form>
    </div>

    <!-- Script que carga el header dinámico -->
    <script src="../javascript/Accesos_permanentes.js"></script>
</body>
</html>
</html>