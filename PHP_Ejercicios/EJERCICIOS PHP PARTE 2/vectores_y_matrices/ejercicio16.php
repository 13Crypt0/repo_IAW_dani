<?php
$dados = rand(2, 7);
for ($i=1;$i<=$dados;$i++) {
    $valores_array[] = rand(1, 6);
}
echo "<p>Numero de dados lanzados: $dados</p>\n";
foreach ($valores_array as $valor) {
    echo "<p>Has sacado un: $valor</p>\n";
}
?>