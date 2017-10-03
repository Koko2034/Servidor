<?php

ini_set('error_reporting',E_ALL ^ E_NOTICE ^ E_WARNING);
ini_set('display_errors', 'on');
ini_set('max_execution_time',60);

$lat1 = $_POST['lat1'];
$lat2 = $_POST['lat2'];
$lon1 = $_POST['lon1'];
$lon2 = $_POST['lon2'];
$lat1 = 36.7585406;
$lat2 = 37.1886273;
$lon1 = -4.3971722;
$lon2 = -3.5907775;

function PostToHost($host, $path, $referer, $data_to_send) {
    $fp = fsockopen($host, 80);
    fputs($fp, "POST $path HTTP/1.1\r\n");
    fputs($fp, "Host: $host\r\n");
    fputs($fp, "Referer: $referer\r\n");
    fputs($fp, "Content-type: application/x-www-form-urlencoded\r\n");
    fputs($fp, "Content-length: " . strlen($data_to_send) . "\r\n");
    fputs($fp, "Accept-Encoding: gzip, deflate\r\n");
    fputs($fp, "Connection: close\r\n\r\n");
    fputs($fp, "$data_to_send");
    while (!feof($fp)) {
        $res.= fgets($fp, 204800);
    
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
$host = "localhost";
$path = 'http://213.32.71.33/Servidor/pracFORM/wsGeo.php';
$referer="";
$data_to_send = "lan1=".$lat1."\&lan2=".$lat2."\&lon1=".$lon1."\&lon2=".$lon2;

echo $retorno = PostToHost($host,$path,$referer,$data_to_send);