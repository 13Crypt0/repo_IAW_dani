<?php
    $tirada = rand(1, 10);
    $valor_par = 0;
    $valor_impar = 0;
    for ($i=1; $i<=$tirada;$i++) {
        $result_dado = rand (1, 6);
        echo "<p>Dado $i: $result_dado</p>\n";
        if ($result_dado % 2 == 0) {
            $valor_par++;
        } else {
            $valor_impar++;
        }
    }
    echo "<p>Valores pares: $valor_par</p>\n";
    echo "<p>Valores impares: $valor_impar</p>\n";
?>