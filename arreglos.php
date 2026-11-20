<?php
require 'includes/sesion.php';
requerir_sesion();
$titulo = 'Arreglos (arrays)';

// Indexado
$frutas = ['Manzana', 'Plátano', 'Mango', 'Uva'];

// Asociativo
$persona = [
    'nombre'  => 'Carlos',
    'edad'    => 21,
    'ciudad'  => 'Tuxtla Gutiérrez',
    'activo'  => true,
];

// Multidimensional
$materias = [
    ['nombre' => 'Programación Web', 'creditos' => 5, 'calificacion' => 95],
    ['nombre' => 'Bases de Datos',   'creditos' => 5, 'calificacion' => 78],
    ['nombre' => 'Redes',            'creditos' => 4, 'calificacion' => 64],
    ['nombre' => 'Compiladores',     'creditos' => 4, 'calificacion' => 88],
];

// Manipulación de datos
$copia = $frutas;
array_push($copia, 'Sandía');
sort($copia);

include 'includes/header.php';
?>

<div class="explicacion">
    <p>Un arreglo guarda varios valores en una sola variable. Se usa para manipular conjuntos de
    datos: agregar elementos (<code>array_push</code>), ordenarlos (<code>sort</code>), contarlos
    (<code>count</code>), buscarlos (<code>in_array</code>) y recorrerlos con <code>foreach</code>.
    Hay tres formas principales: indexado (claves numéricas), asociativo (claves con nombre) y
    multidimensional (arreglos dentro de arreglos, parecido a una tabla).</p>
</div>

<h3>Arreglo indexado</h3>
<div class="salida">
    <?php foreach ($frutas as $i => $fruta): ?>
        <p>Posición <?= $i ?>: <?= $fruta ?><?= ($fruta === 'Mango') ? ' ← mi favorita' : '' ?></p>
    <?php endforeach; ?>
    <p>Total de elementos: <?= count($frutas) ?></p>
    <p>¿Existe "Uva"? <?= in_array('Uva', $frutas) ? 'Sí' : 'No' ?></p>
</div>

<h3>Arreglo indexado manipulado (array_push + sort)</h3>
<div class="salida">
    <p>Después de agregar "Sandía" y ordenar: <?= implode(', ', $copia) ?></p>
</div>

<h3>Arreglo asociativo</h3>
<table>
    <tr><th>Clave</th><th>Valor</th></tr>
    <?php foreach ($persona as $clave => $valor): ?>
    <tr>
        <td><?= $clave ?></td>
        <td>
            <?php
            if (is_bool($valor)) {
                echo $valor ? 'Sí' : 'No';
            } elseif ($clave === 'edad' && $valor >= 18) {
                echo $valor . ' (mayor de edad)';
            } else {
                echo $valor;
            }
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<h3>Arreglo multidimensional</h3>
<table>
    <tr><th>Materia</th><th>Créditos</th><th>Calificación</th><th>Estado</th></tr>
    <?php
    $suma = 0;
    foreach ($materias as $materia):
        $suma += $materia['calificacion'];
        $aprobada = $materia['calificacion'] >= 70;
    ?>
    <tr>
        <td><?= $materia['nombre'] ?></td>
        <td><?= $materia['creditos'] ?></td>
        <td><?= $materia['calificacion'] ?></td>
        <td class="<?= $aprobada ? 'aprobado' : 'reprobado' ?>"><?= $aprobada ? 'Aprobada' : 'Reprobada' ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<p><strong>Promedio general:</strong> <?= round($suma / count($materias), 2) ?></p>

<?php include 'includes/footer.php'; ?>
