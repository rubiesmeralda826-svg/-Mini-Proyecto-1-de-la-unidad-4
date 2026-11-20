<?php
// Configuración común: zona horaria, inicio de sesión PHP y funciones auxiliares.
date_default_timezone_set('America/Mexico_City');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Si no hay sesión activa, se regresa al index para iniciarla.
function requerir_sesion()
{
    if (!isset($_SESSION['inicio'])) {
        header('Location: index.php');
        exit;
    }
}

// Devuelve [minutos, segundos] transcurridos desde $inicio.
function tiempo_activo($inicio)
{
    $diferencia = time() - $inicio;
    return [intdiv($diferencia, 60), $diferencia % 60];
}
