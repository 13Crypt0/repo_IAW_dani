<?php

    function generaNumero(): int {
        $num = rand(1, 99999999);
        return $num;
    }
    
    function calculaLetraNIF(int $num): string {
        $calculo = generaNumero() % 23;
        $letras = ['T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E'];
        return "$letras[$calculo]";
    }

    echo "<p>DNI: " . str_pad(generaNumero(), 8, "0", STR_PAD_LEFT) . calculaLetraNIF(generaNumero()) . "</p>\n";
?>

