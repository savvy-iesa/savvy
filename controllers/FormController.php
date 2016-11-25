<?php
/**
 * Created by PhpStorm.
 * User: Lucien Hubert
 * Date: 24/11/2016
 * Time: 10:47
 */

require(dirname(__DIR__)."/classes/IAClass.php");
//header('Content-type: application/json; charset=utf-8');

// If GET action is defined
$action = (isset($_GET['action']) ? $_GET['action']:'');

// If POST is defined and not empty
$dataspost = (isset($_POST) ? $_POST:'');


// array errors
$errors = array();


// formulaire datas
if($action == "save"){
    if(!empty($dataspost)){

        $array = "test";
        echo json_encode($array);

    } else {header("Location: ../index.html"); }

// newsletter datas
} elseif($action == "save-newsletter") {
    if(!empty($dataspost)) {

        $controlForm = controlForm($dataspost);
        if($controlForm === true){
            //$newsletter = new Form();
            //$newsletter->addNewsletter()

            echo $response_status['newsletter']['valid'];
        }

    } else { header("Location: ../index.html"); }

} else {
    header("Location: ../index.html");
}

function controlForm($resultsForm){

    if (isset($resultsForm['email'])) {
        if (empty($resultsForm['email'])) {
            $errors[] = 'champ email vide';
        } else if (mb_strlen($_POST['email']) > 150) {
            $errors[] = 'champ email trop long (150max)';
            // filter_var
        } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'champ email non-valide';
        }
    }

  /*$errors = array();
  if(!empty($errors)){
      return $errors;
  } else {
      return true;
  }*/

  return true;
}

function ia_Process($resultsForm){
    $IA = new IAClass($resultsForm);

    $propositionsIA = $IA->IApropositions();
    $imgIA = $IA->IAimg();


    return true;
}
