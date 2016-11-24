<?php
/**
 * Created by PhpStorm.
 * User: Lucien Hubert
 * Date: 23/11/2016
 * Time: 20:44
 */

include("classes/Form.php");

// Include this file in AJAX, no header.php required

$form = new Form;
$listCategories = $form->listCategories();

?>
<div id="appform">
    <h1>Configurer votre enfant</h1>

    <?php

    foreach($listCategories as $listCategory){

        $id_cat = $listCategory['id'];
        $listSubcategories = $form->listSubcategories($id_cat);
    ?>

        <section>
            <h2><?= $listCategory['name'] ?></h2>

            <?php
                foreach($listSubcategories as $listSubcategory){
                    $id_sub = $listSubcategory['id'];
                    ?>

                    <input type="checkbox" name="item[<?= $id_cat ?>][<?= $id_sub ?>]" value="1">
                    <span><?= $listSubcategory['name'] ?></span>
                <?php } ?>
        </section>

    <?php } ?>
</div>



