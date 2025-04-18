<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'conexion.php';
session_start();

// Lógica unificada para registro de usuario (Google o formulario)
// Si existen variables de sesión de Google, se usan, si no, se usan los datos del formulario
if (isset($_SESSION['user_name']) && isset($_SESSION['email_email'])) {
    $nombre = $_SESSION['user_name'];
    $apellido = ""; // Google no proporciona apellido
    $email = $_SESSION['email_email'];
    $password = NULL; // No hay contraseña para Google
} else if (isset($_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['password'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
} else {
    // Si faltan datos requeridos, redirigir al inicio
    header("Location: /Proyecto-Integrador-4M/Index.php");
    exit();
}

// Construir la parte de la contraseña para la consulta para que sea NULL si no se proporciona
$valorPassword = "NULL";
if ($password) { //si el valor de password no es NULL entonces se le asigna el valor de la variable $password
    $valorPassword = "'" . $password . "'"; //se usa "'" porque adentro de las comillas dobles se sustituira el valor de $password
}

// Consulta para insertar usuario solo si no existe, o actualizar nombre si ya existe
$sql = "INSERT INTO usuario (Usua_Nombre, Usua_Apellido, Usua_Email, Usua_Contraseña) VALUES ('" . $nombre . "', '" . $apellido . "', '" . $email . "', " . $valorPassword . ") " .
    "ON DUPLICATE KEY UPDATE Usua_Nombre = VALUES(Usua_Nombre), Usua_Apellido = VALUES(Usua_Apellido)";

if ($conn->query($sql)) {
    // Si fue un nuevo usuario, insert_id será el nuevo ID
    if ($conn->insert_id > 0) {
        $usuario_id = $conn->insert_id;
    } else {
        // Si ya existía, obtenemos el ID por email
        $sql_id = "SELECT Usua_Id FROM usuario WHERE Usua_Email = '" . $email . "'";
        $resultado = $conn->query($sql_id);
        if ($fila = $resultado->fetch_assoc()) {
            $usuario_id = $fila['Usua_Id'];
        } else {
            // Si no se encuentra, redirigir
            header("Location: /Proyecto-Integrador-4M/Index.php");
            exit();
        }
    }
    // Guardar datos de sesión
    $_SESSION['usuario_id'] = $usuario_id;
    $_SESSION['usuario_nombre'] = $nombre;
    $_SESSION['usuario_apellido'] = $apellido;
    // Si el registro fue por formulario, enviar correo de bienvenida
    if (isset($_POST['nombre'])) {
        include __DIR__ . '/../../envio_correo.php';
    }
    // Redirigir al inicio
    header("Location: /Proyecto-Integrador-4M/Index.php");
    exit();
} else {
    // Si hay error en la consulta, redirigir
    header("Location: /Proyecto-Integrador-4M/Index.php");
    exit();
}
