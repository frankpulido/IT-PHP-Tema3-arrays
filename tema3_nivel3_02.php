<?php
/*
Frank Pulido - Tema 3 [ARRAYS] - Nivel 3 - Ejercicio 2
ENUNCIADO :
Dado un array de strings, haz un programa que:
Devuelva un array donde sólo estén los strings que tengan un nombre par de caracteres usando la función array_filter().
ESTUDIAR :
https://www.w3schools.com/php/func_array_filter.asp
https://www.w3schools.com/php/func_string_strlen.asp
función fmod() : https://www.w3schools.com/php/func_math_fmod.asp
*/

$cantidad = 0;
$palabras = [];
$palabras_pares = [];

echo "\n";
echo "Usted nos indicará una serie de palabras o frases y le devolveremos aquellas que tengan un número par de caracteres";
$cantidad = (int)readline("Indique cuantas palabras o frases quiere utilizar : ");
echo "\n";

for ($i = 0; $i < $cantidad; $i++) {
    $palabras [] = readline("Palabra " .$i+1 . " : ");
}

echo "\n";
echo "Palabras a evaluar : \n";
print_r($palabras);

echo "\n";

function filter ($a) {
    return (fmod(strlen($a),2) == 0);
}

echo "Uso función creada por mi y la paso como parámetro a la función \"array_filter(array, \"function\")\", dándole salida por un print_r :\n";
print_r(array_filter($palabras, "filter"));
echo "\n";

echo "El array original continúa intacto, los elementos del array evaluados por \"function\" como \"FALSE\" no se eliminan :\n";
print_r($palabras);

echo "\n";
echo "Puedo almacenar los valores filtrados como un array que se almacena como primer elemento del nuevo array :\n";
echo "(puede ser útil si me pasan varios arrays de strings a filtrar y quiero almacenar todos los resultados en una única variable de tipo array)\n\n";
$palabras_pares1[] = array_filter($palabras, "filter");
print_r($palabras_pares1);

echo "\n";
echo "Puedo también crear un nuevo array en el que cada palabra filtrada constituya un elemento :\n\n";
$palabras_pares2 = (array_filter($palabras, "filter")); // Los paréntesis exteriores nos permiten almacenar el resultado filtrado en una variable de tipo array.
print_r($palabras_pares2);

/*
Otra manera de hacerlo :
for ($i = 0; $i < count($palabras); $i++){
    if(strlen($palabras[$i])%2 > 0){unset($palabras[$i]);}
    return $palabras;
}
*/

?>