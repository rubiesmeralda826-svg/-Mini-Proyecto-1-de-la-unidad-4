<?php
require 'includes/sesion.php';
requerir_sesion();
$titulo = 'Condicionales: if y switch';

$calificaciones = [
    'Ana'    => 95,
    'Luis'   => 82,
    'María'  => 71,
    'Pedro'  => 55,
];

$dia = (int) date('N'); // 1 = lunes ... 7 = domingo
$rol = 'editor';

include 'includes/header.php';
?>

<div class="explicacion">
    <p>Las estructuras condicionales permiten que el programa tome decisiones según el valor de
    una variable. <code>if / elseif / else</code> evalúa condiciones booleanas en orden y ejecuta
    el primer bloque verdadero; <code>switch</code> compara una variable contra varios casos
    concretos y es más limpio cuando hay muchas opciones exactas.</p>
</div>

<h3>if, elseif y else (evaluando un arreglo de calificaciones)</h3>
<table>
    <tr><th>Alumno</th><th>Calificación</th><th>Resultado</th></tr>
    <?php foreach ($calificaciones as $alumno => $nota):
        if ($nota >= 90) {
            $nivel = 'Excelente';
            $clase = 'aprobado';
        } elseif ($nota >= 80) {
            $nivel = 'Notable';
            $clase = 'aprobado';
        } elseif ($nota >= 70) {
            $nivel = 'Aprobado';
            $clase = 'aprobado';
        } else {
            $nivel = 'Reprobado';
            $clase = 'reprobado';
        }
    ?>
    <tr>
        <td><?= $alumno ?></td>
        <td><?= $nota ?></td>
        <td class="<?= $clase ?>"><?= $nivel ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<h3>switch (día de la semana según date('N'))</h3>
<div class="salida">
    <?php
    switch ($dia) {
        case 1: $nombreDia = 'Lunes';     $nota = 'Inicio de semana.'; break;
        case 2: $nombreDia = 'Martes';    $nota = 'Día de clases.'; break;
        case 3: $nombreDia = 'Miércoles'; $nota = 'Mitad de semana.'; break;
        case 4: $nombreDia = 'Jueves';    $nota = 'Casi fin de semana.'; break;
        case 5: $nombreDia = 'Viernes';   $nota = 'Último día hábil.'; break;
        case 6: $nombreDia = 'Sábado';    $nota = 'Fin de semana.'; break;
        default: $nombreDia = 'Domingo';  $nota = 'Día de descanso.'; break;
    }
    echo "<p>Hoy es <strong>$nombreDia</strong>. $nota</p>";
    ?>
</div>

<h3>switch (permisos según el rol)</h3>
<div class="salida">
    <?php
    echo "<p>Rol actual: <strong>$rol</strong></p>";
    switch ($rol) {
        case 'admin':
            echo "<p>Permisos: crear, editar y eliminar.</p>";
            break;
        case 'editor':
            echo "<p>Permisos: crear y editar.</p>";
            break;
        default:
            echo "<p>Permisos: solo lectura.</p>";
    }
    ?>
</div>

<?php include 'includes/footer.php'; ?>
