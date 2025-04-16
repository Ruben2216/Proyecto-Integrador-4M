<?php
include 'conexion.php';
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuario WHERE Usua_Email = '$email'";
$resultado = $conn->query($sql);

if ($resultado->num_rows == 1) {
    $usuario = $resultado->fetch_assoc();

    if (password_verify($password, $usuario['Usua_Contraseña'])) {
        $_SESSION['usuario_id'] = $usuario['Usua_Id'];
        $_SESSION['usuario_nombre'] = $usuario['Usua_Nombre'];
        $_SESSION['usuario_apellido'] = $usuario['Usua_Apellido'];

        // Si hay una página guardada para redirección, se utiliza
        if (isset($_SESSION['redireccion'])) {
            $destino = $_SESSION['redireccion'];
            unset($_SESSION['redireccion']); // eliminarla para evitar redirecciones futuras no deseadas
            header("Location: ../../$destino");
        } else {
            header("Location: ../../Index.html"); 
        }
        exit();
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "Correo no registrado.";
}
?>
