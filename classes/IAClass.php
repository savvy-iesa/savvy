<?php

/**
 * Created by PhpStorm.
 * User: bakikr
 * Date: 24/11/2016
 * Time: 23:10
 */

require("Database.php");

class IAClass
{
    var $data = null;

    function __construct($data) {
        $this->data = $data;
    }
    public function IApropositions(){
        $choices = $this->data;
        return $choices;
    }

    public function IAimg(){
        return true;
    }
}