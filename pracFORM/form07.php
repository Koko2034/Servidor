<?php

ini_set('error_reporting',E_ALL ^ E_NOTICE ^ E_WARNING);
ini_set('display_errors', 'on');
ini_set('max_execution_time',10);

define(FICHERO, __DIR__ . DIRECTORY_SEPARATOR . 'gente.xml');
define(INFO,__DIR__ . DIRECTORY_SEPARATOR . 'distancia.json');

function PostToHost($host, $path, $referer, $data_to_send) {
    $fp = fsockopen($host, 80);
    fputs($fp, "POST $path HTTP/1.0\r\n");
    fputs($fp, "Host: $host\r\n");
    fputs($fp, "Referer: $referer\r\n");
    fputs($fp, "Content-type: application/x-www-form-urlencoded\r\n");
    fputs($fp, "Content-length: " . strlen($data_to_send) . "\r\n");
    fputs($fp, "Accept-Encoding: gzip, deflate\r\n");
    fputs($fp, "Connection: close\r\n\r\n");
    fputs($fp, "$data_to_send");
    while (!feof($fp)) {
        $res .= fgets($fp, 204800);
    }
    fclose($fp);
    if (preg_match("/Content-Encoding: gzip/", $res)) {
        $arrBuf = explode("\r\n\r\n", $res);
        $res = "$arrBuf[0]\r\n\r\n" . gzdecode($arrBuf[1]);
    }
    # quitamos cabeceras
    list($headers, $body) = explode("\r\n\r\n", $res, 2);
    return $body;
 }
 function genXML() {
    $doc = new DOMDocument('1.0', 'utf-8');
    $str = '<?xml version="1.0" encoding="UTF-8"?>
            <gentes>
            </gentes>';
    $doc->loadXML($str);
    $doc->save(FICHERO);
}
function createUser($nombre,$lat,$lon){
    $dom = new DOMDocument('1.0', 'utf-8');
    $dom->load(FICHERO);
    $xpath = new DOMXPath($dom);
    foreach ($xpath->query("//gentes") as $nodo) {
    $node_user = $dom->createElement('gente');
    $node_nombre =$dom->createElement('nombre',$nombre);
    $node_lat=$dom->createElement('lat',$lat);
    $node_lon=$dom->createElement('lon',$lon);
    $nodo->appendChild($node_user);
    $node_user->appendChild($node_nombre);
    $node_user->appendChild($node_lat);
    $node_user->appendChild($node_lon);
 }   
 $dom->save(FICHERO);         
 }
function createJson($nombre,$distancia){
    $json_distancia[]= ["nombre"=>$nombre,"distancia"=>$distancia];
    $json_distancia = json_encode($json_distancia);
    file_put_contents(INFO,$json_distancia);
 }
function modifyJson($nombre,$distancia){
    $json_distancia = json_decode(file_get_contents(INFO),true);
    $json_distancia[]=["nombre"=>$nombre,"distancia"=>$distancia];
    $json_distancia = json_encode($json_distancia);
    unlink(INFO);
    file_put_contents(INFO,$json_distancia);
}
$nombre=$_POST['txtNombre'];
$opcion = $_POST['texto'];
if($opcion=="crear"){
      if(!file_exists(FICHERO)){
        genXML();
      }
      createUser($nombre);
      $result = PostToHost('localhost', 'http://213.32.71.33/Servidor/pracFORM/wsGeo.php', "", http_build_query($_POST));
      if(!file_exists(INFO)){
       createJson($nombre,$result);
       file_get_contents(INFO);
      }else{
       modifyJson($nombre,$result);
       file_get_contents(INFO);
      }
      echo json_encode(array("status"=>"ok","mensaje"=>"existe"));   

}

if($_POST['texto']=='check'){
    echo file_get_contents(INFO);
}
if($_POST['texto']=='inicio'){
    $mensaje ="existe";
    if(!file_exists(INFO)){
        $mensaje="no existe";
       }
    echo json_encode(array("status"=>"ok","mensaje"=>$mensaje)); 
}


