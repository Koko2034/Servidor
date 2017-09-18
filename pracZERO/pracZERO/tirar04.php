<?php

ini_set('error_reporting', E_ALL ^ E_NOTICE ^ E_WARNING);
ini_set('display_errors', 'on');
ini_set('max_execution_time', 1);


var_dump(foo());

$otro = array("demo1" => "qwerty", "demo2" => "zxcvb");

print_r($otro);

$str = json_encode($otro);

echo $str . PHP_EOL;

foreach ($otro as $k => $v) {
    echo $k . PHP_EOL;
    echo $v . PHP_EOL;
    echo $otro[$k] . PHP_EOL;
}

function foo() {
    $nombre = array();
    //....
    $nombre['ana'] = 'garcia escudero';
    //....
    $nombre['luis'] = 'martínez marín';
    return $nombre;
}
