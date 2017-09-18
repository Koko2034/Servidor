<?php

ini_set('error_reporting', E_ALL ^ E_NOTICE);
ini_set('display_errors', 'on');

function colorAle() {
    static $aLet = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F'];
    $color = '#';
    for ($i = 0; $i < 6; $i++) {
        $color.=$aLet[rand(0, 15)];
    }
    return $color;
}

for ($i = 0; $i <= 50; $i++) {
    echo "<hr style='width:" . rand(50, 200) . "px;height:35px;background-color:" . colorAle() . "'/>";
}


