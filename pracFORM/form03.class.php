<?php

ini_set('error_reporting',E_ALL ^ E_NOTICE ^ E_WARNING);
ini_set('display_errors', 'on');
ini_set('max_execution_time',10);

class form03{

    private $name;
    private $pass;
    
   function __construct($name,$pass) {
    $this->name = $name;
    $this->pass = $pass;
}
    function checkLogin(){
        $respuesta = false;
        return $respuesta;
    }
    function clean(){
        unset($_POST);
    }
    function createHTML(){
        
    }
   
}