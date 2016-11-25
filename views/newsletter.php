<?php
/**
 * Created by PhpStorm.
 * User: Lucien Hubert
 * Date: 25/11/2016
 * Time: 12:01
 */

include(dirname(__DIR__)."/classes/Form.php");
?>
<div class="response-form"></div>
<form id="newsletter-form" method="post" action="/controllers/FormController.php?action=save-newsletter">
    <div class="form-section">
        <label for="email">Email:</label>
        <input type="email" class="form-control email" name="email" required="">
        <input type="submit" name="newsletter" value="subscribe">
    </div>
</form>
