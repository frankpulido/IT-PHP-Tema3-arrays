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
$keys_alumnos = []; // Aquí tomaremos los nombres que serán claves del array asociativo que almacenará todas las notas de los alumnos
$keys_notas = ["matemáticas", "física", 'química', 'historia', 'biología']; // Aquí almacenaremos las notas, son 5 por alumno. Lo creo con claves para simular 5 asignaturas.
// The "extra mile" : calculate class average grade by $notas keys : matemáticas, química, historia...
$notas_alumno = []; // Almacena las notas de cada alumno dentro de un loop en el mismo orden en que se creó previamente $keys_notas. Se hace unset al inicio de cada iteración.
$notas_alumno_asociativo = []; // Combinará $keys_notas y $notas_alumno para cada alumno. Se usa para crear cada nuevo elemento en $notas_clase[].
$notas_clase = []; // Almacenará todos los arrays creados como $notas_alumno_asociativo[]
$notas_clase_asociativo = []; // Usaré array_combine($keys_alumnos, $notas_clase) y así obtendré el array asociativo creado enteramente por el usuario


echo "\n";
do {
    $alumnos = (int) readline("Indique el número de alumnos de la clase : ");
    if ($alumnos <= 2) {echo "Este ejercicio sólo puede hacerse con 2 o más alumnos";}
} while ($alumnos <= 2);
echo "\n";
for ($i = 1; $i <= $alumnos; $i++) {
    $keys_alumnos [] = readline("Indique el nombre del alumno(a) $i : "); 
}
echo "\n";
echo "La clase consta de $alumnos alumnos. A saber :\n";
print_r($keys_alumnos);

// Ahora tomaremos las notas
for ($i = 0; $i < $alumnos; $i++) {
    unset($notas_alumno); // Debemos inicializar este array auxiliar en cada ciclo del bucle. La función unset vacía el array
    echo "\n";
    echo "Por favor, indíquenos las notas de $keys_alumnos[$i] :\n";
    for($j = 0; $j < count($keys_notas); $j++) {
        echo "$keys_alumnos[$i] - Nota obtenida en $keys_notas[$j] : ";
        $notas_alumno[] = (int) readline(); // Este array almacena todas las notas del alumno
    }
    $notas_alumno_asociativo = array_combine($keys_notas, $notas_alumno); // Este array convierte el anterior en un array asociativo (claves : $keys_notas)
    $notas_clase [] = $notas_alumno_asociativo; // Las notas del alumno i se almacenan en el Array que contiene las notas de toda la clase
}
echo "\n";
echo "Las notas de los $alumnos alumnos de la clase :\n";
$notas_clase_asociativo = array_combine($keys_alumnos, $notas_clase); // Convertimos el array de notas de toda la clase en un Array asociativo (claves : $keys_alumnos)
print_r($notas_clase_asociativo);
echo "\n";

/*
ARRAY 2D. Ahora tenemos finalmente los datos de la clase : Hemos construido un array asociativo cuyos elementos son también arrays aociativos.
A continuación pasaremos a las funciones que nos piden desarrollar.
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
            $media_clase = (float) average_class($notas_clase_asociativo, $keys_notas, $keys_alumnos);
            echo "La media general de notas de la clase (tomando en cuenta TODAS las asignaturas) es : $media_clase";
            echo "\n\n";
            break;
        case 2 :
            echo "\n";
            echo "[EXTRA MILE] Media de notas de la clase por asignatura.\n"; // Extra-mile
            //echo "El enunciado pedía hacer las opciones 1 y 3 del menú.\nEsta opción del menú es el \"EXTRA MILE\" que aún no he desarrollado :(";
            //echo "IDEA 1 : ";
            //echo "IDEA 2 : ";
            $media_asignaturas_asociativo = average_courses($notas_clase_asociativo, $keys_notas, $keys_alumnos);
            print_r($media_asignaturas_asociativo);
            echo "\n";
            break;
        case 3 :
            echo "\n";
            echo "Media de notas de los alumnos.\n";
            $media_alumnos_asociativo = average_students($notas_clase_asociativo, $keys_notas, $keys_alumnos);
            print_r($media_alumnos_asociativo);
            echo "\n";
            break;
        default :
            echo "Debe elegir una opción válida";
            break;
    }
} while ($opcion != 0);

function average_students($notas_clase_asociativo, $keys_notas, $keys_alumnos) {
    $average = 0;
    $average_students = [];
    $media_alumnos_asociativo = [];
    foreach ($notas_clase_asociativo as $notas=>$values) {
        $average = array_sum($values)/count($keys_notas);
        $avg_students [] = $average;
    }
    $media_alumnos_asociativo = array_combine($keys_alumnos, $avg_students);
    return $media_alumnos_asociativo;
}


function average_class($notas_clase_asociativo, $keys_notas, $keys_alumnos) {
    $media_clase = 0;
    $media_clase = array_sum(average_students($notas_clase_asociativo, $keys_notas, $keys_alumnos)) / count($keys_alumnos);
    return $media_clase;
}


function average_courses($notas_clase_asociativo, $keys_notas, $keys_alumnos) {
    $avg_asignatura = [];
    $avg_asignaturas = [];
    $avg_asignaturas_asociativo = [];
    for ($i = 0; $i < count($keys_notas); $i++) {
        unset ($avg_asignatura);
        $avg_asignatura = array_sum(array_column($notas_clase_asociativo, $keys_notas[$i]))/count($keys_alumnos);
        $avg_asignaturas[] = $avg_asignatura;
    }
    $avg_asignaturas_asociativo = array_combine($keys_notas, $avg_asignaturas);
    return $avg_asignaturas_asociativo;
}

?>