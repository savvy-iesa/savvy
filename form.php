<?php
/**
 * Created by PhpStorm.
 * User: Lucien Hubert
 * Date: 23/11/2016
 * Time: 20:44
 */

include("classes/Form.php");

// Include this file in dashboard.php

$form = new Form;
$listCategories = $form->listCategories();

?>
<div id="appform">
    <h1>Configurer votre enfant</h1>

    <form class="demo-form" method="post" action="controllers/FormController.php">

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

        <div class="form-navigation">
            <button type="button" class="previous btn btn-info pull-left">&lt; Previous</button>
            <button type="button" class="next btn btn-info pull-right">Next &gt;</button>
            <input type="submit" class="btn btn-default pull-right">
            <span class="clearfix"></span>
        </div>

    </form>
</div>



