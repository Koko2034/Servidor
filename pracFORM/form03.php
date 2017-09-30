<?php

ini_set('error_reporting',E_ALL ^ E_NOTICE ^ E_WARNING);
ini_set('display_errors', 'on');
ini_set('max_execution_time',10);
    


require_once  __DIR__  . '/form03.class.php';

$name = "";
$pass = "";

if(empty($_POST['name']) && empty($_POST['password'])){

    $name = $_POST['name'];

    $pass= $_POST['password'];
}

$form3 = new form3($name,$pass);

$result = $form3->checkLogin();

if($result){
    $form3->createHtml();
}

if(empty($_POST['reenviar'])){
    echo $str;
}else{
    header('location:'.__DIR__ .'/form3.html');
}

$form3->clean();



