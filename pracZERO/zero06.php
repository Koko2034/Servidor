
    <?php

ini_set('error_reporting',E_ALL ^ E_NOTICE ^ E_WARNING);
ini_set('display_errors', 'on');
ini_set('max_execution_time',10);
    

require_once  __DIR__  . '/zero06.class.php';

    $log= new zero06($_GET['palabra']);
    
    if($log->averiguarPalabra()){
        echo "green";
    }else{
        echo "red";
    }


   ?>
     