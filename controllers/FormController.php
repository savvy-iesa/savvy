<?php
/**
 * Created by PhpStorm.
 * User: Lucien Hubert
 * Date: 24/11/2016
 * Time: 10:47
 */

require(__DIR__."/classes/Form.php");
require(__DIR__."/classes/IAClass.php");

if(isset($_POST) && !empty($POST)) {
    $resultsForm = $_POST;
} else {
    header('Location: ../index.html');
}

function controlForm($resultsForm){
  return true;
}

function ia_Process($resultsForm){
    $IA = new IAClass($resultsForm);

    $propositionsIA = $IA->IApropositions();
    $imgIA = $IA->IAimg();


    return true;
}
