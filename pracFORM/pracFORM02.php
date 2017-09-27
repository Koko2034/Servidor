<?php

ini_set('error_reporting',E_ALL ^ E_NOTICE ^ E_WARNING);
ini_set('display_errors', 'on');
ini_set('max_execution_time',10);
    

function renombrar($nameFoto){
    $ruta = getcwd();
    $valores = scandir($ruta);
    $contNamefoto = strlen($nameFoto)-4;
    $cont = count($valores); 
    $contador=0;
    $nameFotoPrincipal = substr($nameFoto,0,(strlen($nameFoto)-4));
    $extension = substr($nameFoto,$contNamefoto,strlen($nameFoto));
    for($i=2;$i<$cont;$i++){ 
        if( $nameFotoPrincipal == substr($valores[$i],0,$contNamefoto)){
            $contador++;
        }
    }
    if($contador!=0){
        $nameFoto = $nameFotoPrincipal.$contador++.$extension;
    }
    return getcwd().'/'.$nameFoto;
}

$ruta = renombrar($_FILES['ficFoto']['name']);
$nameFoto.rename($_FILES['ficFoto']['tmp_name'],$ruta);



