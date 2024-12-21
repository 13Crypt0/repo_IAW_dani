<?php
    $tirada = rand(1, 10);
    $contador = 0;
    $valor_maximo = 0;

    for ($i=1; $i<=$tirada;$i++) {
        $result_dado = rand (1, 6);
            echo "<p>Dado $i: $result_dado</p>\n";
        if ($result_dado > $valor_maximo) {
            $valor_maximo = $result_dado;
            $contador = 1;
        } elseif ($result_dado == $valor_maximo) {
            $contador++;
        }
    }
    echo "<p>Resultado máximo: $valor_maximo</p>\n";
    echo "<p>Ha salido un total de $contador veces</p>\n";
?>