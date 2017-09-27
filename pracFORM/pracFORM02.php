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
    for($i=2;$i<$cont;$i++){ 
        if(substr($nameFoto,0,(strlen($nameFoto)-4)) == substr($valores[$i],0,$contNamefoto)){
            $contador++;
        }
    }
    if($contador!=0){
        $nameFoto = substr($nameFoto,0,(strlen($nameFoto)-4)).$contador++.substr($nameFoto,$contNamefoto,strlen($nameFoto));
    }
    return $nameFoto;
}

$nameFoto = renombrar($_FILES['ficFoto']['name']);
$ruta =getcwd().'/'.$nameFoto;
$nameFoto.rename($_FILES['ficFoto']['tmp_name'],$ruta);



