<?php
/**
 * Created by PhpStorm.
 * User: Lucien Hubert
 * Date: 25/11/2016
 * Time: 12:01
 */

include(dirname(__DIR__)."/classes/Form.php");

$postdata = [];
if (isset($_SESSION['postdata'])) {
    $postdata = $_SESSION['postdata'];
    $_SESSION['postdata'] = [];
}
$errors = [];
if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    $_SESSION['errors'] = [];
}

?>
<style>
    .has-success{
        background: green;
    }
    .has-error {
        background: red;
    }
</style>
<div class="response-form"></div>
<form id="newsletter-form" method="post" action="/controllers/FormController.php?action=save-newsletter">
    <div class="form-section">
        <div class="feedback"></div>
        <label for="email">Email:</label>
        <input type="email" id="email" class="form-control" name="email" required="">
        <input type="submit" class="button-click click-off" name="submit" value="subscribe">
        <div class="errors"></div>
    </div>
</form>

<script>
    var phpErrors = <?php echo (count($errors)?json_encode($errors, JSON_FORCE_OBJECT):'{}') ?>;
</script>
