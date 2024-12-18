<?php
    $numero = rand(1, 100);
    if ($numero < 50) {
        echo "<p>$numero es menor a 50</p>\n";
    } elseif ($numero == 50) {
        echo "<p>$numero es igual a 50</p>\n";
    } elseif ($numero > 50) {
        echo "<p>$numero es mayor a 50</p>\n";
    }
?>