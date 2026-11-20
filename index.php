<?php
require 'includes/sesion.php';

$mensaje = '';

if (isset($_GET['accion']) && $_GET['accion'] === 'iniciar') {
    // Inicio de sesión: se guarda la hora de inicio con time().
    if (!isset($_SESSION['inicio'])) {
        $_SESSION['inicio'] = time();
        $_SESSION['visitas'] = 0;
    }
    $mensaje = 'Sesión iniciada correctamente.';
} else {
    // Al entrar al index, si existía una sesión se destruye
    // para poder iniciar una nueva desde cero.
    if (isset($_SESSION['inicio'])) {
        session_unset();
        session_destroy();
        session_start();
        $mensaje = 'La sesión anterior fue destruida. Debes iniciar sesión de nuevo.';
    }
}

$titulo = 'Inicio';
include 'includes/header.php';
?>

<div class="explicacion">
    <p>Esta página controla el ciclo de vida de la sesión. Cada vez que se visita sin iniciar
    sesión, se ejecuta <code>session_destroy()</code> si existía una sesión previa; al presionar
    el botón se llama a <code>session_start()</code> y se guarda la hora de inicio con
    <code>time()</code> en <code>$_SESSION['inicio']</code>.</p>
</div>

<?php if ($mensaje !== ''): ?>
    <p class="salida"><?= $mensaje ?></p>
<?php endif; ?>

<?php if (isset($_SESSION['inicio'])): ?>
    <p>Ya puedes navegar por las páginas del sistema desde el menú.</p>
    <p><a class="boton" href="variables.php">Comenzar recorrido</a></p>
<?php else: ?>
    <p>No hay una sesión activa. Presiona el botón para iniciarla.</p>
    <p><a class="boton" href="index.php?accion=iniciar">INICIAR SESIÓN</a></p>
<?php endif; ?>

<h3>Integrantes del equipo</h3>
<ul>
    <li>Juan Manuel Nucamendi Díaz</li>
    <li>Rubi Esmeralda De los Santos López</li>
    <li>Edson Samuel Jiménez Silvestre</li>
</ul>

<?php include 'includes/footer.php'; ?>
