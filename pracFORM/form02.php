<?php

ini_set('error_reporting',E_ALL ^ E_NOTICE ^ E_WARNING);
ini_set('display_errors', 'on');
ini_set('max_execution_time',10);
    

function renombrar($nameFoto,$lonExt){
    //$nameFoto es el nombre de la foto con la extension que tiene
    // $lonExt es la longitud de la extension de la foto
    //Tomamos la ruta de ubicacion del archivo php form02
    $ruta = getcwd();
    // Escaneamos todos los archivos que tenemos dentro, introduciendolos en un array
    $valores = scandir($ruta);
    // Tomamos la longitud del nombre de la imagen eliminando la extension
    $contNamefoto = strlen($nameFoto)-$lonExt;
    //contabiliza el tamaño del array de los archivos dentro de nuestra ruta destino
    $cont = count($valores); 
    $contador=0;
    //Modificacion del nombre de la imagen eliminando la extension
    $nameFotoPrincipal = substr($nameFoto,0,$contNamefoto);
    //Contabilizamos el numero de archivos que hay con el nombre que tenemos de foto para poder renombrarlo
    for($i=2;$i<$cont;$i++){ 
        if( $nameFotoPrincipal == substr($valores[$i],0,$contNamefoto)){
            $contador++;
        }
    }
    if($contador!=0){
        $contador++;
        //cambiar dinamicamente la numeracion de las fotos
        $contador = str_pad($contador,2,"0",STR_PAD_LEFT);
        //Creamos un nuevo nombre de foto con la extension correspondiente
        $nameFoto = $nameFotoPrincipal.$contador.'.'.obtenerExtensionFichero($_FILES['ficFoto']['name']);
    }
    //retornamos un string que es la ruta que tenemos el archivo php form con el nombre de la foto completo
    return getcwd().'/'.$nameFoto;
}
function obtenerExtensionFichero($str){
        return end(explode(".",$str));
}
// Calculamos la longitud de la extension del archivo contabilizando el punto por eso le sumamos +1
$longExt = strlen(obtenerExtensionFichero($_FILES['ficFoto']['name']))+1;
//renombramos con la ruta nueva
$newUbicacionFoto = renombrar($_FILES['ficFoto']['name'],$longExt);
//movemos y renombramos el archivo en un solo paso gracias a la funcion
rename($_FILES['ficFoto']['tmp_name'],$newUbicacionFoto);



