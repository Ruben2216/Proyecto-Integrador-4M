<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../../Login.php");
    exit();
}

include 'conexion.php';

$usuario_id = $_SESSION['usuario_id'];

$sql = "SELECT m.Masc_Id, m.Masc_Nombre, m.Masc_Nacimiento, e.Esp_Nombre 
        FROM mascota m
        INNER JOIN especie e ON m.Masc_Especie = e.Esp_Id
        WHERE m.Masc_Dueno = $usuario_id";

$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Mascotas</title>

    <!-- Estilos específicos de esta página -->
    <link rel="stylesheet" href="../css/mis_mascotas.css">

    <!-- Estilo de la barra de navegación -->
    <link rel="stylesheet" href="../css/nav.css">

    <!-- Estilo del footer -->
    <link rel="stylesheet" href="../css/footer.css">

    <!-- Estilo para sticky footer -->
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        .wrapper {
            flex: 1;
        }
    </style>
</head>
<body>
    <!-- Header dinámico -->
    <header></header>

    <!-- Contenedor flexible para que el footer quede abajo -->
    <div class="wrapper">
        <!-- Contenido principal -->
        <main style="margin-top: 4.5rem;">
            <div class="contenedor-mascotas">
                <h1>Mis Mascotas</h1>   

                <a href="registrar_mascota.php" class="btn-registrar">+ Registrar nueva mascota</a> 

                <?php if ($resultado->num_rows > 0): ?>
                    <div class="mascotas-lista">
                        <?php while($fila = $resultado->fetch_assoc()): ?>
                            <div class="mascota-card">
                                <h2><?= htmlspecialchars($fila['Masc_Nombre']) ?></h2>
                                <p><strong>Raza:</strong> <?= htmlspecialchars($fila['Esp_Nombre']) ?></p>
                                <p><strong>Nacimiento:</strong> <?= htmlspecialchars($fila['Masc_Nacimiento']) ?></p>
                                <form method="POST" action="eliminar_mascota.php" onsubmit="return confirm('¿Estás seguro de eliminar esta mascota?');">
                                    <input type="hidden" name="mascota_id" value="<?= $fila['Masc_Id'] ?>">
                                    <button type="submit" class="btn-eliminar">Eliminar</button>
                                </form>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php else: ?>
                    <p class="sin-mascotas">Aún no tienes mascotas registradas.</p>
                <?php endif; ?>

            </div>
        </main>
    </div>

    <!-- Footer dinámico -->
    <footer></footer>

    <!-- Script que carga el header y footer -->
    <script src="../javascript/Accesos_permanentes.js"></script>
</body>
</html>
