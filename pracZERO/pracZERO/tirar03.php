<?php

ini_set('error_reporting', E_ALL ^ E_NOTICE ^ E_WARNING);
ini_set('display_errors', 'on');
ini_set('max_execution_time', 1);

$str = "";
for ($i = 0; $i < 10; $i++) {
    $str .= $i . " ";
}
//echo $str.PHP_EOL;
$str = 10;
//echo $str.PHP_EOL;

echo 'el valor de la variable es $str ' . $str . PHP_EOL;

echo "el valor de la variable es $str" . PHP_EOL;

echo 'el valor de la variable es $str ' . foo() . PHP_EOL;


function foo() {
    return " bar";
}
