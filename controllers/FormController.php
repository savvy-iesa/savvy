<?php
/**
 * Created by PhpStorm.
 * User: Lucien Hubert
 * Date: 24/11/2016
 * Time: 10:47
 */

require(dirname(__DIR__)."/classes/IAClass.php");
require(dirname(__DIR__)."/classes/Form.php");

session_start();

$_SESSION['messages'] = [];
$_SESSION['postdata'] = [];
$_SESSION['errors'] = [];

// If GET action is defined
$action = (isset($_GET['action']) ? $_GET['action']:'');

if(empty($action)){
    header("Location: ../index.html");
}

// If POST is defined and not empty
$datasposts = (isset($_POST) ? $_POST:'');

$errors = [];

// si une action est demandée

if (isset($_GET['action'])){
    // demande de verification ajax
    if ($_GET['action'] == "check") {
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $states = array('errors' => checkFields($datasposts));
            header('Content-type: application/json');
            echo(json_encode($states, JSON_FORCE_OBJECT));
        }
    } else if($_GET['action'] == "save-newsletter"){

            $form = new Form();
            $ip = $form->ipNewsletter();
            $email = $datasposts['email'];
            $form->addNewsletter($email, $ip);

            $errors['email'] = "J'ai bien enregistré votre email";
            header('Content-type: application/json');
            echo(json_encode(array('errors' => $errors), JSON_FORCE_OBJECT));
    }
}

function checkFields($postdata)
{

    $warnings = [];
    if (isset($postdata['name'])) {
        // si vide
        if (empty($postdata['name'])) {
            $errors['name'] = 'champ name vide';
            // si longueur > 50 chars
        } else if (mb_strlen($postdata['name']) > 50) {
            $errors['name'] = 'champ name trop long (50max)';
        }
    }

    if (isset($postdata['email'])) {
        // si vide
        if (empty($postdata['email'])) {
            $errors['email'] = 'champ email vide';
            // si longueur > 150 chars
        } else if (mb_strlen($postdata['email']) > 150) {
            $errors['email'] = 'champ email trop long (150max)';
            // si format mail invalide
        } else if (!filter_var($postdata['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'J\'ai besoin d\'un email valide';
        }
        else{
            $errors['email']='Parfait, il n\'y a plus qu\'à valider';
        }
    }

    if (isset($postdata['message']) && empty(trim($postdata['message']))) {
        $errors['message'] = 'champ message vide';
    }

    return $errors;
}


function ia_Process($resultsForm){
    $IA = new IAClass($resultsForm);

    $propositionsIA = $IA->IApropositions();
    $imgIA = $IA->IAimg();


    return true;
}
