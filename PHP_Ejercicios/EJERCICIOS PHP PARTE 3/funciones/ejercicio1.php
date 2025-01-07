<?php
    $edad = rand (1, 99);
    function esMayorDeEdad(int $edad): bool {
        return $edad >= 18;
    }
    
    if (esMayorDeEdad($edad)) {
        echo "<p>Es mayor de edad, tiene $edad </p>\n";
    } else {
        echo "<p>Es menor de edad, tiene $edad </p>\n";
    }
?>