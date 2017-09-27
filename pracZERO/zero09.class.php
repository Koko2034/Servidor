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
   
    
    //Creamos la base de la imagen donde colocaremos luego las otras dos
 
    
    // set background to white
    
    
    $img = imagecreatetruecolor(300, 450);
   
    $white = imagecolorallocate($img, 255, 255, 255);
    imagefill($img, 0, 0, $white);
    //imagepng($img,"./img/white.png");
    //$img = ImageCreateFromPng("./img/white.png");
    
	$ts_viewer = ImageCreateFromPng("./img/texto.png");
	$logo = ImageCreateFromPng($imgMuni);

	imagecopymerge($img, $ts_viewer, 0, 0, 0, 0,300,600,100);
	//Cargamos la segunda imagen(cuerpo)
	
	//Juntamos la segunda imagen con la imagen base
	imagecopymerge($img, $logo, 0, 150, 0, 0, 300, 600, 100);
	//Mostramos la imagen en el navegador
    header("Content-Type: image/png");
    $name = $this->normaliza($name);
    $newIma ="img/".$name.".png";
    ImagePng($img,$newIma);
    $newIma=base64_encode($newIma);
    
	//Limpiamos la memoria 
    
   return $newIma;
    
     
 
     
 }
 function createTextImage($text,$name){
    header("Content-type: image/png");
    $im     = imagecreatefrompng("./img/white.png");
    $naranja = imagecolorallocate($im, 0, 0, 0);
    $px     = (imagesx($im) - 7.5 * strlen($text)) / 2;
    $py = (imagesy($im) - 7.5 * strlen($text))/2;
    imagestring($im, 16, $px, $py, $text, $naranja);
    imagepng($im,"./img/texto.png");
    //imagedestroy($im);
    
    
}
function normaliza ($cadena){
    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞ
ßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuy
bsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    $cadena = strtolower($cadena);
    return utf8_encode($cadena);
}

}



?>