<?php
    $importe_total = rand(10, 2000) / 10;
    echo "<p>Tu compra ha sido de:<b> $importe_total €</b></p>\n";
    if ($importe_total < 30) {
        echo "<p>Compra más o te cobraremos 8,95€ de gastos de envío</p>\n";
    } elseif ($importe_total >= 30 && $importe_total < 90) {
        $resto = 90 - $importe_total; 
        echo "<p>Con sólo $resto € más podrás tener gastos de envío gratuitos</p>\n";
    } elseif ($importe_total >= 90) {
        echo "<p><b>Gastos de envío incluidos</b></p>\n";
    }
?>