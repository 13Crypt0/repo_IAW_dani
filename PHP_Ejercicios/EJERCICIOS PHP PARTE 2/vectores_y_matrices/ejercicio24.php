<?php
$dados = rand(2, 7);

for ($i=1;$i<=$dados;$i++){    
    $num_gen[]= rand (1, 6);
}
echo "<p>Numeros dados sin ordenar:</p>\n";
foreach ($num_gen as $value) {
    echo $value;
}
echo "\n";

sort($num_gen);

echo "<p>Numeros dados ordenados:</p>\n";
foreach ($num_gen as $value) {
    echo $value;
}
?>