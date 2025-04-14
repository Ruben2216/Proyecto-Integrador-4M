<?php
session_start();

$response = [];

if (isset($_SESSION['usuario_id'])) {
    $response['autenticado'] = true;
    $response['nombre'] = $_SESSION['usuario_nombre'];
} else {
    $response['autenticado'] = false;
}

echo json_encode($response);
