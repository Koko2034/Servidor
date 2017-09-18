<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of zero05
 *
 * @author FCabrera
 */
class zero05 {

    private $str;

    function __construct($str) {
        $this->str = $str;
    }

    public function validaCorreo() {
        return filter_var($this->str, FILTER_VALIDATE_EMAIL);
    }

}
