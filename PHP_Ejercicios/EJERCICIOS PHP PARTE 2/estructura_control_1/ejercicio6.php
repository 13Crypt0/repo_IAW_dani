<?php
    $fecha = rand(1582, 2100);
    if ($fecha % 4 == 0 && $fecha % 100 != 0 || $fecha % 400 == 0) {
        echo "<p>$fecha es un año bisiesto</p>\n";
    } else {
        echo "<p>$fecha no es un año bisiesto</p>\n";
    }
?>