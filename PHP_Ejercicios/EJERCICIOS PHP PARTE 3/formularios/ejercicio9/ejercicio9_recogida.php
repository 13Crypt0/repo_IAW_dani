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
  <h1>Nombre formulario</h1>

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

// Recoger valores del formulario con la funcion recoge()

$correo_1 = recoge('correo_1');
$correo_2 = recoge('correo_2');

// Hacer las comprobaciones oportunas de los valores y mostrar avisos si los
// valores son vacíos, si no son del tipo correcto, si no están en rango, etc.

$correo_1_Ok = false;

if (!filter_var($correo_1, FILTER_VALIDATE_EMAIL)) {
    echo "<p>Correo electronico no valido</p>\n";
} else {
    $correo_1_Ok = true;
}

$correo_2_Ok = false;

if (!filter_var($correo_2, FILTER_VALIDATE_EMAIL)) {
    echo "<p>Correo electronico no valido</p>\n";
} else {
    $correo_2_Ok = true;
}

// Si todos los valores recogidos del formulario están OK, 
// realizar las accionas que se pida en el ejercicio

if ($correo_1 == $correo_2) {
    echo "<p>Todo fue correctamente</p>\n";
} else {
    echo "<p>Los correos no coinciden</p>\n";
}

?>
  <p><a href="ejercicio9_formulario.php">Volver al formulario.</a></p>
</body>
</html>