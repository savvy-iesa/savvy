<?php

/**
 * Created by PhpStorm.
 * User: Lucien Hubert
 * Date: 24/11/2016
 * Time: 10:46
 */
require("./classes/Database.php");

class Form
{
    private $database = null;

    public function __construct() {
        $this->database = Database::getInstance();
    }

    public function listCategories(){
        $bdd = $this->database;
        $bdd->prepare('SELECT id FROM entry');


    }
}