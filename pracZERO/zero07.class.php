<?php

ini_set('error_reporting',E_ALL ^ E_NOTICE ^ E_WARNING);
ini_set('display_errors', 'on');
ini_set('max_execution_time',10);

class zero07{

   private $str;


   function __construct($str) {
    $this->str = $str;
}
  function textoInvertido(){
      return strrev($this->str);
  }
  function palabrasInvertidas(){
    $texto = $this->str;
     $textoinver="";
     while(strpos($texto," ")!=0){
        $pos =strpos($texto," ");
        $palabra =  substr($texto,0,$pos);
        $palabra = strrev($palabra);
        $textoinver.=$palabra." ";
        $texto=substr($texto,$pos+1);
     }
      $palabra = strrev($texto);
      $textoinver.=$palabra." ";
      return $textoinver;
     
  }
  

   
  
}