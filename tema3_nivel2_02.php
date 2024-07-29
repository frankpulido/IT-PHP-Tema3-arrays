<?php
/*
Frank Pulido - Tema 3 [ARRAYS] - Nivel 2 - Ejercicio 2
ENUNCIADO :
Crea un programa que liste las notas de los/as alumnos/as de una clase. Por eso deberemos utilizar un array asociativo donde la clave será el nombre de cada alumno.
Cada alumno tendrá 5 notas (valoradas del 0 al 10).
Además, crea una función que, dadas las notas de todos los alumnos/as, nos muestre tanto la media de la nota de cada alumno, como la nota media de la clase entera.

ESTUDIAR :
https://www.w3schools.com/php/func_array_combine.asp : Create an array by using the elements from one "keys" array and one "values" array.
unset($array) : Empties the whole array. Use index to empty only the elements you want, for instance : unset($array[1], $array[5]). Also deltes the keys.
array_fill_keys(array_keys($array), null) : Empties the array values, but keeps the keys.
Equivale a hacer esto :
    foreach ($array as $i => $value) {
    $array[$i]=NULL;
}
*/

$opcion = -1;
$alumnos = 0; // número de alumnos de la clase, lo definirá el usuario
$keys_alumnos = []; // Aquí tomaremos los nombres
$keys_notas = ["matemáticas", "física", 'química', 'historia', 'biología']; // Aquí almacenaremos las notas, son 5 por alumno. Lo creo con claves para simular 5 asignaturas.
// The "extra mile" : calculate average grade by $notas keys : matemáticas, química, historia...
$notas_clase = []; // Usaré array_combine($keys, $notas) y así obtendré el array asociativo creado enteramente por el usuario

echo "\n";
do {
    $alumnos = (int) readline("Indique el número de alumnos de la clase : ");
    if ($alumnos < 2) {echo "Este ejercicio sólo puede hacerse con 2 o más alumnos";}
} while ($alumnos < 2);
echo "\n";
for ($i = 1; $i <= $alumnos; $i++) {
    $keys_alumnos [] = readline("Indique el nombre del alumno(a) $i : "); 
}
echo "\n";
echo "La clase consta de $alumnos alumnos. A saber :\n";
print_r($keys_alumnos);

// Ahora tomaremos las notas
$notas_alumno = [];
$notas_alumno_asociativo = [];
for ($i = 0; $i < $alumnos; $i++) {
    unset($notas_alumno); // Debemos inicializar este array auxiliar en cada ciclo del bucle. La función unset vacía el array
    $notas_alumno_asociativo = array_fill_keys($keys_alumnos, null); // Debemos inicializar este array auxiliar en cada ciclo del bucle. Usamos esta función para no eliminar las "keys"
    echo "\n";
    echo "Por favor, indíquenos las notas de $keys_alumnos[$i] :\n";
    for($j = 0; $j < count($keys_notas); $j++) {
        echo "$keys_alumnos[$i] - Nota obtenida en $keys_notas[$j] : ";
        $notas_alumno[] = (int) readline();
    }
    $notas_alumno_asociativo = array_combine($keys_notas, $notas_alumno);
    $notas_clase [] = $notas_alumno_asociativo;
}
echo "\n";
echo "Las notas de los $alumnos alumnos de la clase :\n";
$notas_clase_asociativo = array_combine($keys_alumnos, $notas_clase);
print_r($notas_clase_asociativo);
echo "\n";

/*
Ahora tenemos finalmente los datos de la clase : Hemos construido un array asociativo cuyos elementos son arrays aociativos.
A continuación pasaremos a las funciones que nos piden
*/

do {
    echo "\n";
    echo "*** Menú del Director ***\n1- Media de notas GENERAL de la clase.\n2- Media de notas de la clase por asignaturas.\n3- Media de notas de los alumnos.\n0- Salir del sistema.\n";
    echo "\n";
    $opcion = (int) readline("Elija una opción del 1 al 3 o \"0\" (cero) para salir del sistema : ");

    switch ($opcion) {
        case 0 :
            echo "\n";
            echo "Se cierra su sesión de usuario.";
            break;
        case 1 :
            echo "\n";
            echo "Media de notas GENERAL de la clase.\n";
            $media_alumnos_asociativo = average_students($notas_clase_asociativo, $keys_notas, $keys_alumnos);
            $media_clase = (float) $media_alumnos_asociativo / $alumnos;
            echo "La media general de notas de la clase (tomando en cuenta TODAS las asignaturas es : $media_clase";
            break;
        case 2 :
            echo "\n";
            echo "Media de notas de la clase por asignatura.\n";
            break;
        case 3 :
            echo "\n";
            echo "Media de notas de los alumnos.\n";
            $media_alumnos_asociativo = average_students($notas_clase_asociativo, $keys_notas, $keys_alumnos);
            print_r($media_alumnos_asociativo);
            break;
        default :
            echo "Debe elegir una opción válida";
            break;
    }
} while ($opcion != 0);

function average_students($notas_clase_asociativo, $keys_notas, $keys_alumnos) {
    global $media_alumnos_asociativo;
    foreach ($notas_clase_asociativo as $notas=>$values) {
        $average = array_sum($values)/count($keys_notas);
        $avg_students [] = $average;
    }
    $media_alumnos_asociativo = array_combine($keys_alumnos, $avg_students);
}

?> 