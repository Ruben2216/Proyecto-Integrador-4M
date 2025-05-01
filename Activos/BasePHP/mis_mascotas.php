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

// Mapeo de razas a imágenes
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
    <title>Mis Mascotas</title>

    <link rel="stylesheet" href="../css/mis_mascotas.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/footer.css">

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
        .mascotas-lista {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .mascota-card {
            background-color: white;
            width: 250px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: transform 0.2s ease, box-shadow 0.3s ease;
        }
        .mascota-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(94,106,58,0.4);
        }
        .imagen-raza img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            display: block;
        }
        .info-mascota {
            padding: 15px;
            text-align: center;
            color: #5e6a3a;
        }
        .info-mascota h2 {
            margin: 10px 0;
            font-size: 20px;
            font-weight: 700;
        }
        .info-mascota p {
            margin: 5px 0;
            font-size: 14px;
        }
        .btn-eliminar {
            background-color: #dc3545;
            color: white;
            padding: 6px 12px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            margin-top: 10px;
            transition: background-color 0.3s, transform 0.2s;
        }
        .btn-eliminar:hover {
            background-color: #a71d2a;
            transform: translateY(-2px);
        }
        .btn-eliminar:active {
            transform: scale(0.95);
        }
    </style>
</head>
<body>

<header></header>

<div class="wrapper">
    <main style="margin-top: 4.5rem;">
        <div class="contenedor-mascotas">
            <h1>Mis Mascotas</h1>
            <a href="registrar_mascota.php" class="btn-registrar">+ Registrar nueva mascota</a> 

            <?php if ($resultado->num_rows > 0): ?>
                <div class="mascotas-lista">
                    <?php while($fila = $resultado->fetch_assoc()): 
                        $raza = $fila['Esp_Nombre'];
                        $imagen = isset($imagenes[$raza]) ? $imagenes[$raza] : "/Proyecto-Integrador-4M/Activos/Imagenes/iconos_mascotas/dog.png"; 
                    ?>
                        <div class="mascota-card">
                            <div class="imagen-raza">
                                <img src="<?php echo htmlspecialchars($imagen); ?>" alt="<?php echo htmlspecialchars($raza); ?>" class="icono-raza">
                            </div>
                            <div class="info-mascota">
                                <h2><?= htmlspecialchars($fila['Masc_Nombre']) ?></h2>
                                <p><strong>Raza:</strong> <?= htmlspecialchars($raza) ?></p>
                                <p><strong>Nacimiento:</strong> <?= htmlspecialchars($fila['Masc_Nacimiento']) ?></p>
                                <form method="POST" action="eliminar_mascota.php" onsubmit="return confirm('¿Estás seguro de eliminar esta mascota?');">
                                    <input type="hidden" name="mascota_id" value="<?= $fila['Masc_Id'] ?>">
                                    <button type="submit" class="btn-eliminar">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <div class="sin-mascotas">
                    <img src="/Proyecto-Integrador-4M/Activos/Imagenes/perrotriste.png" alt="Sin mascotas" style="max-width: 320px; margin-bottom: 20px;">
                    <p>Aún no tienes mascotas registradas.</p>
                </div>
            <?php endif; ?>
        </div>
    </main>
</div>

<footer></footer>

<script src="../javascript/Accesos_permanentes.js"></script>
</body>
</html>
