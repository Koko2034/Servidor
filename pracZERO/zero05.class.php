<?php

ini_set('error_reporting',E_ALL ^ E_NOTICE ^ E_WARNING);
ini_set('display_errors', 'on');
ini_set('max_execution_time',10);

class zero05{

    public  function validacionEmail($correo) {
       
        return filter_var($correo,FILTER_VALIDATE_EMAIL);
        }
}