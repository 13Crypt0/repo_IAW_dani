<?php

$columnas = 4;
$filas = 4;

echo "<table border=\"1\">\n";
echo "<tbody>\n";

for ($i = 1; $i <= $filas; $i++) {
    echo "<tr>\n";
    for ($f = 1; $f <= $columnas; $f++) {  
        $potencias = pow($i, $f);         
        echo "<td>$potencias</td>\n";
    }
    echo "</tr>\n";
}

echo "</tbody>\n";
echo "</table>\n";
?>