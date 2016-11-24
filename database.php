<?php
/**
 * Created by PhpStorm.
 * User: Lucien Hubert
 * Date: 23/11/2016
 * Time: 21:17
 */

// Constantes pour la base de données
require("config.php");

try {
    $bdd = new PDO('mysql:host='.DBHOST.';
        dbname='.DBNAME .';
        charset=utf8', DBUSER, DBPASSWD);
}
catch(Exception $e){
    echo 'Erreur : ' . $e->getMessage();
    die();
}
