<?php

$dias_semana = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];
$comida = [
    "Desayuno" => ["Lunes" => "Desayuno 1", "Martes" => "Desayuno 2", "Miercoles" => "Desayuno 3", "Jueves" => "Desayuno 4", "Viernes" => "Desayuno 5", "Sabado" => "Desayuno 6", "Domingo" => "Desayuno 7"],
    "Comida" => ["Lunes" => "Comida 1", "Martes" => "Comida 2", "Miercoles" => "Comida 3", "Jueves" => "Comida 4", "Viernes" => "Comida 5", "Sabado" => "Comida 6", "Domingo" => "Comida 7"],
    "Cena" => ["Lunes" => "Cena 1", "Martes" => "Cena 2", "Miercoles" => "Cena 3", "Jueves" => "Cena 4", "Viernes" => "Cena 5", "Sabado" => "Cena 6", "Domingo" => "Cena 7"]
];
echo "<table border=\"1\">\n";
echo "<tbody>\n";

echo "<tr>\n";
echo "<th></th>";
foreach ($dias_semana as $value) {
    echo "<th>$value</th>";
}
echo "</tr>\n";
echo "<tr>\n";
foreach ($comida as $tipo_comida => $menu) {
    echo "<td>$tipo_comida</td>";
    foreach ($dias_semana as $value) {
        echo "<td>$menu[$value]</td>";
    }
    echo "</tr>\n";
}

echo "</tbody>\n";
echo "</table>\n";
?>