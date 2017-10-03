<?php

ini_set('error_reporting',E_ALL ^ E_NOTICE ^ E_WARNING);
ini_set('display_errors', 'on');
ini_set('max_execution_time',60);

$lat1 = $_POST['txtLat'];
$lon1 = $_POST['txtLon'];
$lat2 = 36.718025;
$lon2 = -4.446722;
function harvestine($lat1, $long1, $lat2, $long2){ 
    //Distancia en kilometros en 1 grado distancia.
    //Distancia en millas nauticas en 1 grado distancia: $mn = 60.098;
    //Distancia en millas en 1 grado distancia: 69.174;
    //Solo aplicable a la tierra, es decir es una constante que cambiaria en la luna, marte... etc.
    $km = 111.302;
    
    //1 Grado = 0.01745329 Radianes    
    $degtorad = 0.01745329;
    
    //1 Radian = 57.29577951 Grados
    $radtodeg = 57.29577951; 
    //La formula que calcula la distancia en grados en una esfera, llamada formula de Harvestine. Para mas informacion hay que mirar en Wikipedia
    //http://es.wikipedia.org/wiki/F%C3%B3rmula_del_Haversine
    $dlong = ($long1 - $long2); 
    $dvalue = (sin($lat1 * $degtorad) * sin($lat2 * $degtorad)) + (cos($lat1 * $degtorad) * cos($lat2 * $degtorad) * cos($dlong * $degtorad)); 
    $dd = acos($dvalue) * $radtodeg; 
    return round(($dd * $km), 2);
}

echo $result = harvestine($lat1,$lon1,$lat2,$lon2);



