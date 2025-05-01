<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../../Login.php");
    exit();
}

include 'conexion.php';
$usuario_id = $_SESSION['usuario_id'];

$sql = "SELECT r.*, m.Masc_Nombre, e.Esp_Nombre 
        FROM recordatorio r 
        INNER JOIN mascota m ON r.Recor_Mascota = m.Masc_Id 
        INNER JOIN especie e ON m.Masc_Especie = e.Esp_Id
        WHERE m.Masc_Dueno = $usuario_id 
        ORDER BY r.Recor_Fecha ASC";

$resultado = $conn->query($sql);

// Mapeo de imágenes por raza
$imagenes = [
    "Husky Siberiano" => "/Proyecto-Integrador-4M/Activos/Imagenes/fotos_mascotas/Husky Siberiano.avif",
    "Labrador Retriever" => "/Proyecto-Integrador-4M/Activos/Imagenes/fotos_mascotas/Labrador Retriever.jpg",
    "Pastor Alemán" => "/Proyecto-Integrador-4M/Activos/Imagenes/fotos_mascotas/Pastor Aleman.avif",
    "Bulldog Inglés" => "/Proyecto-Integrador-4M/Activos/Imagenes/fotos_mascotas/Bulldog Inglés.avif",
    "Poodle (Caniche)" => "/Proyecto-Integrador-4M/Activos/Imagenes/fotos_mascotas/Poodle(Caniche).avif",
    "Chihuahua" => "/Proyecto-Integrador-4M/Activos/Imagenes/fotos_mascotas/Chihuahua.avif",
    "Golden Retriever" => "/Proyecto-Integrador-4M/Activos/Imagenes/fotos_mascotas/Golden Retriever.avif",
    "Dálmata" => "/Proyecto-Integrador-4M/Activos/Imagenes/fotos_mascotas/Dalmata.avif",
    "Beagle" => "/Proyecto-Integrador-4M/Activos/Imagenes/fotos_mascotas/Beagle.avif",
    "Shih Tzu" => "/Proyecto-Integrador-4M/Activos/Imagenes/fotos_mascotas/Shih Tzu.avif",
    "Boxer" => "/Proyecto-Integrador-4M/Activos/Imagenes/fotos_mascotas/Boxer.avif",
    "Rottweiler" => "/Proyecto-Integrador-4M/Activos/Imagenes/fotos_mascotas/Rottweiler.avif",
    "Border Collie" => "/Proyecto-Integrador-4M/Activos/Imagenes/fotos_mascotas/Border Collie.jpg",
    "Cocker Spaniel" => "/Proyecto-Integrador-4M/Activos/Imagenes/fotos_mascotas/Cocker Spaniel.jpg",
    "Doberman" => "/Proyecto-Integrador-4M/Activos/Imagenes/fotos_mascotas/Doberman.avif",
    "Pug" => "/Proyecto-Integrador-4M/Activos/Imagenes/fotos_mascotas/Pug.avif",
    "Maltés" => "/Proyecto-Integrador-4M/Activos/Imagenes/fotos_mascotas/Maltes.jpg",
    "San Bernardo" => "/Proyecto-Integrador-4M/Activos/Imagenes/fotos_mascotas/San Bernardo.jpg",
    "Akita Inu" => "/Proyecto-Integrador-4M/Activos/Imagenes/fotos_mascotas/Akita Inuavif.avif",
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Recordatorios</title>
    <link rel="stylesheet" href="../css/recordatorios.css">
    <link rel="stylesheet" href="../css/nav.css">
</head>
<body>
    <!-- Nav -->
    <header></header>

    <div class="wrapper">
        <div class="contenedor-recordatorios">
            <h1>Mis Recordatorios</h1>
            <a href="nuevo_recordatorio.php" class="btn-registrar">+ Agregar nuevo recordatorio</a>
            <a href="calendario_recordatorios.php" class="btn-registrar">Ir al calendario</a>
            <div class="recordatorios-lista">
                <?php if ($resultado->num_rows > 0): ?>
                    <?php while($row = $resultado->fetch_assoc()): 
                        $raza = $row['Esp_Nombre'];
                        $imagen = isset($imagenes[$raza]) ? $imagenes[$raza] : "/Proyecto-Integrador-4M/Activos/Imagenes/iconos_mascotas/dog.png";
                    ?>
                        <div class="recordatorio-card">
                            <a href="editar_recordatorio.php?id=<?= $row['Recor_Id']; ?>" class="btn-editar-superior">Editar</a>
                            <img src="<?= htmlspecialchars($imagen) ?>" alt="<?= htmlspecialchars($raza) ?>" class="recordatorio-imagen">
                            <div class="recordatorio-info">
                                <h2><?= htmlspecialchars($row['Recor_Titulo']) ?></h2>
                                <p><strong>Mascota:</strong> <?= htmlspecialchars($row['Masc_Nombre']) ?></p>
                                <p><strong>Descripción:</strong> <?= htmlspecialchars($row['Recor_Descripcion']) ?></p>
                                <p><strong>Fecha:</strong> <?= htmlspecialchars($row['Recor_Fecha']) ?></p>
                                <p><strong>Hora:</strong> <?= date('g:i A', strtotime($row['Recor_Hora'])) ?></p>
                                <div class="acciones-recordatorio">
                                    <form action="eliminar_recordatorio.php" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este recordatorio?');">
                                        <input type="hidden" name="id" value="<?= $row['Recor_Id'] ?>">
                                        <button type="submit" class="btn-eliminar">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p class="sin-recordatorios">Aún no tienes recordatorios registrados.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <footer></footer>
    <script src="../javascript/Accesos_permanentes.js"></script>
</body>
</html>
