<?php
$actual = basename($_SERVER['PHP_SELF']);
$paginas = [
    'index.php'         => 'Inicio',
    'variables.php'     => 'Variables',
    'condicionales.php' => 'Condicionales',
    'bucles.php'        => 'Bucles',
    'arreglos.php'      => 'Arreglos',
    'sesiones.php'      => 'Sesiones',
];
?>
<nav class="menu">
    <ul>
        <?php foreach ($paginas as $archivo => $texto): ?>
            <li><a href="<?= $archivo ?>" class="<?= ($archivo === $actual) ? 'activo' : '' ?>"><?= $texto ?></a></li>
        <?php endforeach; ?>
    </ul>
</nav>
