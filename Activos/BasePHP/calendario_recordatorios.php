<?php
require 'conexion.php'; // Solo una vez y al inicio

$nombresDias = ['DOM', 'LUN', 'MAR', 'MIE', 'JUE', 'VIE', 'SAB'];

$mes = isset($_GET['mes']) ? $_GET['mes'] : date('n');
$anio = isset($_GET['anio']) ? $_GET['anio'] : date('Y');

// Esto asume que $db ya está correctamente definido en conexion.php
$recordatorios = [];

$sql = "SELECT Recor_Fecha, Recor_Titulo FROM recordatorio WHERE YEAR(Recor_Fecha) = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $anio);
$stmt->execute();
$resultado = $stmt->get_result();

while ($fila = $resultado->fetch_assoc()) {
    $fecha = $fila['Recor_Fecha'];
    $dia = (int)date('j', strtotime($fecha));
    $mesRecordatorio = (int)date('n', strtotime($fecha));
    $recordatorios[$mesRecordatorio][$dia][] = $fila['Recor_Titulo'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calendario Anual</title>
    <link rel="stylesheet" href="../css/recordatorios.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/calendario.css">
</head>
<body>
    <header></header>
    <div class="calendarios">
        <h1><?php echo $anio; ?></h1>
        <a href="recordatorios.php"><button type="button">Regresar a recordatorios</button></a>
        <div class="calendario-grid">
        <?php for ($m = 1; $m <= 12; $m++): ?>
            <?php
                $primerDiaMes = mktime(0, 0, 0, $m, 1, $anio);
                $diaSemana = date('w', $primerDiaMes);
                $diasDeMes = cal_days_in_month(CAL_GREGORIAN, $m, $anio);
            ?>
            <table border="1" cellspacing="0" cellpadding="5" class="calendario">
                <tr class="NombreMes" onclick="window.location.href='recordatorios.php'">
                    <th colspan="7"><h3><?php echo date('F', $primerDiaMes); ?></h3></th>
                </tr>
                <tr class="diasCalendario">
                    <?php foreach ($nombresDias as $dia): ?>
                        <th><?php echo $dia; ?></th>
                    <?php endforeach; ?>
                </tr>
                <tr>
                    <?php
                        for ($i = 0; $i < $diaSemana; $i++) echo "<td></td>";

                        for ($dia = 1; $dia <= $diasDeMes; $dia++) {
                            echo "<td onclick=\"window.location.href='nuevo_recordatorio.php'\"";;
                            if (isset($recordatorios[$m][$dia])) {
                                echo ' class="con-recordatorio" title="' . implode(', ', $recordatorios[$m][$dia]) . '"';
                            }
                            echo ">$dia</td>";
                            $diaSemana++;
                            if ($diaSemana % 7 == 0) echo "</tr><tr>";
                        }

                        while ($diaSemana % 7 != 0) {
                            echo "<td></td>";
                            $diaSemana++;
                        }
                    ?>
                </tr>
            </table>
        <?php endfor; ?>
        </div>
    </div>

    <div style="margin-top: 20px;">
        <a href="?anio=<?php echo ($anio - 1); ?>"><button type="button">Año Anterior</button></a>
        <a href="?anio=<?php echo ($anio + 1); ?>"><button type="button">Siguiente Año</button></a>
    </div>

    <footer></footer>
    <script src="../javascript/Accesos_permanentes.js"></script>
</body>
</html>
