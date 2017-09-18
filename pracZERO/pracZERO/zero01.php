<?php

ini_set('error_reporting', E_ALL ^ E_NOTICE ^ E_WARNING);
ini_set('display_errors', 'on');
ini_set('max_execution_time', 10);

for ($i = 0; $i < 50; $i++) {
    echo "<hr style='width:".($i+150)."px'>";
}