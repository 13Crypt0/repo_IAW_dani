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
  <h1>Ejercicio 8</h1>

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

$num = recoge('num');

// Hacer las comprobaciones oportunas de los valores y mostrar avisos si los
// valores son vacíos, si no son del tipo correcto, si no están en rango, etc.

$numeroOk = false;
if ($num == "") {
    echo "<p>Falta introducir numero</p>\n";
} elseif (!is_numeric($num)) {
    echo "<p>El valor introducido no es un número válido</p>\n"; 
} elseif ($num < 1 || $num > 99999999) {
    echo "<p>El numero tiene que ir del 1 al 99999999</p>\n";
} else {
    $numeroOk = true;
    $num = (int)$num;
}

// Si todos los valores recogidos del formulario están OK, 
// realizar las accionas que se pida en el ejercicio

if ($numeroOk) {
    function calculaLetraNIF(int $num): string {
        $calculo = $num % 23;
        $letras = ['T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E'];
        return $letras[$calculo];
    }
}

if ($numeroOk) {
echo "<p>DNI: " . str_pad($num, 8, "0", STR_PAD_LEFT) . calculaLetraNIF($num) . "</p>\n";
}
?>
  <p><a href="ejercicio8_formulario.php">Volver al formulario.</a></p>
</body>
</html>