<?php
/*
Frank Pulido - Tema 3 [ARRAYS] - Nivel 3 - Ejercicio 3
ENUNCIADO :
Dado un array de enteros, haz un programa que nos devuelva la suma de los enteros del array que sean
números primos utilizando la función array_reduce().
ESTUDIAR :
array_reduce(array, myfunction, initial) : https://www.w3schools.com/php/func_array_reduce.asp
*/

$elementos = 0;
$enteros = [];
$primos = [];

echo "\n";
echo "Este programa filtra los números enteros que nos indique, devolviéndole aquellos que son \"primos\".\n";
$elementos = (int)readline("Indíquenos cuantos números quiere evaluar : ");
echo "\n";
for ($i = 0; $i < $elementos; $i++) {
    $enteros [] = (int)readline("Indique a continuación el elemento " . $i+1 . " : ");
}
echo "\n";
echo "Los elementos que nos ha indicado evaluar :\n";
print_r($enteros);

echo "\n";

/*
La función array_reduce(array, myfunction, initial) es una manera sencilla de presentar un resultado por pantalla,
su return ess de tipo String.
Nosotros almacenaremos el resultado en una variable de enteros $primos.
Usaremos array_reduce() para presentar el resultado.
*/

function primo($a) {
    $testigo = 2;
    $i = 2;
    do {
        if (fmod($a,$i) != 0){$testigo++;}
        $i++;
    } while ($i <= $a && $testigo == $i);
    return ($testigo == $a);
}

function return_reduce($a,$b){
    $string = "Son números primos : ";
    return $string . $a . " " . $b;
}

$primos = (array_filter($enteros, "primo")); // Los paréntesis exteriores nos permiten almacenar el resultado filtrado en una variable de tipo array.
echo "\n";
echo "Hemos filtrado los números primos y les hemos almacenado como elmentos de un nuevo array :\n";
print_r($primos);
echo "\n";
echo array_reduce($primos, "return_reduce");

?>