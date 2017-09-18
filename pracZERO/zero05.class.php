<?php

ini_set('error_reporting',E_ALL ^ E_NOTICE ^ E_WARNING);
ini_set('display_errors', 'on');
ini_set('max_execution_time',10);

class zero05{

    private $str;

    function construct($str){
        $this->str=$str;
    }
    public  function validacionEmail() {
       
        return filter_var($this->str,FILTER_VALIDATE_EMAIL);
        }
}