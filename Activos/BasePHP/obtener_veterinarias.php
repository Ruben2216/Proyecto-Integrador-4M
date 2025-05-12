<?php
include 'conexion.php';

$sql = "SELECT nombre, lat, lon, url, direccion, telefono, horario_abierto, horario_cerrado FROM veterinarias";
$result = $conn->query($sql);

$veterinarias = [];

while ($row = $result->fetch_assoc()) {
    $veterinarias[] = $row;
}

header('Content-Type: application/json');
echo json_encode($veterinarias);
?>
