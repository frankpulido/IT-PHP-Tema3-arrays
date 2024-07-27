<?php
/*
Frank Pulido - Tema 3 [ARRAYS] - Nivel 1 - Ejercicio 4
ENUNCIADO :
Haz un array asociativo que represente información de ti mismo/a. En concreto debe incluir:
    nombre
    edad
    email
    comida favorita
*/

/*
ESTUDIAR : Associative arrays - Arrays with named keys
https://www.w3schools.com/php/php_arrays.asp
Estudiar estas funciones :

    array_push() - Treats array as a stack, and pushes the passed variables onto the end of array.
    array_pop() - Pop the element off the end of array
    array_shift() - Shift an element off the beginning of array
    array_unshift() - Prepend one or more elements to the beginning of an array

*/

echo "Existen 2 formas de declarar Arrays Asociativos, voy a usar ambas :\n\n";

$frank = [];
$frank['nombre'] = 'frank';
$frank['edad'] = 53;
$frank['email'] = 'frankpulido@me.com';
$frank['comida_favorita'] = 'omnivoro';

print_r($frank);
echo "\n";

$frankpulido = array('nombre'=>'frank', 'edad'=>53, 'email'=>'frankpulido@me.com', 'comida_favorita'=>'omnívoro');

print_r($frankpulido);
echo "\n";

?>