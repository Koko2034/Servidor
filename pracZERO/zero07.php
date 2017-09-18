

    <?php
    
    ini_set('error_reporting',E_ALL ^ E_NOTICE ^ E_WARNING);
    ini_set('display_errors', 'on');
    ini_set('max_execution_time',10);
        
    
    require_once  __DIR__  . '/zero07.class.php';
        $prueba ="hola que tal ";
        $log= new zero07($_GET['texto']);
        
        $textoInvertido = $log->textoInvertido();
        $palabrasInvertidas = $log->palabrasInvertidas();
        echo json_encode(array("status"=>"ok","textoInvertido"=>$textoInvertido,"palabrasInvertidas"=>$palabrasInvertidas));
    
       ?>