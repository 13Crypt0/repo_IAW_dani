<?php
    $numero_random = rand(0, 10000);
        echo "<p>Segundos aleatorios: $numero_random segundos</p>\n";
    $calculo_horas = intdiv($numero_random, 3600);
    $resto_segundos = $numero_random % 3600;
    $calculo_minutos = intdiv($resto_segundos, 60);
    $calculo_segundos = $resto_segundos % 60;
        echo "<p>Transformacion: $calculo_horas horas, $calculo_minutos minutos y $calculo_segundos segundos</p>\n";
?>