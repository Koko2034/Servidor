<?php

ini_set('error_reporting',E_ALL ^ E_NOTICE ^ E_WARNING);
ini_set('display_errors', 'on');
ini_set('max_execution_time',10);

class zero04{

    public  function color_rand() {
        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
        }
}