<?php
/*
Frank Pulido - Tema 3 [ARRAYS] - Nivel 3 - Ejercicio 1
ENUNCIADO :
Dado un array de enteros, haz un programa que:
Devuelva cada valor del array elevado al cubo utilizando la función array_map().
ESTUDIAR :
https://www.w3schools.com/php/func_array_map.asp
https://www.php.net/manual/en/function.pow.php
https://www.w3schools.com/php/func_array_walk.asp
*/

$longitud = 0;
$enteros = [];

echo "\n";
echo "Usaremos la función array_map para elevar al cubo un conjunto de enteros indicados por el usuario.\n";
$longitud = (int)readline("Indique cuantos números enteros desea que elevemos al cubo : ");
echo "\n";

for($i = 0; $i < $longitud; $i++) {
    $enteros[] = (int)readline("Indique el valor del entero ". ($i+1) . " : ");
}

function elevar3 ($a) {
    return (pow($a,3));
}

// array_walk($enteros, "elevar3"); Otra función que sirve al mismo propósito AÚN POR TESTEAR

echo "\n";
echo "Los números indicados elevados al cubo :";
print_r(array_map("elevar3", $enteros));

?>