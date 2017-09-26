<?php

ini_set('error_reporting', E_ALL ^ E_NOTICE ^E_WARNING);
ini_set('display_errors', 'on');
ini_set('max_execution_time',10);

require_once  __DIR__  . '/zero09.class.php';


$str = $_GET['accion'];
$codPostal = $_GET['codPostal'];
$name =$_GET['name'];

$zero = new zero09($str);
$municipios =$zero->fileRead("municipios.csv");


if($str == "provincias"){

    echo json_encode(array("status"=>"ok","prov"=>$zero->fileRead("provincias.csv")));
}
else if($str == "municipios"){

    echo json_encode(array('status'=>'ok',"mun"=>$zero->findcodPostal($codPostal)));
}
else if ($str == "imagen"){
  
   $imagen = ($zero->mergeImage($codPostal,$name));
   echo json_encode(array('status'=>'ok','img'=>$imagen));
}



?>


 


  









