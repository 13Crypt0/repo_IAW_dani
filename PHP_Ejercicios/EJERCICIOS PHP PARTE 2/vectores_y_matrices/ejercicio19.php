<?php
#Busque linea 7,8 y 9 porque no sabia como hacerlo.
for ($i = 0; $i < 10; $i++) {
    $secuencia1[] = rand(0, 1);
    $secuencia2[] = rand(0, 1);
    $secuencia3[] = rand(0, 1);
    $bit0 = ($secuencia1[$i] == 0) + ($secuencia2[$i] == 0) + ($secuencia3[$i] == 0);
    $bit1 = ($secuencia1[$i] == 1) + ($secuencia2[$i] == 1) + ($secuencia3[$i] == 1);
    $secuencia_comun[] = ($bit1 > $bit0) ? 1 : 0;
}

echo "<p>Secuencia 1:</p>\n";
foreach ($secuencia1 as $valor) { 
    echo "$valor "; 
}
echo "<p></p>\n";

echo "<p>Secuencia 2:</p>\n";
foreach ($secuencia2 as $valor) { 
    echo "$valor "; 
}
echo "<p></p>\n";

echo "<p>Secuencia 3:</p>\n";
foreach ($secuencia3 as $valor) { 
    echo "$valor "; 
}
echo "<p></p>\n";

echo "<p>Secuencia de bits comunes:</p>\n";
foreach ($secuencia_comun as $valor) { 
    echo "$valor "; 
}
?>
