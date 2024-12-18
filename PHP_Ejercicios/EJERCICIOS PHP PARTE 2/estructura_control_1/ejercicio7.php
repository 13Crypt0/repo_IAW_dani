<?php
    $dado1 = rand(1, 6);
    $dado2 = rand(1, 6);
    $dado3 = rand(1, 6);
    echo "$dado1, $dado2, $dado3";
    if ($dado1 == $dado2 && $dado2 == $dado3) {
        echo "<p>Ha salido un trio!</p>\n</br>";
        echo "<p>Resultados:</p>\n";
        echo "<p>Dado 1: $dado1</p>\n";
        echo "<p>Dado 2: $dado2</p>\n";
        echo "<p>Dado 3: $dado3</p>\n";
    } elseif ($dado1 == $dado2 || $dado2 == $dado3 || $dado1 == $dado3) {
        echo "<p>Ha salido una pareja!</p>\n</br>";
        echo "<p>Resultados:</p>\n";
        echo "<p>Dado 1: $dado1</p>\n";
        echo "<p>Dado 2: $dado2</p>\n";
        echo "<p>Dado 3: $dado3</p>\n";
    } else {
        echo "<p>No ha salido nada. Valor más alto: " . max($dado1, $dado2, $dado3) . "</p>\n</br>";
        echo "<p>Resultados:</p>\n";
        echo "<p>Dado 1: $dado1</p>\n";
        echo "<p>Dado 2: $dado2</p>\n";
        echo "<p>Dado 3: $dado3</p>\n";
    }
?>