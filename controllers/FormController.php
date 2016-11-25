<?php
/**
 * Created by PhpStorm.
 * User: Lucien Hubert
 * Date: 24/11/2016
 * Time: 10:47
 */

require(dirname(__DIR__)."/classes/IAClass.php");

// If GET action is defined

$action = (isset($_GET['action']) ? $_GET['action']:'');

// formulaire datas
if($action == "save"){

    $dataspost = $_POST;
    echo "test pour l'enregistrement";

// newsletter datas
} elseif($action == "save-newsletter") {

    $dataspost = $_POST;
    echo "test pour l'enregistrement de la newsletter";

} else {
    header("Location: ../index.html");
}

function controlForm($resultsForm){
  $errors = array();
  if(!empty($errors)){
      return $errors;
  } else {
      return true;
  }
}

function ia_Process($resultsForm){
    $IA = new IAClass($resultsForm);

    $propositionsIA = $IA->IApropositions();
    $imgIA = $IA->IAimg();


    return true;
}
