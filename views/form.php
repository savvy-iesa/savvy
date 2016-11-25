<?php
/**
 * Created by PhpStorm.
 * User: Lucien Hubert
 * Date: 23/11/2016
 * Time: 20:44
 */

// Include this file in dashboard.php

include(dirname(__DIR__)."/classes/Form.php");

$form = new Form;
$listCategories = $form->listCategories();

?>
<div id="appform">
    <h1>Configurer votre enfant</h1>

    <div class="response-form"></div>

    <form class="demo-form" method="post" action="/controllers/FormController.php?action=save">

    <?php foreach($listCategories as $listCategory){
        $id_cat = $listCategory['id'];
        $listSubcategories = $form->listSubcategories($id_cat);
    ?>

        <div class="form-section">
            <h2><?= $listCategory['name'] ?></h2>

            <?php
                foreach($listSubcategories as $listSubcategory){
                    $id_sub = $listSubcategory['id'];
                    ?>

                    <input type="checkbox" class="form-control" name="item[<?= $id_cat ?>][<?= $id_sub ?>]" value="1">
                    <label for="<?= $listSubcategory['name'] ?>"><?= $listSubcategory['name'] ?></label>
                <?php } ?>
        </div>

    <?php } ?>

        <div class="form-section">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" required="">
        </div>

        <div class="form-navigation">
            <button type="button" class="previous btn btn-info pull-left">&lt; Previous</button>
            <button type="button" class="next btn btn-info pull-right">Next &gt;</button>
            <input type="submit" class="btn btn-default pull-right">
            <span class="clearfix"></span>
        </div>

    </form>
</div>



