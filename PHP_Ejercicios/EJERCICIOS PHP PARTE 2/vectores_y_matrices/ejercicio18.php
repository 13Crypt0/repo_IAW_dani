<?php
$v["a"]=rand(1, 100);
$v["b"]=rand(1, 100);
$v["c"]=rand(1, 100);
$v["d"]=rand(1, 100);

foreach ($v as $indice => $valor) {
    echo "<p>\$v[$indice]=$valor</p>\n";
}
?>