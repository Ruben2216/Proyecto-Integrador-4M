<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../../Login.php");
    exit();
}

include 'conexion.php';

$usuario_id = $_SESSION['usuario_id'];
$sql = "SELECT * FROM usuario WHERE Usua_Id = $usuario_id";
$resultado = $conn->query($sql);
$usuario = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Perfil</title>
    <link rel="stylesheet" href="../css/perfil.css">
</head>
<body>
    <a href="../../Index.html" class="regresar-btn">← Regresar al inicio</a>

    <div class="perfil-card">
        <div class="perfil-header">
            <img src="../Imagenes/fotoperfil.png" alt="Foto de perfil" class="perfil-foto">
            <h2><?= $usuario['Usua_Nombre'] . ' ' . $usuario['Usua_Apellido'] ?></h2>
            <p class="correo"><?= $usuario['Usua_Email'] ?></p>
        </div>

        <form action="actualizar_perfil.php" method="POST" class="perfil-datos">
            <div class="dato">
                <label>Nombre:</label>
                <input type="text" name="nombre" value="<?= $usuario['Usua_Nombre'] ?>">
            </div>

            <div class="dato">
                <label>Apellido:</label>
                <input type="text" name="apellido" value="<?= $usuario['Usua_Apellido'] ?>">
            </div>

            <div class="dato">
                <label>Correo electrónico:</label>
                <input type="email" value="<?= $usuario['Usua_Email'] ?>" readonly>
            </div>

            <div class="dato">
                <label>Edad:</label>
                <input type="number" name="edad" value="<?= $usuario['Usua_Edad'] ?>">
            </div>

            <div class="dato">
                <label>Género:</label>
                <select name="genero">
                    <option value="">Selecciona</option>
                    <option value="Masculino" <?= $usuario['Usua_Genero'] == 'Masculino' ? 'selected' : '' ?>>Masculino</option>
                    <option value="Femenino" <?= $usuario['Usua_Genero'] == 'Femenino' ? 'selected' : '' ?>>Femenino</option>
                    <option value="Otro" <?= $usuario['Usua_Genero'] == 'Otro' ? 'selected' : '' ?>>Otro</option>
                </select>
            </div>

            <div class="dato">
                <label>Teléfono:</label>
                <input type="text" name="telefono" value="<?= $usuario['Usua_Telefono'] ?>">
            </div>

            <div class="dato">
                <label>Dirección:</label>
                <textarea name="direccion"><?= $usuario['Usua_Direccion'] ?></textarea>
            </div>

            <div class="btn-actualizar">
                <button type="submit">Actualizar</button>
            </div>
        </form>
    </div>
    
    <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'ok'): ?>
    <div class="toast">✅ Perfil actualizado con éxito</div>
    <script>
        setTimeout(() => {
            document.querySelector('.toast').style.opacity = '0';
        }, 3000);
    </script>
<?php endif; ?>

</body>
</html>

