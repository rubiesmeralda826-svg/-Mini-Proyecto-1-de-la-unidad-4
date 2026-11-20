<?php
require 'includes/sesion.php';
requerir_sesion();
$titulo = 'Manejo de sesiones';

// Contador que persiste entre páginas mientras dure la sesión.
$_SESSION['visitas'] = ($_SESSION['visitas'] ?? 0) + 1;

include 'includes/header.php';
?>

<div class="explicacion">
    <p>Una sesión permite conservar datos en memoria del servidor entre una página y otra, algo
    que HTTP no hace por sí solo. Con <code>session_start()</code> PHP identifica al visitante
    mediante un ID de sesión y habilita el arreglo <code>$_SESSION</code>, donde se guardan los
    datos. Sirve para recordar quién es el usuario, cuánto tiempo lleva en el sitio o
    preferencias, sin base de datos. Con <code>session_destroy()</code> todo se elimina.</p>
    <p>En este proyecto se guarda <code>time()</code> al iniciar sesión y en cada página se
    calcula: tiempo activo = <code>time()</code> actual − hora de inicio.</p>
</div>

<h3>Datos guardados en $_SESSION</h3>
<table>
    <tr><th>Clave</th><th>Valor</th></tr>
    <?php foreach ($_SESSION as $clave => $valor): ?>
    <tr>
        <td><?= $clave ?></td>
        <td>
            <?= ($clave === 'inicio') ? $valor . ' (' . date('d/m/Y H:i:s', $valor) . ')' : $valor ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<h3>Más información de la sesión</h3>
<div class="salida">
    <p>ID de sesión (session_id): <?= session_id() ?></p>
    <p>Veces que has cargado esta página en la sesión: <?= $_SESSION['visitas'] ?></p>
    <?php list($min, $seg) = tiempo_activo($_SESSION['inicio']); ?>
    <p>Tiempo activo calculado: <?= $min ?> min <?= $seg ?> s
       (<?= time() - $_SESSION['inicio'] ?> segundos en total)</p>
</div>

<p>Para destruir la sesión y empezar de nuevo, usa el botón de reinicio:</p>
<p><a class="boton boton-rojo" href="index.php">Reiniciar sesión (session_destroy)</a></p>

<?php include 'includes/footer.php'; ?>
