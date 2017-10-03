<?php

ini_set('error_reporting',E_ALL ^ E_NOTICE ^ E_WARNING);
ini_set('display_errors', 'on');
ini_set('max_execution_time',10);
    
$nombre = $_GET['txtNombre'];
$edad = $_GET['txtEdad'];
$fecNac = $_GET['txtFecNac'];
$comentario = $_GET['txtComentarios'];
$control = $_GET['control'];
$sexo =$_GET['sexo'];
$aficion = $_GET['selAficion'];
echo json_encode(array("nombre"=>$nombre,
                        "edad"=>$edad,
                        "fecNac"=>$fecNac,
                        "aficion"=>$aficion,
                        "sexo"=>$sexo,
                        "comentarios"=>$comentario,
                        "control"=>$control));

