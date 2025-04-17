<?php
session_start();
//ESTE CODIGO SE ENCARGA DE VERIFICAR SI EL USUARIO YA SE ENCUENTRA AUTENTICADO O NO, Y DEVOLVER UN JSON CON LA INFORMACION DEL USUARIO

//EL JSON DEVUELTO CONTIENE LOS SIGUIENTES CAMPOS:
$response = [];

if (isset($_SESSION['user_name']) && isset($_SESSION['email_email'])) {
    $response['autenticado'] = true;
    $response['nombre'] = $_SESSION['user_name'];
} else if (isset($_SESSION['usuario_id'])) {
    $response['autenticado'] = true;
    $nombre = $_SESSION['usuario_nombre'];
    $apellido = isset($_SESSION['usuario_apellido']) ? $_SESSION['usuario_apellido'] : '';
    $response['nombre'] = trim($nombre . ' ' . $apellido);
} else {
    $response['autenticado'] = false;
}

echo json_encode($response);
