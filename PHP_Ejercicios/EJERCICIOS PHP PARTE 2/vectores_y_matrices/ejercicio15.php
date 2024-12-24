<?php
$dado = [1 => "uno",2 => "dos", 3 => "tres", 4 => "cuatro", 5 => "cinco",6 => "seis"];
$tirada_dado = rand(1, 6);

echo "<p>Has sacado un: $dado[$tirada_dado]</p>\n";
?>