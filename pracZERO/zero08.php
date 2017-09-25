

    <?php
    
    ini_set('error_reporting',E_ALL ^ E_NOTICE ^ E_WARNING);
    ini_set('display_errors', 'on');
    ini_set('max_execution_time',10);
        
    
    require_once  __DIR__  . '/zero08.class.php';
       

    $accion = $_GET['accion'];
    $codPostal = $_GET['codPostal'];
   
    
    
    
    $zero = new zero08();
    
    
    if($accion == "provincias"){
    
        echo json_encode(array("prov"=>$zero->fileRead("provincias.csv")));
    }
    else if($accion == "municipios"){
        $municipios = $zero->fileRead("municipios.csv");
        echo json_encode(array("mun"=>$zero->findcodPostal($codPostal)));
    }
       ?>