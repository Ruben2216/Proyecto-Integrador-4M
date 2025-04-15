<?php
session_start();

$response = [];

if (isset($_SESSION['usuario_id'])) {
    $response['autenticado'] = true;
    $nombre = $_SESSION['usuario_nombre'];
    $apellido = isset($_SESSION['usuario_apellido']) ? $_SESSION['usuario_apellido'] : '';
    $response['nombre'] = trim($nombre . ' ' . $apellido);
} else {
    $response['autenticado'] = false;
}

echo json_encode($response);
