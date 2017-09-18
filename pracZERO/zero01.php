<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zero01</title>
</head>
<body>
<div>
    <?php

ini_set('error_reporting',E_ALL ^ E_NOTICE ^ E_WARNING);
ini_set('display_errors', 'on');
ini_set('max_execution_time',10);


      for($i=0; $i<50;$i++){
         echo "<hr style='width:50'.$i.'></hr>";
      }
   ?>
   </div>
</body>
</html>