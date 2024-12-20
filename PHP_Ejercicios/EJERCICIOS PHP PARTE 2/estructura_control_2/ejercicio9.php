<?php
    $tirada = rand(1, 10);
    $total = 0;
    for ($i=1; $i<=$tirada;$i++) {
        $result_dado = rand (1, 6);
        echo "<p>Dado $i: $result_dado</p>\n";
        $total = $total + $result_dado;
    }
    echo "<p>Se han obtenido $total puntos</p>\n"
?>