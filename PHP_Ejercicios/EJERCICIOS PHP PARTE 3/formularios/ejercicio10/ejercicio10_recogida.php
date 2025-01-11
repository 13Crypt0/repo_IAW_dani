<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Formularios
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Ejercicio 10</h1>

<?php

// Función de recogida de datos

function recoge($key, $type = "")
{
    if (!is_string($key) && !is_int($key) || $key == "") {
        trigger_error("Function recoge(): Argument #1 (\$key) must be a non-empty string or an integer", E_USER_ERROR);
    } elseif ($type !== "" && $type !== []) {
        trigger_error("Function recoge(): Argument #2 (\$type) is optional, but if provided, it must be an empty array or an empty string", E_USER_ERROR);
    }
    $tmp = $type;
    if (isset($_REQUEST[$key])) {
        if (!is_array($_REQUEST[$key]) && !is_array($type)) {
            $tmp = trim(htmlspecialchars($_REQUEST[$key]));
        } elseif (is_array($_REQUEST[$key]) && is_array($type)) {
            $tmp = $_REQUEST[$key];
            array_walk_recursive($tmp, function (&$value) {
                $value = trim(htmlspecialchars($value));
            });
        }
    }
    return $tmp;
}

// Otras funciones si es necesario

// ...


// Recoger valores del formulario con la funcion recoge()

$nombre = recoge('nombre');
$apellido_1 = recoge('apellido_1');
$apellido_2 = recoge('apellido_2');
$edad = recoge('edad');
$peso = recoge('peso');
$sexo = recoge('sexo');
$estado_civil = recoge('estado_civil');
$aficiones = recoge('aficiones[]');
$aficiones = (array)$aficiones;

// Hacer las comprobaciones oportunas de los valores y mostrar avisos si los
// valores son vacíos, si no son del tipo correcto, si no están en rango, etc.

$nombre_Ok = false;
$apellido_1_Ok = false;
$apellido_2_Ok = false;
if (!is_string($nombre)) {
    echo "<p>Valor incorrecto</p>\n";
} else {
    $nombre_Ok = true;
}


// Si todos los valores recogidos del formulario están OK, 
// realizar las accionas que se pida en el ejercicio

// ...

?>
  <p><a href="ejercicio10_formulario.php">Volver al formulario.</a></p>
</body>
</html>