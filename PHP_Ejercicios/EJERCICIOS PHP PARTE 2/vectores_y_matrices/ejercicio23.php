<?php
$contador = array_fill(0, 10, 0);
$grupo_numeros = rand (7, 20);
for ($i=1;$i<=$grupo_numeros;$i++) {
    $numero_gen = rand(0, 9);
    $array[] = $numero_gen;
    $contador[$numero_gen]++;
}
echo "<p>Numero:</p>\n";
    foreach ($array as $value) {
        echo "$value";
    }
echo "\n";
echo "<p>Contadores:</p>\n";
foreach ($contador as $numero_gen => $value) {
    echo "<p>Numero $numero_gen: $value </p>\n";
}
?>