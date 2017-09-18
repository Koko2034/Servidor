
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Zero04</title>
    </head>
    <body>
    
    <?php

ini_set('error_reporting',E_ALL ^ E_NOTICE ^ E_WARNING);
ini_set('display_errors', 'on');
ini_set('max_execution_time',10);

    require_once  __DIR__  . '/zero04.class.php';

    $log= new zero04();

    for($i=0;$i<50;$i++){
        $valor=rand(50,200);
        echo "<hr style='width:".$valor."px;height: 35px;background-color:".$log->color_rand()."'></hr>";
    }

    function color_rand() {
        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
        }
   ?>
       
    </body>
    </html>