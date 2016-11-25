<?php

/**
 * Created by PhpStorm.
 * User: Lucien Hubert
 * Date: 24/11/2016
 * Time: 10:46
 */
require(__DIR__."/Database.php");

class Form
{
    private $database = null;

    public function __construct() {
        $this->database = Database::getInstance();
    }

    public function ipNewsletter(){
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return $ip;
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

    public function addEntry($email, $ip, $img_key, $date){
        $bdd = $this->database;
        $req = $bdd->prepare('INSERT INTO entry (email, ip, img_key, date) VALUES (:email, :ip, :img_key, :date)');
        $req->execute(array('email' => $email, 'ip' => $ip, 'img_key' => $img_key, 'date' => $date));

        return true;
    }

    public function addNewsletter($email, $ip){

        $date = date("Y-m-d H:i:s");

        $bdd = $this->database;
        $req = $bdd->prepare('INSERT INTO newsletter (email, ip, date) VALUES (:email, :ip, :date)');
        $req->execute(array('email' => $email, 'ip' => $ip, 'date' => $date));

        return true;
    }

}