<?php
require_once __DIR__ . '/../../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');

$dotenv->load();

$host = $_ENV['DB_HOST'];
$usuario = $_ENV['DB_USER'];
$contrasena = $_ENV['DB_PASS'];
$basededatos = $_ENV['DB_NAME'];
$puerto = $_ENV['DB_PORT'];

$conn = new mysqli($host, $usuario, $contrasena, $basededatos, $puerto);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
} else {
    echo "<script>console.log('Conexión exitosa a la base de datos');</script>";
}
?>
