<?php
$columnas= 10;
$filas= 10;
$contador=1;

echo "<table border=\"1\">\n";
echo "<tbody>\n";

for ($i = 1; $i <= $filas; $i++) {
    echo "<tr>\n";
    for ($f = 1; $f <= $columnas; $f++) {         
        echo "<td>$contador</td>\n";
        $contador++;
    }
    echo "</tr>\n";
}

echo "</tbody>\n";
echo "</table>\n";
?>