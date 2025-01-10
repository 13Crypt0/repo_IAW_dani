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
    <h1>Ejercicio 6</h1>

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

    function esMayorDeEdad( int $edad ): bool {
        return $edad >= 18;
    }
    
    // PROGRAMA PRINCIPAL

    // PASO 1: recojo datos del formulario

    $nombre=recoge('nombre');
    $edad=recoge('edad');

    // PASO 2: 
    // Hacer las comprobaciones oportunas de los valores y mostrar avisos si los
    // valores son vacíos, si no son del tipo correcto, si no están en rango, etc.

    $nombreOk = false;
    $edadOk = false;

    if ($nombre == "") {
        echo "<p>No has escrito tu nombre</p>\n";
    } else {
        $nombreOk = true;
    }

    if ($edad == "") {
        echo "<p>No has escrito tu edad</p>\n";
    } elseif (!is_numeric($edad)) {
        echo "<p>No has escrito tu edad como numero</p>\n";
    } elseif ($edad < 5 || $edad > 130) {
        echo "<p>Tu edad no esta entre 5 y 130</p>\n";
    } else {
        $edadOk = true;
    }

    // Si todos los valores recogidos del formulario están OK, 
    // realizar las accionas que se pida en el ejercicio

    $edad = (int)$edad;

    if (esMayorDeEdad($edad)) {
        echo "<p>$nombre, eres mayor de edad, tienes $edad</p>\n";
    } else {
        echo "<p>$nombre, eres menor de edad, tienes $edad</p>\n";
    }

    ?>
        <p><a href="ejercicio6_formulario.php">Volver al formulario.</a></p>
    </body>
    </html>