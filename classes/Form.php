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
        $req = $bdd->prepare('SELECT * FROM category');
        $req->execute();

        $array = array();

        while($data = $req->fetch()){
            $array[] = $data;
        }

        return $array;

    }

    public function listSubcategories($idsubcategory){
        $bdd = $this->database;
        $req = $bdd->prepare('SELECT * FROM sub_category WHERE id_category = :idcat');
        $req->execute(array('idcat' => $idsubcategory));

        $array = array();

        while($data = $req->fetch()){
            $array[] = $data;
        }

        return $array;

    }



}