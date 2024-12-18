<?php
    $dia_ingles = date('D');
    switch ($dia_ingles) {
        case 'Mon':
            echo "<p>El dia de la semana es: Lunes</p>\n";
            break;
        case 'Tue':
            echo "<p>El dia de la semana es: Martes</p>\n";
            break;
        case 'Wed':
            echo "<p>El dia de la semana es: Miercoles</p>\n";
            break;
        case 'Thu':
             echo "<p>El dia de la semana es: Jueves</p>\n";
             break;
        case 'Fri':
             echo "<p>El dia de la semana es: Viernes</p>\n";
             break;
        case 'Sat':
            echo "<p>El dia de la semana es: Sabado</p>\n";
            break;
        case Sun:
            echo "<p>El dia de la semana es: Domingo</p>\n";
            break;
    }
?>