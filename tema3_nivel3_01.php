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
See section "PHP Arithmetic Operators" : https://www.w3schools.com/php/php_operators.asp
See section "different ways to define callbacks" : https://dev.to/gbhorwood/php-tame-arrays-with-map-filter-and-reduce-1h4j
*/

$longitud = 0;
$enteros = [];
$enterosCubo = [];

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


echo "\n";
echo "Los números indicados elevados al cubo :";
print_r(array_map("elevar3", $enteros));


/*
array_walk : Otra función AÚN POR TESTEAR. Esta función retorna valores booleanos.
Ver que el orden de los parámetros es inverso, primero en array y luego la callback function
Function : https://www.w3schools.com/php/func_array_walk.asp

Para trabajar con arrays multidimensionales : array_walk_recursive
https://www.w3schools.com/php/func_array_walk_recursive.asp
*/

?>