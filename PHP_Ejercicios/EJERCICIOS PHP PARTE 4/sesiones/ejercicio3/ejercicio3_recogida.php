<?php
session_name("ejercicio3");
session_start();

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

$palabra = recoge("palabra");

if (!ctype_upper($palabra)) {
    $_SESSION["mensaje"] = "Escribe una sola palabra en mayusculas";
} elseif ($palabra == "") {
    $_SESSION["mensaje"] = "Ningun valor introducido";
} else {
    unset($_SESSION["mensaje"]);
}
 
$_SESSION["palabra"] = $palabra;

header("Location: ejercicio3_formulario.php");