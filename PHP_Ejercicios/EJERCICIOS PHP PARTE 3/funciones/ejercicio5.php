<?php
    $valores = rand(3, 7);
    $min = 1;
    $max = 10;

    echo "<p>Numero de valores: <b>$valores</b></p>\n";

    function generaMatrizEnterosRand(int $n, int $min, int $max): array {
        for ($i=1;$i<=$n;$i++) {
            $array_valores_enteros[] = rand ($min, $max); 
        }
        return $array_valores_enteros;    
    }

    function generaMatrizDecimalRand(int $n, int $min, int $max): array {
        for ($i=1;$i<=$n;$i++) {
            $array_valores_decimales[] = rand ($min, $max)/10; 
        }
        return $array_valores_decimales;
    }
    
    function miArraySum(array $array): int|float {
        $acumulador = 0;
        $contador = 1;
        foreach ($array as $value) {
            echo "<p>Valor $contador: $value</p>\n";
            $acumulador = $acumulador + $value;
            $contador++;
        }
        return $acumulador;
    }

    echo "<p><b>Suma de todos los valores de la matriz de numeros enteros</b></p>\n";
    $array_valores_enteros = generaMatrizEnterosRand($valores, $min, $max);
    echo "<p>Suma total de los valores: " . miArraySum($array_valores_enteros) . "</p>\n";
    
    echo "<p><b>Suma de todos los valores de la matriz de numeros decimales</b></p>\n";
    $array_valores_decimales = generaMatrizDecimalRand($valores, $min, $max);
    echo "<p>Suma total de los valores: " . miArraySum($array_valores_decimales) . "</p>\n";
?>