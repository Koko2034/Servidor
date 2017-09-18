<?php

ini_set('error_reporting', E_ALL ^ E_NOTICE ^ E_WARNING);
ini_set('display_errors', 'on');
ini_set('max_execution_time', 10);

require_once __DIR__ . '/zero05.class.php';

$z = new zero05($_GET['correo']);

if ($z->validaCorreo()) {
    echo "green";
} else {
    echo "red";
}