
    <?php

ini_set('error_reporting',E_ALL ^ E_NOTICE ^ E_WARNING);
ini_set('display_errors', 'on');
ini_set('max_execution_time',10);

$correo = $_GET['correo'];


require_once  __DIR__  . '/zero5.class.php';

    $log= new zero05();
    
    if($log->validacionEmail($correo)){
        echo "green";
    }else{
        echo "red";
    }
   ?>
       