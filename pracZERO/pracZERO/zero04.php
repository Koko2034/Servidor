<?php

ini_set('error_reporting', E_ALL ^ E_NOTICE ^ E_WARNING);
ini_set('display_errors', 'on');
ini_set('max_execution_time', 10);

require_once __DIR__ . '/zero04.class.php';

$ca = new zero04();

for ($i = 0; $i <= 50; $i++) {
    echo "<hr style='width:" . rand(50, 200) . "px;height:35px;background-color:" . $ca->colorAle() . "'/>";
}