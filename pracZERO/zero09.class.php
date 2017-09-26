<?php

ini_set('error_reporting',E_ALL ^ E_NOTICE ^ E_WARNING);
ini_set('display_errors', 'on');
ini_set('max_execution_time',10);

class zero09{

    private $str;
    
        function __construct($str) {
            $this->str =$str;
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
function mergeImage($codPostal, $name){
    
     $imgMuni = "img/".$codPostal.".png";
     
     $src = ImageCreateFromPng($imgMuni);
     
    $this->createTextImage($name,$imgMuni);
     
     
     header('Content-Type: image/png');
     imagepng($src,"./prueba.png");
    
     $imN = ImageCreateTrueColor(300,600);
     $imN=ImageCreate(300,600);
     $baseimagen = imagecolorallocate($imN, 255, 255, 255);
     $ts_viewer = ImageCreateFromPng("./img/prueba.png");
     $logo = ImageCreateFromPng($imgMuni);
 
     imagecopymerge($baseimagen, $ts_viewer, 0, 0, 0, 0, 300,600, 100);
     
     imagecopymerge($baseimagen, $logo, 0, 230, 0, 0, 300, 600, 100);
    
     header("Content-Type: image/png");
     $newIma ="img/".$name.".png";
     ImagePng($baseimagen,$newIma);
     
    return $newIma;
     
 
     
 }
 function createTextImage($text,$name){
    
    header("Content-type: image/png");
    $im     = imagecreatefrompng("./img/white.png");
    $naranja = imagecolorallocate($im, 0, 0, 0);
    $px     = (imagesx($im) - 7.5 * strlen($text)) / 2;
    $py = (imagesy($im) - 7.5 * strlen($text))/2;
    imagestring($im, 16, $px, 600, $text, $naranja);
    imagepng($im,"./img/prueba.png");
    imagedestroy($im);
    
}

}



?>