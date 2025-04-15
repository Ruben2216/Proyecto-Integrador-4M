<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include 'conexion.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../../Login.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

//recibe los valores del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = $_POST['edad'];
$genero = $_POST['genero'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];

//actualiza el campo que hayas modificado 
$campos = [];

if (!empty($nombre)) {
    $campos[] = "Usua_Nombre = '$nombre'";
}
if (!empty($apellido)) {
    $campos[] = "Usua_Apellido = '$apellido'";
}
if (!empty($edad)) {
    $campos[] = "Usua_Edad = '$edad'";
}
if (!empty($genero)) {
    $campos[] = "Usua_Genero = '$genero'";
}
if (!empty($telefono)) {
    $campos[] = "Usua_Telefono = '$telefono'";
}
if (!empty($direccion)) {
    $campos[] = "Usua_Direccion = '$direccion'";
}

if (!empty($campos)) {
    $sql = "UPDATE usuario SET " . implode(', ', $campos) . " WHERE Usua_Id = $usuario_id";
    if ($conn->query($sql) === TRUE) {
        header("Location: perfil.php?mensaje=ok");
        exit();
    } else {
        echo "Error al actualizar: " . $conn->error;
    }
} else {
    echo "No se proporcionó ningún dato para actualizar.";
}
?>
