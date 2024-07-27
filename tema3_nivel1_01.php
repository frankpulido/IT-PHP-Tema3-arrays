<?php
/*
Frank Pulido - Tema 3 [ARRAYS] - Nivel 1 - Ejercicio 1
ENUNCIADO :
Crea un array, añádele 5 números enteros y luego muestrales por pantalla de uno en uno.
*/

echo "\nVamos a construir un Array de 5 números enteros." . "\n" . "\n";

$array5 = [];
$elementos = 5;

for ($i = 1; $i <= $elementos; $i++) {
    $array5 [] = (int)readline("Indique el elemento $i del Array (su index será " . ($i - 1) . ") : ");
}

echo "\nPodemos mostrar el contenido por pantalla de forma sencilla ejecutando funciones que no requieren de un ECHO como vardump(variable_array) o print_r(variable_array)." . PHP_EOL . "Usaremos la segunda :\n\n";
print_r($array5);

echo "\n\n";

echo "Vamos a usar un ECHO dentro de un DO WHILE para mostrar los elementos del Array de forma más \"user-friendly\" :\n\n";

$i = 1;
do {
    echo 'El elemento ' . $i . ' del Array es : ' . $array5 [$i - 1] . "\n";
    $i++;
} while($i <= $elementos);

?>