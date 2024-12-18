<?php
// En un principio use var_dump pero los resultados no se pueden concatenar por eso busque por internet y vi que gettype si que se puede concatenar.
    $variable1 = 748;
        echo "<p>\$variable1($variable1) es de tipo: " . gettype($variable1) . "</p>\n";
    $variable2 = 30.2;
        echo "<p>\$variable2($variable2) es de tipo: " . gettype($variable2) . "</p>\n";
    $variable3 = "Hola"; // Si no pongo comillas da error
        echo "<p>\$variable3($variable3) es de tipo: " . gettype($variable3) . "</p>\n";
    $variable4 = 1;
        echo "<p>\$variable4($variable4) es de tipo: " . gettype($variable4) . "</p>\n";
?>