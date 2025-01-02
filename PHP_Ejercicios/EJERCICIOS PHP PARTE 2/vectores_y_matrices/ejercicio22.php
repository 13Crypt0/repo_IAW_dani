<?php
$grupo_numeros = rand (5, 10);
for ($i=1;$i<=$grupo_numeros;$i++) {
    $array[]= rand (0, 9);
}
echo "<p>Numero:</p>\n";
foreach ($array as $value) {
    echo "$value";
}
echo "\n";
echo "<p>Valor Máximo: " . max($array) . "</p>\n";
echo "<p>Valor Mínimo: " . min($array) . "</p>\n";
?>