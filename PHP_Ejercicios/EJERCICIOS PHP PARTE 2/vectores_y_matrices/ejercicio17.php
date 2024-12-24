<?php
for ($i=0;$i<=10;$i++) {
    if ($i % 2 == 0) {
        $valores_array [] = $i;
    }
}
echo "<p>Imprimiendo valores pares del 0 al 10:<p>\n";
foreach ($valores_array as $valor) {
    echo "<p>$valor</p>\n";
}
?>