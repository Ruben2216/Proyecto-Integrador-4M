<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../../Login.php");
    exit();
}

include 'conexion.php';

date_default_timezone_set('America/Mexico_City');
$fecha = isset($_GET['fecha']) ? $_GET['fecha'] : date('Y-m-d');
$usuario_id = $_SESSION['usuario_id'];

// Marcar como completado si se recibe la acción
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['completar_id'])) {
    $id = intval($_POST['completar_id']);
    $conn->query("UPDATE recordatorio SET estado = 'completado' WHERE Recor_Id = $id");
    $fechaRedir = $_POST['fecha'] ?? $fecha;
    header("Location: /Proyecto-Integrador-4M/Activos/BasePHP/ver_recordatorios_dia.php?fecha=" . urlencode($fechaRedir));
    exit();
}

$sql = "SELECT r.*, m.Masc_Nombre, e.Esp_Nombre
        FROM recordatorio r
        INNER JOIN mascota m ON r.Recor_Mascota = m.Masc_Id
        INNER JOIN especie e ON m.Masc_Especie = e.Esp_Id
        WHERE r.Recor_Fecha = ? AND m.Masc_Dueno = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $fecha, $usuario_id);
$stmt->execute();
$resultado = $stmt->get_result();

$imagenes = [
    "Husky Siberiano" => "/Proyecto-Integrador-4M/Activos/Imagenes/fotos_mascotas/Husky Siberiano.avif",
    "Labrador Retriever" => "/Proyecto-Integrador-4M/Activos/Imagenes/fotos_mascotas/Labrador Retriever.jpg",
    "Pastor Alemán" => "/Proyecto-Integrador-4M/Activos/Imagenes/fotos_mascotas/Pastor Aleman.avif",
    "Bulldog Inglés" => "/Proyecto-Integrador-4M/Activos/Imagenes/fotos_mascotas/Bulldog Inglés.avif",
    "Poodle (Caniche)" => "/Proyecto-Integrador-4M/Activos/Imagenes/fotos_mascotas/Poodle(Caniche).avif",
    "Chihuahua" => "/Proyecto-Integrador-4M/Activos/Imagenes/fotos_mascotas/Chihuahua.avif",
    "Golden Retriever" => "/Proyecto-Integrador-4M/Activos/Imagenes/fotos_mascotas/Golden Retriever.avif",
    "Dálmata" => "/Proyecto-Integrador-4M/Activos/Imagenes/fotos_mascotas/Dalmata.avif",
    "Beagle" => "/Proyecto-Integrador-4M/Activos/Imagenes/fotos_mascotas/Beagle.avif",
    "Shih Tzu" => "/Proyecto-Integrador-4M/Activos/Imagenes/fotos_mascotas/Shih Tzu.avif",
    "Boxer" => "/Proyecto-Integrador-4M/Activos/Imagenes/fotos_mascotas/Boxer.avif",
    "Rottweiler" => "/Proyecto-Integrador-4M/Activos/Imagenes/fotos_mascotas/Rottweiler.avif",
    "Border Collie" => "/Proyecto-Integrador-4M/Activos/Imagenes/fotos_mascotas/Border Collie.jpg",
    "Cocker Spaniel" => "/Proyecto-Integrador-4M/Activos/Imagenes/fotos_mascotas/Cocker Spaniel.jpg",
    "Doberman" => "/Proyecto-Integrador-4M/Activos/Imagenes/fotos_mascotas/Doberman.avif",
    "Pug" => "/Proyecto-Integrador-4M/Activos/Imagenes/fotos_mascotas/Pug.avif",
    "Maltés" => "/Proyecto-Integrador-4M/Activos/Imagenes/fotos_mascotas/Maltes.jpg",
    "San Bernardo" => "/Proyecto-Integrador-4M/Activos/Imagenes/fotos_mascotas/San Bernardo.jpg",
    "Akita Inu" => "/Proyecto-Integrador-4M/Activos/Imagenes/fotos_mascotas/Akita Inuavif.avif",
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recordatorios del <?= date("d/m/Y", strtotime($fecha)) ?></title>
    <link rel="stylesheet" href="../css/recordatorios.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="icon" href="/Proyecto-Integrador-4M/Activos/Imagenes/icono_web.png">
    <style>
        /* botones de arriba*/
        .acciones-superiores {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }
    </style>
</head>
<body class="vista-ver-dia">
<header></header>

<div class="contenedor-recordatorios">
    <h1>Recordatorios del <?= date("d/m/Y", strtotime($fecha)) ?></h1>

    <!-- Botones alineados -->
    <div class="acciones-superiores">
        <a href="calendario_recordatorios.php" class="btn-registrar">← Volver al calendario</a>
        <a href="nuevo_recordatorio.php?anio=<?= date('Y', strtotime($fecha)) ?>&mes=<?= date('n', strtotime($fecha)) ?>&dia=<?= date('j', strtotime($fecha)) ?>" class="btn-registrar">+ Agregar para este día</a>
    </div>

    <?php if ($resultado->num_rows > 0): ?>
        <div class="recordatorios-lista">
            <?php while ($row = $resultado->fetch_assoc()): ?>
                <?php
                    $estado = $row['estado'];
                    $fecha_actual = new DateTime('now', new DateTimeZone('America/Mexico_City'));
                    $fecha_recordatorio = new DateTime($row['Recor_Fecha'], new DateTimeZone('America/Mexico_City'));

                    if ($estado === 'completado') {
                        $estado_texto = 'Completado';
                        $clase_estado = 'estado-completado';
                    } elseif ($fecha_recordatorio->format('Y-m-d') === $fecha_actual->format('Y-m-d')) {
                        $estado_texto = 'Activo';
                        $clase_estado = 'estado-activo';
                    } elseif ($fecha_recordatorio < $fecha_actual) {
                        $estado_texto = 'No Completado';
                        $clase_estado = 'estado-no';
                    } else {
                        $estado_texto = 'Pendiente';
                        $clase_estado = 'estado-pendiente';
                    }

                    $raza = $row['Esp_Nombre'];
                    $imagen = isset($imagenes[$raza]) ? $imagenes[$raza] : "/Proyecto-Integrador-4M/Activos/Imagenes/iconos_mascotas/dog.png";
                ?>
                <div class="recordatorio-card">
                    <a href="editar_recordatorio.php?id=<?= $row['Recor_Id'] ?>" class="btn-editar-superior">Editar</a>
                    <img src="<?= htmlspecialchars($imagen) ?>" alt="<?= htmlspecialchars($raza) ?>" class="recordatorio-imagen">
                    <div class="recordatorio-info">
                        <h2><?= htmlspecialchars($row['Recor_Titulo']) ?></h2>
                        <p><strong>Mascota:</strong> <?= htmlspecialchars($row['Masc_Nombre']) ?></p>
                        <p><strong>Descripción:</strong> <?= htmlspecialchars($row['Recor_Descripcion']) ?></p>
                        <p><strong>Hora:</strong> <?= date("g:i A", strtotime($row['Recor_Hora'])) ?></p>
                        <p><strong>Estado:</strong> <span class="<?= $clase_estado ?>"><?= $estado_texto ?></span></p>

                        <div class="acciones-recordatorio">
                            <?php if ($estado !== 'completado'): ?>
                                <form action="ver_recordatorios_dia.php?fecha=<?= $fecha ?>" method="POST">
                                    <input type="hidden" name="completar_id" value="<?= $row['Recor_Id'] ?>">
                                    <input type="hidden" name="fecha" value="<?= $fecha ?>">
                                    <button type="submit" class="btn-completar">✔ Marcar como completado</button>
                                </form>
                            <?php endif; ?>
                            <form action="eliminar_recordatorio.php" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este recordatorio?');">
                                <input type="hidden" name="id" value="<?= $row['Recor_Id'] ?>">
                                <button type="submit" class="btn-eliminar">✖️ Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <p class="sin-recordatorios">No hay recordatorios para este día.</p>
    <?php endif; ?>
</div>

<script src="../javascript/Accesos_permanentes.js"></script>
</body>
</html>
