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

// Recoger valores del formulario con la funcion recoge()

$nombre = recoge('nombre');
$apellido_1 = recoge('apellido_1');
$apellido_2 = recoge('apellido_2');
$edad = recoge('edad');
$peso = recoge('peso');
$sexo = recoge('sexo');
$estado_civil = recoge('estado_civil');
$aficiones = recoge('aficiones', []);


// Hacer las comprobaciones oportunas de los valores y mostrar avisos si los
// valores son vacíos, si no son del tipo correcto, si no están en rango, etc.

$nombre_Ok = false;
$apellido_1_Ok = false;
$apellido_2_Ok = false;
$peso_Ok = false;
$sexo_Ok = false;
$estado_civil_Ok = false;

if (!is_string($nombre)) {
    echo "<p>Nombre: Valor incorrecto</p>\n";
} elseif (is_numeric($nombre)) {
    echo "<p>Nombre no puede ser un numero</p>\n";
} elseif ($nombre == "") {
    echo "<p>Introduce tu nombre</p>\n";
} else {
    $nombre_Ok = true;
}

if (!is_string($apellido_1)) {
    echo "<p>1º Apellido: Valor incorrecto</p>\n";
} elseif (is_numeric($apellido_1)) {
    echo "<p>1º Apellido no puede ser un numero</p>\n";
} elseif ($apellido_1 == "") {
    echo "<p>Introduce tu 1º Apellido</p>\n";
} else {
    $apellido_1_Ok = true;
}

if (!is_string($apellido_2)) {
    echo "<p>2º Apellido: Valor incorrecto</p>\n";
} elseif (is_numeric($apellido_2)) {
    echo "<p>2º Apellido no puede ser un numero</p>\n";
} else {
    $apellido_2_Ok = true;
}

if (!is_numeric($peso)) {
    echo "<p>Peso solo acepta valores numericos</p><\n";
} elseif ($peso < 0) {
    echo "<p>No puedes pesar menos de 0 kg</p>\n";
} else {
    $peso_Ok = true;
}

if ($sexo == "") {
    echo "<p>Introduce tu sexo</p>\n";
} else {
    $sexo_Ok = true;
}

if ($estado_civil == "") {
    echo "<p>Introduce tu estado civil</p>\n";
} else {
    $estado_civil_Ok = true;
}

// Si todos los valores recogidos del formulario están OK, 
// realizar las accionas que se pida en el ejercicio

if ($nombre_Ok) {
    echo "<p>Tu nombre es: <b>$nombre</b></p>\n";
}

if ($apellido_1_Ok) {
    echo "<p>Tu 1º Apellido es: <b>$apellido_1</b></p>\n";
}

if ($apellido_2_Ok && $apellido_2 != "") {
    echo "<p>Tu 2º Apellido es: <b>$apellido_2</b></p>\n";
}

echo "<p>Tienes: <b>$edad</b></p>\n";

if ($peso_Ok) {
    echo "<p>Pesas: <b>$peso kg</b></p>\n";
}

if ($sexo_Ok) {
    echo "<p>Tu sexo es: <b>$sexo</b></p>\n";
}

if ($estado_civil_Ok) {
    echo "<p>Tu estado civil es: <b>$estado_civil</b></p>\n";
}

foreach ($aficiones as $value) {
    echo "<p>Afición: <b>$value</b></p>\n";
}
?>
  <p><a href="ejercicio10_formulario.php">Volver al formulario.</a></p>
</body>
</html>