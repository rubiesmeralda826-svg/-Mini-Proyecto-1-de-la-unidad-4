<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($titulo) ?> | Mini Proyecto PHP</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<header class="encabezado">
    <h1>Mini Proyecto 1 – Desarrollo Web con PHP</h1>
    <p>Programación Web · Unidad 4 · Programación del lado del servidor</p>
</header>

<?php include 'includes/menu.php'; ?>

<?php if (isset($_SESSION['inicio'])):
    $inicio = $_SESSION['inicio'];
    $ahora = time();
    list($minutos, $segundos) = tiempo_activo($inicio);
?>
<section class="panel-sesion">
    <p><strong>Hora inicio sesión:</strong> <?= date('H:i:s', $inicio) ?></p>
    <p><strong>Hora actual:</strong> <?= date('H:i:s', $ahora) ?></p>
    <p><strong>Tiempo activo:</strong> <?= $minutos ?> minutos <?= $segundos ?> segundos</p>
    <p><a class="boton boton-rojo" href="index.php">Reiniciar sesión</a></p>
</section>
<?php endif; ?>

<main class="contenedor">
    <h2><?= htmlspecialchars($titulo) ?></h2>
