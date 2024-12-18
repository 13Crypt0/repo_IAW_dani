<?php
    $dado1 = rand(1, 6);
    $dado2 = rand(1, 6);
    if ($dado1 % 2 == 0 && $dado2 % 2 == 1) {
        echo "<p>Los dados han conseguido el objetivo de paridad. Dado 1($dado1) y Dado 2 ($dado2)</p>\n";
    } else {
        echo "<p>Los dados no han conseguido el objetivo de paridad. Dado 1 ($dado1) y Dado 2 ($dado2)</p>\n";
    }
?>