<?php
$idiomas = ["Español", "Ingles", "Frances", "Italiano", "Portugues"];
$traducciones = [
    ["Hola", "Hello", "Bonjour", "Ciao", "Olá"],
    ["Avión", "Plane", "Avion", "Aereo", "Avião"],
    ["Coche", "Car", "Voiture", "Auto", "Carro"],
    ["Pelota", "Ball", "Balle", "Palla", "Bola"],
    ["Adiós", "Goodbye", "Au revoir", "Addio", "Adeus"],
    ["Buenos días", "Good Morning", "Bonjour", "Buongiorno", "Bom dia"],
    ["Amarillo", "Yellow", "Jaune", "Giallo", "Amarelo"]
];
$idioma_aleatorio = rand(1, 4);
$traduccion_aleatoria = rand(0, 6);

echo "<p>La palabra \"{$traducciones[$traduccion_aleatoria][$idioma_aleatorio]}\" en \"{$idiomas[$idioma_aleatorio]}\" significa \"{$traducciones[$traduccion_aleatoria][0]}\" en {$idiomas[0]}</p>\n";
?>