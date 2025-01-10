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
  <h1>Ejercicio 7</h1>

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

$filas = recoge('filas');
$filas = (int)$filas;
$columnas = recoge('columnas');
$columnas = (int)$columnas;

// ...

// Hacer las comprobaciones oportunas de los valores y mostrar avisos si los
// valores son vacíos, si no son del tipo correcto, si no están en rango, etc.

$filasOk = false;
if ($filas == "") {
    echo "<p>Introduce numero de filas</p>\n";
} elseif ($filas < 1) {
    echo "<p>Valor de fila incorrecto. Introduce 1 o mas</p>\n";
} else {
    $filasOk = true;
}

$columnasOk = false;
if ($columnas == "") {
    echo "<p>Introduce numero de columnas</p>\n";
} elseif ($columnas < 1) {
    echo "<p>Valor de columna incorrecto. Introduce 1 o mas</p>\n";
} else {
    $columnasOk = true;
}


// Si todos los valores recogidos del formulario están OK, 
// realizar las accionas que se pida en el ejercicio

function creaTabla(int $filas, int $columnas): string {
    $contador = 0;
    $tabla = "<table border=\"1\">\n";
    $tabla .= "<tbody>\n";
    for ($i=1; $i<=$filas;$i++) {
        $tabla .= "<tr>\n";  
        for ($c=1;$c<=$columnas;$c++) {
            $contador++;  
            $tabla .= "<td>$contador</td>";                
        }
        $tabla .= "</tr>\n";
    }
    $tabla .= "</tbody>\n";
    $tabla .= "</table>\n";

    return $tabla;
}

echo creaTabla($filas, $columnas);
?>
  <p><a href="ejercicio7_formulario.php">Volver al formulario.</a></p>
</body>
</html>