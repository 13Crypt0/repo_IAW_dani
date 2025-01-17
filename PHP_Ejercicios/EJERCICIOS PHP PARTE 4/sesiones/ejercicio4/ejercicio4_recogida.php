<?php

session_name("ejercicio4");
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

$palabra_mayus = recoge("mayusculas");

    if (!ctype_upper($palabra_mayus)) {
        $_SESSION["mensaje_mayus"] = "Escribe una sola palabra en mayuscula";
    } elseif ($palabra_mayus == "") {
        $_SESSION["mensaje_mayus"] = "No has introducido ningun valor";
    } else
        unset($_SESSION["mensaje_mayus"]);

$palabra_minus = recoge("minusculas");

    if (!ctype_lower($palabra_minus)) {
        $_SESSION["mensaje_minus"] = "Escribe una sola palabra en minuscula";
    } elseif ($palabra_minus == "") {
        $_SESSION["mensaje_minus"] = "No has introducido ningun valor";
    } else
        unset($_SESSION["mensaje_minus"]);


$_SESSION["palabra_mayus"] = $palabra_mayus;
$_SESSION["palabra_minus"] = $palabra_minus;

header("Location: ejercicio4_formulario.php");
