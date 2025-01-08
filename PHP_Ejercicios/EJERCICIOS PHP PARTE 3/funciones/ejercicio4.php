<?php
    $tiradas = rand(5, 10);
    $max = 6;
    $min= 1;

    echo "<p>Numero de tiradas: <b>$tiradas</b></p>\n";

    function generaMatrizEnterosRand(int $n, int $min, int $max): array {
        for ($i=1;$i<=$n;$i++) {
            $array_dados[] = rand ($min, $max); 
        }
        return $array_dados;    
    }

    function escribeValoresDados(array $m): void {
        $contador = 1;
        echo "<p><b>Dados sin ordenar</b></p>\n";
        foreach ($m as $value) {
            echo "<p>Dado $contador: $value</p>\n";
            $contador++;
        }
        $contador = 1;
        echo "<p><b>Dados ordenados</p></b>\n";
        sort ($m);
        foreach ($m as $value) {
            echo "<p>Dado $contador: $value</p>\n";
            $contador++;
        }
        echo "<p><b>Eliminamos dados repetidos</p></b>\n";
        $apariciones_dados = array_unique($m);
        foreach ($apariciones_dados as $value) {
            echo "<p>Aparece dado: $value</p>\n";
        }
    }

    $array_dados = generaMatrizEnterosRand($tiradas, $min, $max);
    escribeValoresDados($array_dados);
?>