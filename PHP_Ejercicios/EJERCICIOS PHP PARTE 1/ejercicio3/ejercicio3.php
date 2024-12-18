<?php
    echo "<h1>Calculo IMC corporal</h1>\n";
    $peso = rand(50, 100);
    $altura = rand(150, 200) / 100;
    // Imprimo valores
    echo "<p>Tu peso: $peso</p>\n";
    echo "<p>Tu altura: $altura</p>\n";
    // Calculo IMC
    $imc = round($peso / ($altura*$altura), 2);
    echo "<p>Calculo IMC: $imc<p>\n";
?>