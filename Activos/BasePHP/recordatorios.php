<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../../Login.php");
    exit();
}

include 'conexion.php';
$usuario_id = $_SESSION['usuario_id'];

$sql = "SELECT r.*, m.Masc_Nombre 
        FROM recordatorio r 
        INNER JOIN mascota m ON r.Recor_Mascota = m.Masc_Id 
        WHERE m.Masc_Dueno = $usuario_id 
        ORDER BY r.Recor_Fecha ASC";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Recordatorios</title>
    <link rel="stylesheet" href="../css/recordatorios.css">
    <link rel="stylesheet" href="../css/nav.css">
</head>
<body>
    <!-- Nav -->
    <header></header>

    <div class="wrapper">
        <div class="contenedor-recordatorios">
            <h1>Mis Recordatorios</h1>
            <a href="nuevo_recordatorio.php" class="btn-registrar">+ Agregar nuevo recordatorio</a>

            <div class="recordatorios-lista">
                <?php if ($resultado->num_rows > 0): ?>
                    <?php while($row = $resultado->fetch_assoc()): ?>
                        <div class="recordatorio-card">
                            <a href="editar_recordatorio.php?id=<?php echo $row['Recor_Id']; ?>" class="btn-editar-superior" title="Editar">Editar</a>
                            <h2><?php echo htmlspecialchars($row['Recor_Titulo']); ?></h2>
                            <p><strong>Mascota:</strong> <?php echo htmlspecialchars($row['Masc_Nombre']); ?></p>
                            <p><strong>Descripción:</strong> <?php echo htmlspecialchars($row['Recor_Descripcion']); ?></p>
                            <p><strong>Fecha:</strong> <?php echo htmlspecialchars($row['Recor_Fecha']); ?></p>
                            <p><strong>Frecuencia:</strong> <?php echo htmlspecialchars($row['Recor_Frecuencia']); ?></p>
                            <div class="acciones-recordatorio">
                                <form action="eliminar_recordatorio.php" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este recordatorio?');">
                                    <input type="hidden" name="id" value="<?php echo $row['Recor_Id']; ?>">
                                    <button type="submit" class="btn-eliminar">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p class="sin-recordatorios">Aún no tienes recordatorios registrados.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Footer (oculto por JS si aplica) -->
    <footer></footer>

    <!-- Script que carga nav y footer -->
    <script src="../javascript/Accesos_permanentes.js"></script>
</body>
</html>
