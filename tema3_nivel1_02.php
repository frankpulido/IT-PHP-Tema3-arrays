<?php
/*
Frank Pulido - Tema 3 [ARRAYS] - Nivel 1 - Ejercicio 2
ENUNCIADO :
$x = array (10, 20, 30, 40, 50, 60);
Mostrar por pantalla el tamaño del array anterior y posteriormente elimina un elemento del array anterior.
Después de eliminar el elemento, las claves enteras deben ser normalizadas (se deben reorganizar sus índices). Muestra por última vez el tamaño del array..
*/

$x = array (10, 20, 30, 40, 50, 60);

echo "Tenemos el siguiente Array que consta de " . count($x) . " elementos :\n\n";
print_r($x);
echo "\n\n";

echo "Eliminamos a continuación un elemento (el tercero, index = 2) con la función unset y vemos que se desindexa :\n\n";
unset($x[2]);
print_r($x);
echo "\n\n";

echo "Para reindexar el Array podemos crear una nueva variable de tipo array y volcar los valores del original usando un FOREACH :\n\n";
foreach ($x as $index => $valor) {
    $y[] = $valor;
}

echo "Ahora el Array consta de " . count($y) . " elementos, pero está bien indexado almacenado en una nueva variable :\n\n";
print_r($y);
echo "\n\n";

?>