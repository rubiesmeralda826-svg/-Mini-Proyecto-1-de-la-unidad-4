# Mini Proyecto 1 – Desarrollo Web con PHP

**Materia:** Programación Web – Unidad 4 (Programación del lado del servidor con PHP)

**Integrantes del equipo:**
- Juan Manuel Nucamendi Díaz
- Rubi Esmeralda De los Santos López
- Edson Samuel Jiménez Silvestre

## Descripción

Sitio web dinámico de 6 páginas hecho con PHP que demuestra variables, tipos de datos,
estructuras de control, arreglos y manejo de sesiones. Todas las páginas comparten
encabezado, menú y pie mediante `include`, y muestran la hora de inicio de sesión,
la hora actual y el tiempo activo del usuario. No usa base de datos, archivos ni formularios.

## Temas PHP implementados

| Archivo | Tema |
|---|---|
| `index.php` | Inicio/destrucción de sesión (`session_start`, `session_destroy`, `time`) |
| `variables.php` | Variables, tipos (string, int, float, boolean, array), `echo`, `date()`, `count()` |
| `condicionales.php` | `if`, `elseif`, `else`, `switch` |
| `bucles.php` | `for`, `while`, `foreach` |
| `arreglos.php` | Arreglos indexado, asociativo y multidimensional |
| `sesiones.php` | `$_SESSION`, persistencia de datos, cálculo de tiempo activo |

## Estructura

```
index.php  variables.php  condicionales.php  bucles.php  arreglos.php  sesiones.php
css/styles.css
includes/header.php  menu.php  footer.php  sesion.php
img/
```

## Ejecución local

```
php -S localhost:8000
```

Abrir http://localhost:8000 y presionar **INICIAR SESIÓN**.
