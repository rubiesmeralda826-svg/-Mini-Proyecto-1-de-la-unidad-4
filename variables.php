<?php
require 'includes/sesion.php';
requerir_sesion();
$titulo = 'Variables y tipos de datos';

// Declaración de variables de cada tipo
$nombre   = "Programación Web";   // string
$grupo    = 4;                    // int
$promedio = 92.5;                 // float
$aprobado = true;                 // boolean
$lenguajes = ["PHP", "HTML", "CSS", "JavaScript"]; // array

include 'includes/header.php';
?>

<div class="explicacion">
    <p>En PHP una variable se crea con el signo <code>$</code> seguido de su nombre y se le asigna
    un valor con <code>=</code>; no hace falta declarar el tipo porque PHP lo determina
    automáticamente (tipado dinámico). Los tipos básicos son <code>string</code>, <code>int</code>,
    <code>float</code>, <code>boolean</code> y <code>array</code>.</p>
    <p>Se muestran en pantalla con <code>echo</code>, el tipo se consulta con <code>gettype()</code>,
    la fecha con <code>date()</code> y el número de elementos de un arreglo con <code>count()</code>.</p>
</div>

<h3>Contenido de las variables (echo)</h3>
<div class="salida">
    <?php
    echo "<p>Materia (string): " . $nombre . "</p>";
    echo "<p>Grupo (int): " . $grupo . "</p>";
    echo "<p>Promedio (float): " . $promedio . "</p>";
    echo "<p>Aprobado (boolean): " . ($aprobado ? 'true' : 'false') . "</p>";
    echo "<p>Lenguajes (array): " . implode(", ", $lenguajes) . "</p>";
    ?>
</div>

<h3>Tipo de dato de cada variable (gettype)</h3>
<table>
    <tr><th>Variable</th><th>Valor</th><th>Tipo</th></tr>
    <?php
    $variables = [
        '$nombre'    => $nombre,
        '$grupo'     => $grupo,
        '$promedio'  => $promedio,
        '$aprobado'  => $aprobado,
        '$lenguajes' => $lenguajes,
    ];
    foreach ($variables as $etiqueta => $valor):
        if (is_array($valor)) {
            $texto = '[' . implode(', ', $valor) . ']';
        } elseif (is_bool($valor)) {
            $texto = $valor ? 'true' : 'false';
        } else {
            $texto = $valor;
        }
    ?>
    <tr>
        <td><?= $etiqueta ?></td>
        <td><?= $texto ?></td>
        <td><?= gettype($valor) ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<h3>Funciones date() y count()</h3>
<div class="salida">
    <p>Fecha actual (date): <?= date('d/m/Y') ?></p>
    <p>Hora actual (date): <?= date('H:i:s') ?></p>
    <p>Cantidad de lenguajes (count): <?= count($lenguajes) ?></p>
    <p>Dato extra con var_dump: <?php var_dump($promedio); ?></p>
</div>

<?php include 'includes/footer.php'; ?>
