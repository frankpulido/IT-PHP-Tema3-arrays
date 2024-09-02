<?php
/*
Frank Pulido - Tema 3 [ARRAYS] - Nivel 1 - Ejercicio 3
ENUNCIADO :
Crea una función que reciba 2 parámetros : un array de palabras y un carácter.
La función nos devuelve true si todas las palabras del array contienen el carácter pasado como segundo parámetro.
Por ejemplo:
Si tenemos [“hola”, “Php”, “Html”] devolverá true si preguntamos por “h” pero falso si preguntamos por “l”.
*/

/*
ESTUDIAR :
1) https://www.w3schools.com/php/php_variables_scope.asp
2) https://www.w3schools.com/php/php_ref_string.asp
strlen() : Returns the length of a string
strchr() : Finds the first occurrence of a string inside another string (alias of strstr())
stristr() : Finds the first occurrence of a string inside another string (case-insensitive)
strcasecmp() : Compares two strings (case-insensitive)
strcmp() : Compares two strings (case-sensitive)
*/

/*
Ojo con el scope LOCAL - GLOBAL - STATIC : https://www.w3schools.com/php/php_variables_scope.asp
!!! IMPORTANTE !!! : $GLOBALS[index] - Explicado en le LINK anterior.
*/

function palabras($array, $letra) { // Las variables $array y $letra usadas en la función son distintas a las usadas fuera de ella.
    global $testigo, $todas_ok;
    $testigo = 0;
    $todas_ok = false;
    $i = 0;
    do {
        if(stristr($array[$i],$letra) != false){$testigo++;} // ver https://www.w3schools.com/php/php_ref_string.asp
        $i++;
    } while($testigo == $i && $i < count($array)); // 2 condiciones : Así el bucle no recorre el array completo a menos que todas las palabras contengan la letra señalada.
    if($testigo == count($array)) {$todas_ok = true;}
}

echo "Debe decirnos 3 palabras y cual letra desea que busquemos en dichas palabras. Le diremos si la hemos encontrado presente en todas. \n\n";
$array = [];
for ($i = 0; $i < 3; $i++) {
    $array[] = readline('Indiquenos la palabra número ' . $i + 1 . ' : ' . "\n");
}
echo "\n";
$letra = readline('Ahora indíquenos la letra que desea que encontremos en las palabras que nos indicó anteriormente : ');
echo "\n\n";

palabras($array, $letra);
echo "La solución es : ";
echo (($todas_ok)? "TRUE" . "\n" : "FALSE" . "\n");
echo "El array tiene " . count($array) . " palabras : $array[0], $array[1] y $array[2].\n";
$detalle = ($testigo == 0)? "La primera palabra indicada no contenía la letra $letra." : "Verificamos hasta la palabra $testigo sin encontrar palabras que no contuviesen la letra \"$letra\" . \n";
echo $detalle;

?>