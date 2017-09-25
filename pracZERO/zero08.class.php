<?php

ini_set('error_reporting',E_ALL ^ E_NOTICE ^ E_WARNING);
ini_set('display_errors', 'on');
ini_set('max_execution_time',10);

class zero08{

   private $str;
    
   function __construct() {
    
}

function fileRead($file){
    $result=array();
      if (($gestor = fopen($file, "r")) !== FALSE) {
          while (($datos = fgetcsv($gestor, 1000, ";")) !== FALSE) {
              $numero = count($datos);
              array_push($result,array("id"=>$datos[0],"name"=>$datos[1]));
          }
      fclose($gestor);
      }
      return $result;
  }

  function findcodPostal ($codPostal){
    global $municipios;
    $patron = "/^".$codPostal."/";
    $result=array();

    foreach($municipios as $municipio){
        if(preg_match($patron, $municipio["id"])){
            array_push($result,array("id"=>$municipio["id"],"name"=>$municipio["name"]));
        }
    }
    return $result;
    
}

}
?>