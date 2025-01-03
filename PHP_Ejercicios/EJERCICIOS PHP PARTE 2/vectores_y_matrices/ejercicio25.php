<?php
$clasificacion['Alonso']['Valencia']=1;
$clasificacion['Hamilton']['Valencia']=4;
$clasificacion['Massa']['Valencia']=2;
$clasificacion['Raikonen']['Valencia']=3;
$clasificacion['Alonso']['China']=1;
$clasificacion['Hamilton']['China']=4;
$clasificacion['Massa']['China']=2;
$clasificacion['Raikonen']['China']=3;
$clasificacion['Alonso']['Brasil']=1;
$clasificacion['Hamilton']['Brasil']=4;
$clasificacion['Massa']['Brasil']=2;
$clasificacion['Raikonen']['Brasil']=3;

$puntos = [1 => 10, 2 => 8, 3 => 7, 4 => 6, 5 => 4, 6 => 3, 7 => 2, 8 => 1];


$totalpuntos = [];

foreach ($clasificacion as $piloto => $resultado) {
    $totalpuntos[$piloto] = 0;
    foreach ($resultado as $pais => $posicion) {
        $totalpuntos[$piloto] = $totalpuntos[$piloto] + $puntos[$posicion];
    }
}

arsort($totalpuntos);

echo "<h1>Clasificacion del mundial de Fórmula 1:</h1>\n";

foreach ($totalpuntos as $piloto => $value) {
    echo "<p><b>$piloto</b> = $value </p>\n";
}

?>