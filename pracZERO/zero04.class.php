<?php

class zero04{

    public  function color_rand() {
        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
        }
}