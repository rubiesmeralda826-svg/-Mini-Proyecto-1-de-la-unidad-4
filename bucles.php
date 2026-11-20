<?php
require 'includes/sesion.php';
requerir_sesion();
$titulo = 'Bucles: for, while y foreach';

$alumnos = [
    ['nombre' => 'Ana',   'carrera' => 'Sistemas',   'semestre' => 5],
    ['nombre' => 'Luis',  'carrera' => 'Informática', 'semestre' => 3],
    ['nombre' => 'María', 'carrera' => 'Sistemas',   'semestre' => 7],
];
$tareas = ['Leer documentación', 'Escribir código', 'Probar el sitio', 'Subir a GitHub'];

include 'includes/header.php';
?>

<div class="explicacion">
    <p>Los bucles sirven para repetir instrucciones sin escribirlas varias veces.
    <code>for</code> se usa cuando se conoce el número de repeticiones; <code>while</code>
    repite mientras una condición sea verdadera; <code>foreach</code> recorre cada elemento
    de un arreglo. Con ellos se generan listas y tablas HTML dinámicamente a partir de datos.</p>
</div>

<h3>for: tabla de multiplicar del 7</h3>
<table>
    <tr><th>Operación</th><th>Resultado</th></tr>
    <?php for ($i = 1; $i <= 10; $i++): ?>
    <tr><td>7 × <?= $i ?></td><td><?= 7 * $i ?></td></tr>
    <?php endfor; ?>
</table>

<h3>while: lista de tareas numerada</h3>
<ol>
    <?php
    $indice = 0;
    while ($indice < count($tareas)) {
        echo "<li>" . $tareas[$indice] . "</li>";
        $indice++;
    }
    ?>
</ol>

<h3>while: suma acumulada hasta superar 50</h3>
<div class="salida">
    <?php
    $suma = 0;
    $numero = 1;
    while ($suma <= 50) {
        $suma += $numero;
        echo "Se suma $numero → acumulado: $suma<br>";
        $numero++;
    }
    ?>
</div>

<h3>foreach: tabla de alumnos generada desde un arreglo</h3>
<table>
    <tr><th>#</th><th>Nombre</th><th>Carrera</th><th>Semestre</th></tr>
    <?php foreach ($alumnos as $posicion => $alumno): ?>
    <tr>
        <td><?= $posicion + 1 ?></td>
        <td><?= $alumno['nombre'] ?></td>
        <td><?= $alumno['carrera'] ?></td>
        <td><?= $alumno['semestre'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<?php include 'includes/footer.php'; ?>
