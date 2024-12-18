<?php
    $numero_horas = rand(0, 150);
    $numero_minutos = rand(0, 150);
    $numero_segundos = rand(0, 150);
    // Para horas
    $calculo_horas = ($numero_horas * 60) * 60;
        echo "<p>Horas ($numero_horas) a segundos: $calculo_horas</p>\n";
    // Para minutos
    $calculo_minutos = ($numero_minutos * 60) * 60;
        echo "<p>Minutos ($numero_minutos) a segundos: $calculo_minutos</p>\n";
    // Para segundos
    echo "<p>Segundos ($numero_segundos) a segundos: $numero_segundos</p>\n";