<?php
define('filas', 10);
define('columnas', 10);
$contador=1;

echo "<table border=\"1\">\n";
echo "<tbody>\n";

for ($i = 1; $i <= filas; $i++) {
    $color = ($i % 2 == 0) ? "#ccd1d1" : "#ffffff";
        echo "<tr style=\"background-color: $color;\">\n";
    for ($f = 1; $f <= columnas; $f++) {         
        echo "<td>$contador</td>\n";
        $contador++;
    }
    echo "</tr>\n";
}

echo "</tbody>\n";
echo "</table>\n";
?>