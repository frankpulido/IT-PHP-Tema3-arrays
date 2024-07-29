<?php
/*
Frank Pulido - Tema 3 [ARRAYS] - Nivel 2 - Ejercicio 1
ENUNCIADO :
Crea un programa que contenga dos arrays de números (enteros/coma flotante). Una vez creados, muestra por pantalla el resultado de:
    La intersección de los dos arrays (números común)
    La mezcla de ambos arrays.

ESTUDIAR :
https://www.w3schools.com/php/php_arrays.asp
https://www.w3schools.com/php/func_array_combine.asp : Create an array by using the elements from one "keys" array and one "values" array.
https://www.w3schools.com/php/func_array_merge.asp : Merge two arrays into one array.
https://www.w3schools.com/php/func_array_intersect.asp : Compare the values of two arrays, and return the matches.
https://www.w3schools.com/php/func_array_unique.asp : Removes duplicated values from an array.
https://www.w3schools.com/php/func_array_sort.asp : The sort($array, sorttype) function sorts an indexed array in ascending order.
    Optional. Specifies how to compare the array elements/items. Possible values:
    0 = SORT_REGULAR - Default. Compare items normally (don't change types)
    1 = SORT_NUMERIC - Compare items numerically
    2 = SORT_STRING - Compare items as strings
    3 = SORT_LOCALE_STRING - Compare items as strings, based on current locale
    4 = SORT_NATURAL - Compare items as strings using natural ordering
    5 = SORT_FLAG_CASE - Can be combined with SORT_STRING or SORT_NATURAL to sort strings case-insensitively

*/


$array1 = [];
$array2 = [];
$elementos1;
$elementos2;
$intersect = [];
$merge = [];
$unique  = [];



function array_builder($array = [], $count) {
    for ($i = 0; $i < $count; $i++) {
        $array[$i] = (float)readline("Indique el elemento " . $i+1 . " del array : ");
        echo "\n";
    }
}

echo "Construiremos 2 arrays y luego obtendremos :\n\t1) La intersección de los arrays (elementos comunes).\n\t2) La combinación de los 2 arrays evitando repetir los elementos comunes.\n\n";

$elementos1 =  (float)readline("Indíquenos el número de elementos del primer array (puede incluir tanto números enteros como de tipo coma flotante) : ");
echo "\n";
for ($i = 0; $i < $elementos1; $i++) {
    $array1[$i] = (float)readline("Indique el elemento " . $i+1 . " del array : ");
}
echo "\n";
echo "El primer array :\n";
print_r($array1);
echo "\n";

$elementos2 =  (float)readline("Indíquenos el número de elementos del segundo array (puede incluir tanto números enteros como de tipo coma flotante) : ");
echo "\n";
for ($i = 0; $i < $elementos2; $i++) {
    $array2[$i] = (float)readline("Indique el elemento " . $i+1 . " del array : ");
}
echo "\n";
echo "El segundo array :\n";
print_r($array2);
echo "\n";

echo "La intersección (elementos comunes) de los 2 arrays :\n";
echo "\n";
$intersect = array_intersect($array1, $array2);
print_r($intersect);
echo "\n";

echo "La combinación (evitando duplicar elementos comunes) de los 2 arrays :\n";
echo "\n";
$merge = array_merge($array1, $array2);
$unique = array_unique($merge);
print_r($unique);
echo "\n";

echo "Podríamos ordenar los de menor a mayor y reindexar el array para visualizarlo de forma más agradable :\n";
echo "\n";
sort($unique); // He descubierto que la función sort() también reindexa!!!
print_r($unique);
echo "\n";
/*
LA INSTRUCCIÓN USADA EN EJERCICIO ANTERIOR (tema3_nivel1_02.php) ERA INNECESARIA, BASTA EJECUTAR UN SORT()!!!!!!!
foreach ($unique as $index => $valor) {
    $unique_reindexed[] = $valor;
}
print_r($unique_reindexed);
*/

?>