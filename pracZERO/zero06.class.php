<?php

ini_set('error_reporting',E_ALL ^ E_NOTICE ^ E_WARNING);
ini_set('display_errors', 'on');
ini_set('max_execution_time',10);

class zero06{

   private $str;


   function __construct($str) {
    $this->str = $str;
}
  

   function averiguarPalabra(){
       $palabras=array(
           "mesa"=> 1,
           "silla"=>1,
           "papel"=>1
       );
          return isset($palabras[$this->str]) ? true : false;
          
   }
  
}