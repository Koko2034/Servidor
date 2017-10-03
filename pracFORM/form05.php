<?php

ini_set('error_reporting',E_ALL ^ E_NOTICE ^ E_WARNING);
ini_set('display_errors', 'on');
ini_set('max_execution_time',10);

$str = '<p>El nombre es'.$_POST['txtNombre'].',</p>
<p>la edad es '.$_POST['txtEdad'].',</p>
<p>la aficion es '.$_POST['selAficion'].',</p>
<p>el sexo es '.$_POST['txtFecNac'].',</p>
<p>la informacion es '.$_POST['txtComentarios'].',</p>
<p>el control es '.$_POST['control'].'</p>';

$imagen = $_FILES['ficFoto']['tmp_name'];
$imagen = file_get_contents($_FILES['ficFoto']['tmp_name']);
$imagen_envio = base64_encode($imagen);
$str.='<img width="60px" height="60px" src=data:image/png;base64,'.$imagen_envio.'>';
echo json_encode($str);