<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../../Login.php");
    exit();
}

include 'conexion.php';
$usuario_id = $_SESSION['usuario_id'];
date_default_timezone_set('America/Mexico_City');
$ahora = new DateTime();

$sql = "SELECT r.*, m.Masc_Nombre, e.Esp_Nombre 
        FROM recordatorio r 
        INNER JOIN mascota m ON r.Recor_Mascota = m.Masc_Id 
        INNER JOIN especie e ON m.Masc_Especie = e.Esp_Id
        WHERE m.Masc_Dueno = $usuario_id 
        ORDER BY r.Recor_Fecha ASC";

$resultado = $conn->query($sql);

$estados = [
    'completado' => [],
    'no completado' => [],
    'activo' => [],
    'pendiente' => []
];

while($row = $resultado->fetch_assoc()) {
    $fechaHora = DateTime::createFromFormat('Y-m-d H:i:s', $row['Recor_Fecha'] . ' ' . $row['Recor_Hora']);
    $estado_actual = $row['estado'];

    if ($estado_actual === 'completado') {
        $estados['completado'][] = $row;
    } elseif ($fechaHora < $ahora) {
        $estados['no completado'][] = $row;
    } elseif ($fechaHora->format('Y-m-d') === $ahora->format('Y-m-d')) {
        $estados['activo'][] = $row;
    } else {
        $estados['pendiente'][] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen de Actividades</title>
    <link rel="stylesheet" href="../css/recordatorios.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/actividades.css">
    <link rel="icon" href="/Proyecto-Integrador-4M/Activos/Imagenes/icono_web.png">
</head>
<body>
<header></header>
<div class="wrapper">
    <div class="contenedor-recordatorios">
        <h2>📋 Historial de Actividades</h2>
        <div class="resumen">
            <p>✅ Completados: <?= count($estados['completado']) ?></p>
            <p>❌ No Completados: <?= count($estados['no completado']) ?></p>
            <p>📅 Activos: <?= count($estados['activo']) ?></p>
            <p>🕒 Pendientes: <?= count($estados['pendiente']) ?></p>
        </div>

        <?php foreach ($estados as $tipo => $lista): ?>
            <?php if (!empty($lista)): ?>
                <h3 style="margin-top: 30px;">
                    <?php
                        switch ($tipo) {
                            case 'completado': echo '✅ Completados'; break;
                            case 'no completado': echo '❌ No Completados'; break;
                            case 'activo': echo '📅 Activos'; break;
                            case 'pendiente': echo '🕒 Pendientes'; break;
                        }
                    ?>
                </h3>
                <ul>
                    <?php foreach ($lista as $item): ?>
                        <li>
                            <strong><?= htmlspecialchars($item['Recor_Titulo']) ?></strong> —
                            <?= htmlspecialchars($item['Masc_Nombre']) ?> —
                            <?= date("d/m/Y", strtotime($item['Recor_Fecha'])) ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>
<script src="../javascript/Accesos_permanentes.js"></script>
<script src="../javascript/procesar_recordatorios.js"></script>
</body>
</html>
